<?php

namespace classes;

class Database
{
	private static $serverName = 'localhost:3306';
	private static $username = 'root';
	private static $password = 'NoIdea(*(989';
	private static $conn;
	private static $dbName = 'guest';

	public function __construct()
	{
		die('Init function is not allowed');
	}

	public static function connect()
	{
		// One connection through whole application
		if (null == self::$conn) {
			try {
				self::$conn = new \PDO("mysql:host=" . self::$serverName . ";" . "dbname=" . self::$dbName, self::$username, self::$password);
			} catch (\PDOException $e) {
				die($e->getMessage());
			}
		}

		return self::$conn;
	}
}