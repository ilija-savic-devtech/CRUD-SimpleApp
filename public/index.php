<?php
require_once '..\bootstrap\bootstrap.php';

$loader = new Twig_Loader_Filesystem('..\views');
$twig = new Twig_Environment($loader);
$klein = new \Klein\Klein();
$db = new \classes\Db();

$klein->respond('/', function () use ($twig, $db) {
	$getAll = $db->getAll();
	echo $twig->render('home.twig', array(
		'getAll' => $getAll
	));
});

$klein->respond('/insert', function () use ($db) {
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$indexno = $_POST['indexno'];
		$adress = $_POST['adress'];
		$db = new \classes\Db();
		$db->create($name, $surname, $indexno, $adress);
		header('Location: /');
		exit();
	}
});

$klein->respond('/updatePage', function () use ($twig) {
	$id = key($_POST);
	echo $twig->render('update.twig', array(
		'id' => $id
	));

});

$klein->respond('/update', function () use ($db) {
	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$indexno = $_POST['indexno'];
		$adress = $_POST['adress'];
		$db = new \classes\Db();
		$db->update($id, $name, $surname, $indexno, $adress);
		header('location: /');
		exit();
	}
});

$klein->respond('/read', function () use ($twig, $db) {
	$id = null;
	foreach ($_POST as $key => $value) {
		$id = $key;
	}
	$row = $db->getOne($id);
	echo $twig->render('read.twig', array(
		'getOne' => $row
	));
});

$klein->respond('/delete', function () use ($db) {
	$id = null;
	foreach ($_POST as $key => $value) {
		$id = $key;
	}
	$db = new \classes\Db();
	$db->delete($id);
	header('Location: /');
	exit();
});

$klein->dispatch();