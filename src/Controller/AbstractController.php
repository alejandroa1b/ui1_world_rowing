<?php

namespace App\Controller;

/**
 * Clase abstracta de la que extenderán los controladores para tener una funcionalidad base
 */
abstract class AbstractController
{
    /**
     * Renderizado de vistas
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
     * Función para retornar un error 404
     * @return void
     */
    protected function returnNotFound()
    {
        // Ruta no encontrada, manejar el error o redireccionar
        http_response_code(404);
        require __DIR__ . '/../View/404.php';
        exit;
    }

    /**
     * Función para redireccionar a una ruta
     * @param string $route
     * @return void
     */
    protected function redirect(string $route)
    {
        header('Location: ' . $route);
        exit;
    }

    /**
     * Función para requerir login
     * @return void
     */
    protected function requireLogin()
    {
        if (!isset($_SESSION['user'])) {
            $this->redirect('/login?redirect=' . $_SERVER['REQUEST_URI']);
        }
    }
}