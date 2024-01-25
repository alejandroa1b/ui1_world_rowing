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
        $this->renderView('home/home',[
            'mensaje' => "Hola UI1!"
        ]);
    }
}