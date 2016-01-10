<?php

spl_autoload_register(function($classname) {
	require dirname(__FILE__) . "/../model/" . $classname . ".php";
});