<?
require_once(__DIR__ . "/lib/lib_abstract.php");//Подключение библиотек и файла конфигурации
if($argv[1]){//Указан файл конфигурации API
	require_once(__DIR__ . "/" . $argv[1]);//Подключение файла конфигурации API
	require_once(__DIR__ . "/parser.class.php");//Подключение основного класса
	$api_parser = new api_parser(params::$params["api_config"]);
	$api_parser->init();//Инициализация
	$api_parser->read_data();//Получение данных от API
	$api_parser->write_data_into_db();//Запись данных в БД
}else{//Файл конфигурации API не указан
	var_dump("Не задан файл конфигурации API");
}