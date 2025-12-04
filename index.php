<?php
if(session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

function dispatch() {

    $action = $_GET['action'] ?? 'exemple';

    $parts = explode('/', $action);

    // ucfirst() capitalizes the first letter
    $controllerName = $parts[0] . 'Controller';

    $method = $parts[1] ?? 'show';

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