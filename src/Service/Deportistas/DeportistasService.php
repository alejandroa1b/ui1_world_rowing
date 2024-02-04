<?php

namespace App\Service\Deportistas;

use App\Model\Deportistas\Deportista;

/**
 * Servicio para la lógica de negocio del módulo de deportistas
 */
class DeportistasService
{
    /**
     * Función para obtener todos los deportistas
     * @return Deportista[]
     */
    public function getDeportistas()
    {
        $deportistas = []; // TODO: Obtener los deportistas del repositorio
        return $deportistas;
    }
}