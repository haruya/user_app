<?php

require_once(dirname(__FILE__) . "/../conf/config.php");
require_once(dirname(__FILE__) . "/../conf/functions.php");

$user = new User();
if ($_SERVER['REQUEST_METHOD'] != "POST") {
	$target = $user->getUser($_GET['id']);
	if (!$target) {
		header('Location: index.php');
		exit();
	}
} else {
	$target = [
		'id' => $_POST['id'],
		'name' => $_POST['name'],
		'email' => $_POST['email']
	];
	$user->updateUser($target);
	header("Location: view.php?id=" . $target['id']);
	exit();
}

$title = "ユーザ編集";

require_once(dirname(__FILE__) . "/../view/users/temp_update.php");