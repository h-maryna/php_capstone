<?php

namespace classes;

use classes\Ilogger;
use classes\DatabaseLogger;
use classes\FileLogger;

$logfile = __DIR__ . '/../storage/log.txt';
$logsqlite = __DIR__ . '/../storage/log.sqlite';

//$logger = new FileLogger($logfile); // 
$logger = new DatabaseLogger($dbh); // for server
//$logger = new DatabaseLogger(new PDO('sqlite:'.$logsqlite));
//var_dump($logfile);

function logEvent(Ilogger $logger){
	// vreate event ... gather info
	// for the event ... ip address
	// request_uri, data/time/ broowser info
	// concat all info together separated by
	// some delimeter .. | or ,
	
    $formatted_date = date('Y/m/d H:i:s', $_SERVER['REQUEST_TIME']);
    $event = 'Created at: ' . $formatted_date . ' ' .
             'REQUEST_URI: ' . $_SERVER['REQUEST_URI'] . ' ' . 
             'Browser: ' . $_SERVER['HTTP_USER_AGENT'] . ' ' .
             'IP-address: ' . $_SERVER['REMOTE_ADDR'] . ' ' .
             'HTTP status: ' .  http_response_code();

    if(!strpos($event, 'favicon')){
    	$logger->write($event);
    }

}

logEvent($logger);
