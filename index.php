<?php
session_start();

define('ROOT_PATH', __DIR__ . '/');

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

function dispatch() {

    $action = isset($_GET['action']) ? $_GET['action'] : 'exemple';

    $parts = explode('/', $action);

    // ucfirst() capitalizes the first letter
    $controllerName = $parts[0] . 'Controller';

    $method = isset($parts[1]) ? $parts[1] : 'show';

    $controllerFile = "app/controller/$controllerName.php";

    if (!file_exists($controllerFile)) {
        die("Controller $controllerName not found.");
    }

    require_once $controllerFile;

    $controller = new $controllerName();

    if (!method_exists($controller, $method)) {
        die("Method $method not found in $controllerName.");
    }

    $controller->$method();
}

dispatch();