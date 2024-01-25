<?php

namespace App\Controller;

/**
 * Clase abstracta de la que extenderán los controladores para tener una funcionalidad base
 */
abstract class AbstractController
{
    /**
     * Reenderizado de vistas
     *
     * @param $viewName
     * @param $data
     * @return void
     */
    protected function renderView($viewName, $data)
    {
        extract($data);

        require __DIR__ . '/../View/' . $viewName . '.php';
    }

    /**
     * @return void
     */
    protected function returnNotFound() {
        // Ruta no encontrada, manejar el error o redireccionar
        http_response_code(404);
        require __DIR__ . '/../View/404.php';
        exit;
    }
}