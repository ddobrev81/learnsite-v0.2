<?php

/**
* configuration class
*/
class dbconfig
{
	
	private $hostname, $username, $password, $database; 

	function __construct($hostname = NULL, $username = NULL, $password = NULL, $database = NULL)
	{
		$this->hostname = !empty($hostname) ? $hostname : "";
		$this->username = !empty($username) ? $username : "";
		$this->password = !empty($password) ? $password : "";
		$this->database = !empty($database) ? $database : "";
	}
}

?>