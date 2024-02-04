<?php

namespace App\Controller;

use App\Service\Resultados\ResultadosService;

/**
 * Controlador para la sección de resultados
 */
class ResultadosController extends AbstractController
{
    /**
     * @var ResultadosService
     */
    private $resultadosService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->resultadosService = new ResultadosService();
    }

    /**
     * Función para el listado de las ediciones de campeonatos
     * @return void
     */
    public function listEdiciones()
    {
        $this->renderView('Resultados/ediciones', [
            'ediciones' => $this->resultadosService->getEdiciones()
        ]);
    }

    /**
     * Función para ver los resultados de una edición
     * @param int $id
     * @return void
     */
    public function showEdicion(int $id)
    {
        echo "En desarrollo...";
    }
}
