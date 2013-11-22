<?php

require "../config.php";

require "lib/base/Database.php";
require "lib/base/Model.php";
require "lib/base/View.php";

require "lib/view/BaseView.php";

//require "lib/model/PageModel.php";
//require "lib/view/PageView.php";

require "lib/model/NotFoundModel.php";
require "lib/view/NotFoundView.php";

// CONTROLLER

$action = $_GET['action'];

switch ($action) {

	default:
		if ( $_GET['page'] ) {
			$model = new PageModel();
			$view = new PageView($model);
		} else {
			$model = new NotFoundModel();
			$view = new NotFoundView($model);
		}
}

$view->render();
