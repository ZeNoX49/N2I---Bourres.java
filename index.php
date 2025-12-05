<?php
session_start();

define('ROOT_PATH', __DIR__ . '/');

function dispatch()
{ //dispatcher les action sur les controller

    $action = isset($_GET['action']) ? $_GET['action'] : 'exemple';

    $controllerName = $action . 'Controller';

    $controllerFile = "app/controller/$controllerName.php";

    if (!file_exists($controllerFile)) {
        die("Controller $controllerName not found.");
    }

    require_once $controllerFile;

    $controller = new $controllerName();

    $controller->show();
}

dispatch();