<?php
require_once '..\classes\Db.php';
require_once '..\classes\Database.php';

	$id = null;
		foreach ($_POST as $key => $value) {
			$id = $key;
		}
	$db = new \classes\Db();
	$db->delete($id);
	header('Location: /');