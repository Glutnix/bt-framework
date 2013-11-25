<?php

define(DEPLOYMENT_MODE, "dev");

switch (DEPLOYMENT_MODE) {
	case "dev":
		define('DB_DSN', 'mysql:dbname=bt_test;host=localhost;charset=UTF8');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('PATH_TEMPLATE', 'lib/template');
		break;

	case "live":
		define('DB_DSN', 'mysql:dbname=testdb;host=mysql.brettt.yoobee.net.nz;charset=UTF8');
		define('DB_USER', 'brettt');
		define('DB_PASS', '');
		break;

}

define("SITE_NAME", "Framework Test");