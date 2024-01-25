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
}