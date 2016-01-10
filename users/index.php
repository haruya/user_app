<?php

require_once(dirname(__FILE__) . "/../conf/config.php");
require_once(dirname(__FILE__) . "/../conf/functions.php");

$user = new User();
$users = $user->getIndex();
$title = "ユーザ一覧";

require_once(dirname(__FILE__) . "/../view/users/temp_index.php");