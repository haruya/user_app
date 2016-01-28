<?php

require_once(dirname(__FILE__) . "/../conf/config.php");
require_once(dirname(__FILE__) . "/../conf/functions.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	$post = [
		'name' => '',
		'password' => '',
		'email' => ''
	];
} else {
	$post = [
		'name' => $_POST['name'],
		'password' => $_POST['password'],
		'email' => $_POST['email']
	];
	$error = userValidate($post);
	if (is_null($error)) {
		$user = new User();
		$user->addUser($post);
		header('Location: index.php');
		exit();
	}

}
$title = "ユーザ追加";

require_once(dirname(__FILE__) . "/../view/users/temp_add.php");