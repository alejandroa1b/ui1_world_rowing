<?php

namespace App\Controller;

use App\Service\Deportistas\DeportistasService;

/**
 * Controlador para la sección de deportistas
 */
class DeportistasController extends AbstractController
{
    /**
     * @var DeportistasService
     */
    private $deportistasService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deportistasService = new DeportistasService();
    }

    /**
     * Función para el listado de los distintos deportistas
     * @return void
     */
    public function list()
    {
        $this->renderView('Deportistas/list', [
            'deportistas' => $this->deportistasService->getDeportistas()
        ]);
    }
}
