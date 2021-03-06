<?php

namespace classes;

class Db
{

	public function getAll()
	{
		$conn = Database::connect();
		$sql = "SELECT * FROM guest.student";
		$var = array();
		foreach ($conn->query($sql) as $row) {
			$student = new Student();
			$student->setId($row['id'])->setName($row['name'])->setSurname($row['surname'])->setIndexNo($row['indexno'])->setAdress($row['adress']);
			$var[] = $student;
		}
		$conn = null;

		return $var;
	}

	public function getOne($id)
	{
		$conn = Database::connect();
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$sql = $conn->prepare("SELECT * FROM guest.student WHERE id = ?");
		$sql->bindParam(1, $id);
		$sql->execute();
		$row = $sql->fetch();
		$conn = null;

		return $row;
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

	public function delete($id)
	{
		$conn = Database::connect();
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$sql = $conn->prepare("DELETE FROM guest.student WHERE id = ?");
		$sql->bindParam(1, $id);
		$sql->execute();
		$conn = null;
	}

	public function update($id, $name, $surname, $indexno, $adress)
	{
		$conn = Database::connect();
		$conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		$sql = $conn->prepare("UPDATE guest.student SET name = ?, surname = ?, indexno = ?, adress = ? WHERE id = ?");
		$sql->bindParam(1, $name);
		$sql->bindParam(2, $surname);
		$sql->bindParam(3, $indexno);
		$sql->bindParam(4, $adress);
		$sql->bindParam(5, $id);
		$sql->execute();
		$conn = null;
	}

}