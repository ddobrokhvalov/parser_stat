<?
params::$params["api_config"] = array(
	"service_name" => "advertiser",//Íàçâàíèå ñåğâèñà
	"api_url" => "https://api3.adsterratools.com/advertiser/e1ee46af6596c438413aaaafea953214/stats.xml?start_date=2018-02-15&finish_date=2018-02-16&group_by[]=date",//Àäğåñ API
	"auth_method" => "inurl token",//Ìåòîä àâòîğèçàöèè
	"data_format" => "xml",//Ôîğìàò îòâåòà
	"table_name" => "advertiser",//Íàçâàíèå òàáëèöû äëÿ äàííûõ
	"table_engine" => "InnoDB",//Òèï òàáëèöû
	"fields" => array(//Ñïèñîê ïîëåé
		/**
		* Êëş÷ ìàññèâà - èìÿ ïîëÿ â ïîëó÷åííûõ îò API äàííûõ
		* "in_unique"=>"Y" - ïîëå ó÷àñòâóåò â ïğîâåğêå óíèêàëüíîñòè çàïèñè â ÁÄ, "in_unique"=>"N" - íå ó÷àñòâóåò.
		* type - òèï äàííûõ â ÁÄ
		* data_field - èìÿ ïîëÿ â ÁÄ
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