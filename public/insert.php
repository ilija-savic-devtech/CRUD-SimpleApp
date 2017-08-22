<?php
		require_once '..\classes\Db.php';
		require_once '..\classes\Database.php';
	if(isset($_POST['save'])){
	$name = $_POST['name'];
	$surname  = $_POST['surname'];
	$indexno = $_POST['indexno'];
	$adress = $_POST['adress'];
	$db = new \classes\Db();
	$db->create($name, $surname, $indexno, $adress);


	header('location: /');
}