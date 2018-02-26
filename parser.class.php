<?
class api_parser{
	public $api_config;
	public $data;
	public $unique;
	/**
	*Конструктор класса
	*/
	function __construct($api_config){
		$this->api_config = $api_config;
	}
	
	/**
	*Инициализация
	*Создание таблицы если она отсутствует
	*/
	public function init(){
		$sql_fields = array();
		foreach($this->api_config["fields"] as $key=>$field){
			$sql_fields[] = "`".$field["data_field"].($field["type"]?"` ".$field["type"]:"`");
		}
		$sql = "CREATE TABLE IF NOT EXISTS `".$this->api_config["table_name"]."` (`id` INT NOT NULL AUTO_INCREMENT , ".implode(", ", $sql_fields).", PRIMARY KEY (`id`)) ENGINE = ".$this->api_config["table_engine"]."  DEFAULT CHARSET=utf8";
		db::sql_query($sql);
	}
	
	/**
	*Получение данных от API (общий метод)
	*/
	public function read_data(){
		if($this->api_config["parse_period"]){
			$start_date = date("Y-m-d", strtotime("- ".($this->api_config["parse_period"]-1)." days"));
		}else{
			$start_date = date("Y-m-d");
		}
		$end_date = date("Y-m-d");
		$this->api_config["api_url"] = str_replace("#START_DATE#", $start_date, $this->api_config["api_url"]);
		$this->api_config["api_url"] = str_replace("#END_DATE#", $end_date, $this->api_config["api_url"]);
		switch ($this->api_config["data_format"]) {
			case "csv":
				$this->read_data_csv();
				break;
			case "xml":
				$this->read_data_xml();
				break;
			case "json":
				$this->read_data_json();
				break;
		}
	}
	
	/**
	*Получение данных от API (csv)
	*/
	private function read_data_csv(){
		$data = array_map('str_getcsv', file($this->api_config["api_url"]));
		$keys = array();
		$field_keys = array();
		foreach($data[0] as $field_name){
			$keys[] = $this->api_config["fields"][$field_name]["data_field"];
			$field_keys[] = $field_name;
		}
		unset($data[0]);
		$arr_data = array();
		$arr_unique = array();
		foreach($data as $row){
			$arr_fields = array();
			$arr_unique_fields = array();
			foreach($row as $key=>$cell){
				$arr_fields[$keys[$key]] = $cell;
				if($this->api_config["fields"][$field_keys[$key]]["in_unique"] == "Y"){
					$arr_unique_fields[$this->api_config["fields"][$field_keys[$key]]["data_field"]] = $cell;
				}
			}
			$arr_data[] = $arr_fields;
			$arr_unique[] = $arr_unique_fields;
		}
		$this->data = $arr_data;
		$this->unique = $arr_unique;
	}
	
	/**
	*Получение данных от API (xml)
	*/
	private function read_data_xml(){
		$data = simplexml_load_file($this->api_config["api_url"]);
		$arr_data = array();
		$arr_unique = array();
		foreach($data->items->item as $data_key => $data_item){
			$arr_fields = array();
			$arr_unique_fields = array();
			foreach($data_item as $field_key => $field_value){
				$arr_fields[$this->api_config["fields"][$field_key]["data_field"]] = $field_value->__toString();
				if($this->api_config["fields"][$field_key]["in_unique"] == "Y"){
					$arr_unique_fields[$this->api_config["fields"][$field_key]["data_field"]] = $field_value->__toString();
				}
			}
			$arr_data[] = $arr_fields;
			$arr_unique[] = $arr_unique_fields;
		}
		$this->data = $arr_data;
		$this->unique = $arr_unique;
	}
	
	/**
	*Получение данных от API (json)
	*/
	private function read_data_json(){
		$data = file_get_contents ($this->api_config["api_url"]);
		$data = json_decode($data);
		$arr_data = array();
		$arr_unique = array();
		foreach($data->items as $data_key => $data_item){
			$arr_fields = array();
			$arr_unique_fields = array();
			foreach($data_item as $field_key => $field_value){
				$arr_fields[$this->api_config["fields"][$field_key]["data_field"]] = $field_value;
				if($this->api_config["fields"][$field_key]["in_unique"] == "Y"){
					$arr_unique_fields[$this->api_config["fields"][$field_key]["data_field"]] = $field_value;
				}
			}
			$arr_data[] = $arr_fields;
			$arr_unique[] = $arr_unique_fields;
		}
		$this->data = $arr_data;
		$this->unique = $arr_unique;
	}
	
	/**
	*Запись данных в БД
	*/
	public function write_data_into_db(){
		foreach($this->data as $rec_key=>$record){
			$exists = false;
			if(count($this->unique[$rec_key])) {
				$exists = $this->is_record_exists($this->api_config["table_name"], $this->unique[$rec_key]);
			}
			if(!$exists){
				db::insert_record($this->api_config["table_name"], $record);
			}else{
				db::update_record($this->api_config["table_name"], $record, array(), $this->unique[$rec_key]);
			}
		}
	}
	
	/**
	 * Проверка существования записи
	 */
	private function is_record_exists($table, $fields){
		foreach($fields as $key=>$value){
			$where[]="{$key}=:{$key}";
		}
		$where=join(" AND ", $where);
		$counter=db::sql_select("SELECT COUNT(*) AS COUNTER FROM {$table} WHERE {$where}", $fields);
		if($counter[0]["COUNTER"]>0){
			return true;
		}else{
			return false;
		}
	}
	
	
			
}