<?php

namespace classes;

class Db
{

	public function getAll()
	{
		$conn = Database::connect();
		$sql = "SELECT * FROM student";
		$var = array();
		foreach ($conn->query($sql) as $row) {
			$student = new Student();
			$student->setId($row['id'])->setName($row['name'])->setSurname($row['surname'])->setIndexNo($row['indexno'])->setAdress($row['adress']);
			$var[] = $student;
		}
		//Database::disconnect();
		$conn = null;

		return $var;

	}

	public function create($name, $surname, $indexno, $adress)
	{
		$conn = Database::connect();
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$sql = $conn->prepare("INSERT INTO guest.student (name, surname, indexno, adress) VALUES (?, ?, ?, ?)");
		$sql->bindParam(1, $name);
		$sql->bindParam(2, $surname);
		$sql->bindParam(3, $indexno);
		$sql->bindParam(4, $adress);
		$sql->execute();
		$conn = null;
	}

}