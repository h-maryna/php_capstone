<?php 

namespace classes;

use classes\ILogger;
/**
 * The all method returns
 */

class FileLogger implements ILogger
{   
	protected $file;

	public function __construct($file) 
	{    
		$this ->file = $file; 
	}
	public function write($event){
       
        if (is_string($event)) {
              
             file_put_contents($this->file, date("Y-m-d H:i:s")." ".$event."\n", FILE_APPEND);
        }
    }
} 