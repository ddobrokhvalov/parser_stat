<?
params::$params["api_config"] = array(
	"service_name" => "advertiser",//Название сервиса
	"api_url" => "https://api3.adsterratools.com/advertiser/e1ee46af6596c438413aaaafea953214/stats.xml?start_date=#START_DATE#&finish_date=#END_DATE#&group_by[]=date",//Адрес API
	"auth_method" => "inurl token",//Метод авторизации
	"data_format" => "xml",//Формат ответа
	"table_name" => "advertiser",//Название таблицы для данных
	"table_engine" => "InnoDB",//Тип таблицы
	"parse_period" => 3,
	"fields" => array(//Список полей
		/**
		* Ключ массива - имя поля в полученных от API данных
		* "in_unique"=>"Y" - поле участвует в проверке уникальности записи в БД, "in_unique"=>"N" - не участвует.
		* type - тип данных в БД
		* data_field - имя поля в БД
		*/
		"date" 			=> array("in_unique"=>"Y", "type"=>"date", 	"data_field"=>"date"),//2018-02-15
		"impressions" 	=> array("in_unique"=>"N", "type"=>"int", 	"data_field"=>"impressions"),//343371
		"conversions" 	=> array("in_unique"=>"N", "type"=>"int", 	"data_field"=>"conversions"),//0
		"clicks" 		=> array("in_unique"=>"N", "type"=>"int", 	"data_field"=>"clicks"),//0
		"ctr" 			=> array("in_unique"=>"N", "type"=>"int", 	"data_field"=>"ctr"),//0
		"cpm" 			=> array("in_unique"=>"N", "type"=>"float", "data_field"=>"cpm"),//0.412
		"spent" 		=> array("in_unique"=>"N", "type"=>"float", "data_field"=>"spent"),//141.321
	),
);