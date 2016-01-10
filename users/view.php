<?php

require_once(dirname(__FILE__) . "/../conf/config.php");
require_once(dirname(__FILE__) . "/../conf/functions.php");

$user = new User();
$target = $user->getUser($_GET['id']);
if (!$target) {
	header('Location: index.php');
	exit();
}
$title = "ユーザ詳細";

require_once(dirname(__FILE__) . "/../view/users/temp_view.php");