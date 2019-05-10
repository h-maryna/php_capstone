<?php 

namespace classes;

use classes\ILogger;

/**
 * The all method returns
 */

class DatabaseLogger implements ILogger
{   
	protected $dbh;
	
	public function __construct(\PDO $dbh) 
	{    
		$this ->dbh = $dbh; 
	}

	public function write($event)
	{   
		var_dump($event);
    	$query = 'INSERT INTO log(event) VALUES (:event)';
        $params = array(
                        ':event' => $event);
		$stmt = $this->dbh->prepare($query);
		$stmt->execute($params);
   
	}

} 