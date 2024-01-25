<?php

namespace App\Controller;

use App\Service\Noticias\NoticiasService;

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
     * Función para listar las noticias
     */
    public function list()
    {
        $this->renderView('Noticias/list', [
            'noticias' => $this->noticiasService->getUltimasNoticias()
        ]);
    }

    /**
     * Función para ver una noticia
     * @param int $idNoticia
     * @return void
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