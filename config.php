<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	$host = "dev";
} else {
	$host = "live";
}

/* --- */


switch ($host) {
	case "dev":
		define('HOST_TYPE', 'dev');
		error_reporting(E_ALL);
		define('DB_DSN', 'mysql:dbname=bt_test;host=localhost;charset=UTF8');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('PATH_TEMPLATE', 'lib/template');
		break;

	case "live":
		// no break
	default:
		define('HOST_TYPE', 'live');
		define('DB_DSN', 'mysql:dbname=testdb;host=mysql.brettt.yoobee.net.nz;charset=UTF8');
		define('DB_USER', 'brettt');
		define('DB_PASS', '');
		break;

}

define("SITE_NAME", "Framework Test");