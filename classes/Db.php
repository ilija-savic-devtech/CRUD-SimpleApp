<?php

namespace classes;

class Db
{

	private function __construct()
	{
	}

	public static function getInstance()
	{
		static $instance = null;
		if ($instance === null) {
			$instance = new Db();
		}

		return $instance;
	}

	public function connect()
	{
		$serverName = '127.0.0.1:3306';
		$username = 'root';
		$password = 'NoIdea(*(989';
		// Create connection
		$conn = mysqli_connect($serverName, $username, $password);

		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully";
	}

	public function close(){

	}
}