<?php

namespace App\Controller;

use App\Service\Noticias\NoticiasService;
use Exception;

/**
 * Controlador para la sección de noticias
 */
class NoticiasController extends AbstractController
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
     * Función para ver una noticia
     * @param int $idNoticia
     * @return void
     * @throws Exception
     */
    public function show(int $idNoticia)
    {
        $noticia = $this->noticiasService->getNoticia($idNoticia);
        if ($noticia == null) {
            $this->returnNotFound();
        }
        $this->renderView('Noticias/show', [
            'noticia' =>  $noticia
        ]);
    }

}