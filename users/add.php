<?php

require_once(dirname(__FILE__) . "/../conf/config.php");
require_once(dirname(__FILE__) . "/../conf/functions.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	$post = [
		'name' => '',
		'email' => ''
	];
} else {
	$post = [
		'name' => $_POST['name'],
		'email' => $_POST['email']
	];
	$user = new User();
	$user->addUser($post);
	header('Location: index.php');
	exit();
}
$title = "ユーザ追加";
require_once(dirname(__FILE__) . "/../view/users/temp_add.php");