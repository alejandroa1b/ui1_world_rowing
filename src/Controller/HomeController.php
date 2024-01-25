<?php

namespace App\Controller;

/**
 * Controlador de inicio
 */
class HomeController extends AbstractController
{
    /**
     * Función principal
     */
    public function index()
    {
        $this->renderView('Home/home',[
            'mensaje' => "Hola UI1!"
        ]);
    }
}