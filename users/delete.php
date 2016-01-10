<?php

require_once(dirname(__FILE__) . "/../conf/config.php");
require_once(dirname(__FILE__) . "/../conf/functions.php");

if ($_SERVER['REQUEST_METHOD'] != "POST") {
	// nothing
} else {
	$user = new User();
	$user->deleteUser($_POST['id']);
}

header('Location: index.php');
exit();