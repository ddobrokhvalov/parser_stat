Парсер статистики

Парсер запускается из командной строки.

формат запуска: php /path/to/parser.php api_config1.php
где /path/to/ - путь к выполняемому скрипту parser.php, api_config1.php - имя файла конфигурации API.

Для обращения к разным API нужно выполнять запуск данного скрипта с указанием разных файлов конфигурации API.
Например у меня запуск для трех разных API выглядит так
php /var/www/u6724423/public_html/ddobrokhvalov-tver.ru/dev/parser_stat/parser.php api_config1.php
php /var/www/u6724423/public_html/ddobrokhvalov-tver.ru/dev/parser_stat/parser.php api_config2.php
php /var/www/u6724423/public_html/ddobrokhvalov-tver.ru/dev/parser_stat/parser.php api_config3.php

Для начала работы скрипта нужна пустая база данных MySQL

Параметры доступа к БД указываются в файле lib/config.php