<?php

require_once __DIR__ . '/../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

$routes = require __DIR__ . '/../config/routes.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (array_key_exists($requestUri, $routes)) {
    $controllerName = $routes[$requestUri]['controller'];
    $methodName = $routes[$requestUri]['method'];
    $controller = new $controllerName();
    $controller->$methodName();
} else {
    // Ruta no encontrada, manejar el error o redireccionar
    http_response_code(404);
    require __DIR__ . '/../src/View/404.php';
}