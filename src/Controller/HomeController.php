<?php

namespace App\Controller;

use App\Service\Noticias\NoticiasService;

/**
 * Controlador de inicio
 */
class HomeController extends AbstractController
{
    /**
     * @var NoticiasService
     */
    private $noticiasService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->noticiasService = new NoticiasService();
    }

    /**
     * Función principal
     */
    public function index()
    {
        $this->renderView('Home/home',[
            'mensaje' => "Hola UI1!",
            'noticias' => $this->noticiasService->getUltimasNoticias(5)
        ]);
    }
}