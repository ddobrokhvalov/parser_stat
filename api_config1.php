<?
params::$params["api_config"] = array(
	"service_name" => "cpmrevenue",//Название сервиса
	"api_url" => "http://login.revenueonsteroids.com/publisher/svc?action=outcsv&login=support%40cpmrevenue.com&password=axJFrN&channel=ZoneReports&dim=date&f.zone=46498&f.date=2018-02-01_2018-02-21&appType=CPM",//Адрес API
	"auth_method" => "inurl token",//Метод авторизации
	"data_format" => "csv",//Формат ответа
	"table_name" => "cpmrevenue",//Название таблицы для данных
	"table_engine" => "InnoDB",//Тип таблицы
	"fields" => array(//Список полей
		/**
		* Ключ массива - имя поля в полученных от API данных
		* "in_unique"=>"Y" - поле участвует в проверке уникальности записи в БД, "in_unique"=>"N" - не участвует.
		* type - тип данных в БД
		* data_field - имя поля в БД
		*/
		"Date" 								=> array("in_unique"=>"Y", "type"=>"date", 			"data_field"=>"Date"),//2018-02-01
		"Gross Requests" 					=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Gross_Requests"),//214549
		"Gross Responses" 					=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Gross_Responses"),//48
		"Gross Requested Bids" 				=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Gross_Requested_Bids"),//214549
		"Gross Bids" 						=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Gross_Bids"),//48
		"Gross Average Bid eCPM" 			=> array("in_unique"=>"N", "type"=>"float", 		"data_field"=>"Gross_Average_Bid_eCPM"),//0.10279744346752451
		"Gross Average Bid Floor" 			=> array("in_unique"=>"N", "type"=>"float", 		"data_field"=>"Gross_Average_Bid_Floor"),//0.05000000000000002
		"Gross Impression Wins" 			=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Gross_Impression_Wins"),//0
		"Gross Wins Price" 					=> array("in_unique"=>"N", "type"=>"float", 		"data_field"=>"Gross_Wins_Price"),//0.0
		"Publisher Gross Impressions"		=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Publisher_Gross_Impressions"),//0
		"Publisher Net Impressions" 		=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Publisher_Net_Impressions"),//0
		"Publisher Filtered Impressions"	=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Publisher_Filtered_Impressions"),//0
		"Gross Clicks" 						=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Gross_Clicks"),//0
		"Gross CTR" 						=> array("in_unique"=>"N", "type"=>"varchar(255)", 	"data_field"=>"Gross_CTR"),//
		"Gross Estimated Revenue" 			=> array("in_unique"=>"N", "type"=>"float", 		"data_field"=>"Gross_Estimated_Revenue"),//0.0
		"Verified Impressions" 				=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Verified_Impressions"),//0
		"Verified Clicks" 					=> array("in_unique"=>"N", "type"=>"int", 			"data_field"=>"Verified_Clicks"),//0
		"Verified Revenue" 					=> array("in_unique"=>"N", "type"=>"float", 		"data_field"=>"Verified_Revenue")//0.0
	),
);