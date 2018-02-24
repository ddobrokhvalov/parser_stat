<?
params::$params["api_config"] = array(
	"service_name" => "advertiser",//�������� �������
	"api_url" => "https://api3.adsterratools.com/advertiser/e1ee46af6596c438413aaaafea953214/stats.xml?start_date=2018-02-15&finish_date=2018-02-16&group_by[]=date",//����� API
	"auth_method" => "inurl token",//����� �����������
	"data_format" => "xml",//������ ������
	"table_name" => "advertiser",//�������� ������� ��� ������
	"table_engine" => "InnoDB",//��� �������
	"fields" => array(//������ �����
		/**
		* ���� ������� - ��� ���� � ���������� �� API ������
		* "in_unique"=>"Y" - ���� ��������� � �������� ������������ ������ � ��, "in_unique"=>"N" - �� ���������.
		* type - ��� ������ � ��
		* data_field - ��� ���� � ��
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