<?php
require_once '..\bootstrap\bootstrap.php';

$loader = new Twig_Loader_Filesystem('..\views');
$twig = new Twig_Environment($loader);
$klein = new \Klein\Klein();
$db = new \classes\Db();

$klein->respond('/', function() use ($twig,$db){
	$getAll = $db->getAll();
	echo $twig->render('home.twig', array(
		'getAll' => $getAll
	));
});

$klein->respond('/edit', function() use ($twig,$db){
	echo $twig->render('edit.twig');
});

$klein->dispatch();