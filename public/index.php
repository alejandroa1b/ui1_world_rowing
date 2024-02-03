<?php

require_once __DIR__ . '/../vendor/autoload.php';

$request = $_SERVER['REQUEST_URI'];

$routes = require __DIR__ . '/../config/routes.php';

$requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routeExists = false;

foreach ($routes as $route => $dataRoute) {
    if (strpos($route, '{id}') !== false) {
        $route = str_replace("{id}", "([0-9]+)", $route);
    }

    if (preg_match("~^$route$~", $requestUri, $matches)) {
        $routeExists = true;
        array_shift($matches);
        $controllerClass = $dataRoute['controller'];
        $methodName = $dataRoute['method'];
        $controller = new $controllerClass();
        $controller->$methodName(...$matches);
        break;
    }
}

if (!$routeExists) {
    // Ruta no encontrada, manejar el error o redireccionar
    http_response_code(404);
    require __DIR__ . '/../src/View/404.php';
}
