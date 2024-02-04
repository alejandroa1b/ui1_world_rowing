<?php

namespace App\Service\Resultados;

use App\Model\Resultados\Edicion;

/**
 * Servicio para la lógica de negocio del módulo de resultados
 */
class ResultadosService
{
    /**
     * Obtener las ediciones del campeonato
     * @return Edicion[]
     */
    public function getEdiciones(): array
    {
        $ediciones = []; // TODO: Obtener las ediciones cuando estas existan en base de datos
        return $ediciones;
    }


    /**
     * Obtener una edición del campeonato por su ID
     * @param int $idEdicion
     * @return Edicion|null
     */
    public function getEdicion(int $idEdicion): ?Edicion
    {
        $edicion = null; // TODO: Obtener la edición cuando estas existan en base de datos
        return $edicion;
    }

    /**
     * Obtener los resultados de una edidición del campeonato.
     * Ordenados en función de su posición
     *
     * @param int $idEdicion
     * @return array
     */
    public function getResultadosEdicion(int $idEdicion): array
    {
        $resultados = []; // TODO: Obtener los resultados de la edición cuando existan en base de datos.
        return $resultados;
    }
}
