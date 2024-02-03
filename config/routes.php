<?php

use App\Controller\HomeController;
use App\Controller\MantenimientoController;
use App\Controller\NoticiasController;

return [
    '/' => [
        'controller' => HomeController::class,
        'method' => 'index'
    ],
    '/noticias/([0-9]+)' => [
        'controller' => NoticiasController::class,
        'method' => 'show'
    ],
    '/mantenimiento' => [
        'controller' => MantenimientoController::class,
        'method' => 'index'
    ]
];