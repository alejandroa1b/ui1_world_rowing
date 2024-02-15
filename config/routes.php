<?php

use App\Controller\DeportistasController;
use App\Controller\HomeController;
use App\Controller\MantenimientoController;
use App\Controller\NoticiasController;
use App\Controller\ResultadosController;
use App\Controller\SecurityController;

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
        'method' => 'listEdiciones'
    ],
    '/resultados/{id}' => [
        'controller' => ResultadosController::class,
        'method' => 'showEdicion'
    ],
    '/deportistas' => [
        'controller' => DeportistasController::class,
        'method' => 'list'
    ],
    '/contacto' => [
        'controller' => HomeController::class,
        'method' => 'contact'
    ],
    '/mantenimiento' => [
        'controller' => MantenimientoController::class,
        'method' => 'index'
    ],
    '/mantenimiento/noticias' => [
        'controller' => MantenimientoController::class,
        'method' => 'noticias'
    ],
    '/mantenimiento/noticias/new' => [
        'controller' => MantenimientoController::class,
        'method' => 'newNoticia'
    ],
    '/mantenimiento/noticias/edit/{id}' => [
        'controller' => MantenimientoController::class,
        'method' => 'editNoticia'
    ],
    '/mantenimiento/noticias/del/{id}' => [
        'controller' => MantenimientoController::class,
        'method' => 'delNoticia'
    ],
    '/mantenimiento/deportistas' => [
        'controller' => MantenimientoController::class,
        'method' => 'deportistas'
    ],
    '/mantenimiento/deportistas/new' => [
        'controller' => MantenimientoController::class,
        'method' => 'newDeportista'
    ],
    '/mantenimiento/deportistas/edit/{id}' => [
        'controller' => MantenimientoController::class,
        'method' => 'editDeportista'
    ],
    '/mantenimiento/deportistas/del/{id}' => [
        'controller' => MantenimientoController::class,
        'method' => 'delDeportista'
    ],
    '/mantenimiento/resultados' => [
        'controller' => MantenimientoController::class,
        'method' => 'resultados'
    ],
    '/mantenimiento/resultados/new' => [
        'controller' => MantenimientoController::class,
        'method' => 'newEdicion'
    ],
    '/mantenimiento/resultados/edit/{id}' => [
        'controller' => MantenimientoController::class,
        'method' => 'editEdicion'
    ],
    '/mantenimiento/resultados/del/{id}' => [
        'controller' => MantenimientoController::class,
        'method' => 'delEdicion'
    ],
    '/login' => [
        'controller' => SecurityController::class,
        'method' => 'login'
    ],
    '/logout' => [
        'controller' => SecurityController::class,
        'method' => 'logout'
    ],
];