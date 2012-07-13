<?php
if(!defined('INCLUDE_CHECK')) die('У вас нет прав на выполнение данного файла!');

// Метод хеширования пароля для интеграции с различними плагинами/сайтами/cms/форумами
/*
'hash_md5' 			- md5 хеширование
'hash_authme'   	- интеграция с плагином AuthMe
'hash_cauth' 		- интеграция с плагином Cauth
'hash_xauth' 		- интеграция с плагином xAuth
'hash_joomla' 		- интеграция с Joomla (v1.6- v1.7)
'hash_ipb' 			- интеграция с IPB
'hash_xenforo' 		- интеграция с XenForo
'hash_wordpress' 	- интеграция с WordPress
'hash_vbulletin' 		- интеграция с vBulletin
'hash_dle' 		- интеграция с DLE
'hash_drupal'     - интеграция с Drupal (v.7)
*/
$crypt = 'hash_md5';


// Конфигурация подключения к базе данных
$db_host		= 'localhost'; // Ip-адрес базы данных
$db_port		= '5432'; // Порт базы данных
$db_user		= 'postgres'; // Пользователь базы данных
$db_pass		= 'postgres'; // Пароль базы данных

// Конфигурация базы данных для плагинов AuthMe, xAuth, CAuth и сайтав/cms/форумов Joomla, IPB, XenForo, WordPress, vBulletin, DLE, Drupal
/*
$db_database - имя базы данных, значение по умолчанию:
AuthMe = 'authme'
xAuth = отсутствует (указывается вручную)
CAuth = 'cauth'
Joomla,IPB,XenForo,WordPress,vBulletin,DLE, Drupal - отсутствует (указывается вручную)
*/
$db_database	= 'minecraft';

/*
$db_table - таблица базы данных, значение по умолчанию:
AuthMe = 'authme'
xAuth = 'accounts'
CAuth = 'users'
Joomla = 'префикс_users' - пример 'y3wbm_users', где "y3wbm_" - префикс. Примечание префикс может отсутствовать - пример 'users'
IPB = 'members'
XenForo = 'префикс_user' - пример 'xf_user', где "xf_" - префикс. Примечание префикс может отсутствовать - пример 'user'
vBulletin = 'префикс_user' - пример 'bb_user', где "bb_" - префикс. Примечание префикс может отсутствовать - пример 'user'
WordPress = 'префикс_users' - пример 'wp_users', где "wp_" - префикс. Примечание префикс может отсутствовать - пример 'users'
DLE = 'префикс_users' - пример 'dle_users', где "dle_" - префикс. Примечание префикс может отсутствовать - пример 'users'
Drupal = 'префикс_users' - пример 'drupal_users', где "drupal_" - префикс. Примечание префикс может отсутствовать - пример 'users'
*/
$db_table       = 'users';

/*
$db_columnId - уникальный идентификатор, значение по умолчанию
AuthMe = 'id'
xAuth = 'id'
CAuth = 'id'
Joomla = 'id'
IPB = 'member_id'
XenForo = 'user_id'
vBulletin = 'userid'
WordPress = 'id'
DLE = 'user_id'
Drupal = 'uid'
*/
$db_columnId  = 'id';

/*
$db_columnUser - колонка логина, значение по умолчанию:
AuthMe = 'username'
xAuth = 'playername'
CAuth = 'login'
Joomla = 'name'
PB = 'name'
XenForo = 'username'
WordPress = 'user_login'
vBulletin = 'username'
DLE = 'name'
Drupal = 'name'
*/
$db_columnUser  = 'username';

/*
$db_columnPass - колонка пароля, значение по умолчанию:
AuthMe = 'password'
xAuth = 'password'
CAuth = 'password'
Joomla = 'password'
IPB = 'members_pass_hash'
XenForo = 'data'
WordPress = 'user_pass'
vBulletin = 'password'
DLE = 'password'
Drupal = 'pass'
*/
$db_columnPass  = 'password';

// ДОПОЛНИТЕЛЬНЫЕ НАСТРОЙКИ ТОЛЬКО ДЛЯ IPB и XenForo

// Настраивается только для XenForo 'префикс_user_authenticate' - пример 'xf_user_authenticate', где "xf_" - префикс. Примечание префикс может отсутствовать - пример 'user_authenticate'
$db_tableOther = 'xf_user_authenticate';

// Настраивается для IPB и vBulletin
// IPB - members_pass_salt
//vBulletin - salt
$db_columnSalt = 'members_pass_salt';


/*
$db_columnSesId - колонка id сессии
*/
$db_columnSesId = 'session';

/*
$db_columnServer - колонка id сервера
*/
$db_columnServer = 'server';

/*
$db_GameDatatable - имя базы данных с информацией о версиях
*/
$db_GameDatatable = 'data';

/*
НЕ МЕНЯТЬ
*/
$db_Propertycolumn = 'property';
$db_Valuecolumn = 'value';

//Проверка хеша
//Включение
$hash_enable = true;
//Проверять md5 при логине
$hash_at_login = false;
//Путь к minecraft.jar (относительно этого файла)
$minecraft = '../client/minecraft.jar';
//Алгоритм ('md5', 'sha1', 'sha512') (только при $hash_at_login=false)
$hashtype = 'sha512';

//Проверка времени последней успешной проверки хеша
//Включить?
$hash_enable_timeout = true;
//Таймаут(в секундах)
$hash_timeout = 60;
//Колонка
$db_columnHashTimeout = 'md5time';
//Название колонки хеша в запросе при входе на сервер
$hash_param_name = 'hash';
//Название колонки хеша в запросе при авторизации
$hash_al_param_name = 'md5';


$constr = "host='".$db_host."' port='".$db_port."' dbname='".$db_database."' user='".$db_user."' password='".$db_pass."' options='--client_encoding=UTF8'";   
$link = pg_connect($constr)
  or die ("Could not connect to PostgreSQL");
?>