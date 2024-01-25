<?php

use App\Controller\HomeController;
use App\Controller\NoticiasController;

return [
    '/' => [
        'controller' => HomeController::class,
        'method' => 'index'
    ],
    '/noticias' => [
        'controller' => NoticiasController::class,
        'method' => 'list'
    ],
    '/noticias/([0-9]+)' => [
        'controller' => NoticiasController::class,
        'method' => 'show'
    ]
];