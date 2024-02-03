<?php

use App\Controller\HomeController;
use App\Controller\MantenimientoController;
use App\Controller\NoticiasController;
use App\Controller\ResultadosController;

/**
 * Configuración de Rutas del Proyecto
 *
 * Este archivo define todas las rutas disponibles en la aplicación y asocia cada una
 * con un controlador y un método específico. El sistema de enrutamiento soporta el uso
 * de comodines en las rutas para permitir la captura de parámetros dinámicos.
 *
 * Comodines disponibles:
 *   {id}: Utilizado para capturar identificadores numéricos en las URLs.
 *
 * Ejemplo de uso:
 *   '/noticias/{id}' se traduce en una llamada al método `show` del `NoticiasController`,
 *   pasando el `id` como parámetro.
 */
return [
    '/' => [
        'controller' => HomeController::class,
        'method' => 'index'
    ],
    '/noticias/{id}' => [
        'controller' => NoticiasController::class,
        'method' => 'show'
    ],
    '/resultados' => [
        'controller' => ResultadosController::class,
        'method' => 'list'
    ],
    '/resultados/{id}' => [
        'controller' => ResultadosController::class,
        'method' => 'show'
    ],
    '/mantenimiento' => [
        'controller' => MantenimientoController::class,
        'method' => 'index'
    ]
];