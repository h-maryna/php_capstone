<?php

session_start();

// buffer overflow to prevent showing HTML
ob_start();

// Set a session CSRF token in token
// if empty session csrf token
if(empty($_SESSION['token'])){
   $_SESSION['token'] = md5(rand());
}

// define your base path
define('BASE_PATH', __DIR__);

define('DB_USER', 'web_user');
define('DB_PASS', 'Studies_2018');
define('DB_DSN', 'mysql:host=localhost;dbname=php_capstone');

$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
$dbh->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$environment = 'dev'; // prod or dev

if('dev' == $environment){
	ini_set('display_errors', 1);
	ini_set('error_reporting', E_ALL);
} else {
	ini_set('display_errors', 0);
}

spl_autoload_register('my_autoload');

function my_autoload($class)
{
	$class = trim($class, '\\');
	$class = str_replace('\\', '/', $class);
	$class = $class . '.php';
	$file = __DIR__ . '/' . $class;
	$file = str_replace('\config', '', $file);
	if(file_exists($file)){
		require $file;
	}
}

require __DIR__ . '/../config/log.php';