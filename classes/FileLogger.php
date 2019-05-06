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
	public function write($event)
	{   
		// we create a file
	    $myfile = fopen($this->file, "a");
        
        // we write an event in this file
	    fwrite($myfile, $event . "\n");
        
        // we close our file after doing changes there
	    fclose($myfile);
	}

} 