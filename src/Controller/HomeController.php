<?php

namespace App\Controller;

use App\Service\Noticias\NoticiasService;
use Exception;

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
     * @throws Exception
     */
    public function index()
    {
        $this->renderView('Home/home',[
            'noticias' => $this->noticiasService->getUltimasNoticias(3)
        ]);
    }
}