<?php
require_once '..\bootstrap\bootstrap.php';

$loader = new Twig_Loader_Filesystem('..\views');
$twig = new Twig_Environment($loader);
$klein = new \Klein\Klein();

$klein->respond('/', function() use ($twig){
	echo $twig->render('home.twig');
});
$db = \classes\Db::getInstance();
$db->connect();


$klein->dispatch();