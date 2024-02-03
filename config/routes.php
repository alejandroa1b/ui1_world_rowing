<?php

use App\Controller\HomeController;
use App\Controller\MantenimientoController;
use App\Controller\NoticiasController;
use App\Controller\ResultadosController;

return [
    '/' => [
        'controller' => HomeController::class,
        'method' => 'index'
    ],
    '/noticias/([0-9]+)' => [
        'controller' => NoticiasController::class,
        'method' => 'show'
    ],
    '/resultados' => [
        'controller' => ResultadosController::class,
        'method' => 'list'
    ],
    '/resultados/([0-9]+)' => [
        'controller' => ResultadosController::class,
        'method' => 'show'
    ],
    '/mantenimiento' => [
        'controller' => MantenimientoController::class,
        'method' => 'index'
    ]
];