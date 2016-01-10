<?php

/**
 * サイト全体の設定
 */
$siteNo = 0;

if ($siteNo == 0) {
	define('DB_HOST', 'localhost');
	define('DB_PORT', 3306);
	define('DB_USER', 'root');
	define('DB_PASS', 'ichikawa');
	define('DB_NAME', 'user_app');
	define('SITE_PATH', 'http://localhost/user_app/');
	ini_set('display_errors', 1);
}
