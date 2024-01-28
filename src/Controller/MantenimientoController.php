<?php

namespace App\Controller;

/**
 * Controlador para el mantenimiento de la aplicación
 */
class MantenimientoController extends AbstractController
{
    /**
     * Función para mostrar la página de mantenimiento
     */
    public function index()
    {
        $this->renderView('Mantenimiento/index', []);
    }
}