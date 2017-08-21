<?php
namespace classes;
class Database
{
	private $serverName = 'localhost:3306';
	private $username = 'root';
	private $password = 'NoIdea(*(989';
	private $conn;
	private $dbName = 'guest';
	private $student = array();


	public function __construct(Student $student)
	{
		$this->student[] = $student;
	}

	public function connect()
	{
		// Create connection
		$this->conn = mysqli_connect($this->serverName, $this->username, $this->password, $this->dbName);

		// Check connection
		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully<br>";

		return $this->conn;
	}

	public function getAll()
	{
		$conn = $this->connect();
		$sql = "SELECT * FROM guest_info";
		$result = mysqli_query($conn, $sql);
		$var = array();
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			while ($row = mysqli_fetch_assoc($result)) {
				$var = new Student();
				$var->setId($row["id"]);
				echo $var->getId();
				//$var[] = $row;
				//echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Date of birth: " . $row["dateOfBirth"]. "<br>";
			}
		} else {
			echo "0 results";
		}

		mysqli_close($conn);
	}
}