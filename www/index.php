<?php

require "../config.php";

try {

    ini_set('default_charset', 'utf-8');

    require "lib/base/Validation.php";

    require "lib/base/Database.php";
    require "lib/base/Model.php";
    require "lib/base/View.php";

    require "lib/view/BaseView.php";

    require "lib/model/PageModel.php";
    require "lib/view/PageView.php";
    require "lib/view/AdminPageView.php";

    require "lib/model/NotFoundModel.php";
    require "lib/view/NotFoundView.php";

    // CONTROLLER

    // default to home
    if (!isset($_GET['page'])) {
        $_GET['page'] = "home";
    }

    // ROUTER

    if ( isset($_GET['admin']) && $_GET['admin'] == 'addPage') {

        $model = new PageModel($_POST);
        //$model->getOne($_GET['page']);
        $view = new AdminPageView($model, $_GET['admin']);

    } else if (isset($_GET['page'])) {

        $model = new PageModel();
        $model->getOne($_GET['page']);
        $view = new PageView($model);

    } else {

        $model = new NotFoundModel();
        $view = new NotFoundView($model);

    }

    if ($view) {
        $view->render();
    } else {
        echo "Nothing to render.";
    }

} catch (Exception $e) {
    echo "<hr>";
    echo "<h3>PHP Error</h3>";
    if (HOST_TYPE == "dev") {
        echo "<h4>" . $e->getMessage() . "</h4>";
        echo "<pre>";
        var_dump($e);
        echo "</pre>";
    }
    echo "<hr>";
    exit();
}