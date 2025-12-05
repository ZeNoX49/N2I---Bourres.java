<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    $_SESSION["nb_tentavives_form"] = 0;
    $_SESSION["nb_snake_point"] = 0;
    $_SESSION["nb_lasergame_point"] = 0;
    $_SESSION["required_snake_point"] = 0;
    $_SESSION["required_lasergame_point"] = 0;
}

function dispatch()
{ //dispatcher les action sur les controller

    $action = $_GET['action'] ?? 'startPage';

    // On garde uniquement la partie avant le slash
    $parts = explode('/', $action);
    $controllerName = $parts[0] . 'Controller';

    $controllerFile = "app/controller/$controllerName.php";

    if (!file_exists($controllerFile)) {
        die("Controller $controllerName not found.");
    }

    require_once $controllerFile;

    $controller = new $controllerName();

    $controller->show();
}

dispatch();