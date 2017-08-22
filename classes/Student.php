<?php

namespace classes;

class Student
{
	private $id;
	private $name;
	private $surname;
	private $indexNo;
	private $adress;

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return Student
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @param mixed $name
	 * @return Student
	 */
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSurname()
	{
		return $this->surname;
	}

	/**
	 * @param mixed $surname
	 * @return Student
	 */
	public function setSurname($surname)
	{
		$this->surname = $surname;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getIndexNo()
	{
		return $this->indexNo;
	}

	/**
	 * @param mixed $indexNo
	 * @return Student
	 */
	public function setIndexNo($indexNo)
	{
		$this->indexNo = $indexNo;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAdress()
	{
		return $this->adress;
	}

	/**
	 * @param mixed $adress
	 * @return Student
	 */
	public function setAdress($adress)
	{
		$this->adress = $adress;

		return $this;
	}

}