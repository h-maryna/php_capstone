<?php

namespace classes;

use classes\Ilogger;
use classes\DatabaseLogger;
use classes\FileLogger;

$logfile = __DIR__ . '/../storage/log.txt';
$logsqlite = __DIR__ . '/../storage/log.sqlite';

$logger = new FileLogger($logfile);
//$logger = new DatabaseLogger($dbh);

function logEvent(Ilogger $logger){
	// vreate event ... gather info
	// for the event ... ip address
	// request_uri, data/time/ broowser info
	// concat all info together separated by
	// some delimeter .. | or ,
	/*
    $event = array(
                 //  'date' =>
                  //  'ip' =>
                //)
                // */
    $event = $_SERVER['REQUEST_URI'];
    if(!strpos($event, 'favicon')){
    	$logger->write($event);
    }
}

logEvent($logger);