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
     * Crear una nueva edición del campeonato
     * @param string $genero
     * @param string $codigo
     * @param string $nombre
     * @return bool
     */
    public function createEdicion(string $genero, string $codigo, string $nombre): bool
    {
        // Validamos que los campos no estén vacios, que el género sea masculino o femenino y que el código y el nombre no tengan longitud menor o mayor a 50, además solo caracteres alfanumericos y espacios
        if (empty($genero) || empty($codigo) || empty($nombre) || ($genero != 'masculino' && $genero != 'femenino') || strlen($codigo) > 50 || strlen($codigo) < 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $codigo)) {
            return false;
        }
        // Generamos la edición
        $edicion = (new Edicion())
            ->setGenero($genero)
            ->setCodigo($codigo)
            ->setNombre($nombre);

        return true; // TODO: Guardar la edición en el repositorio
    }

    /**
     * Actualizar una edición del campeonato
     * @param int $idEdicion
     * @param string $genero
     * @param string $codigo
     * @param string $nombre
     * @return bool
     */
    public function updateEdicion(int $idEdicion, string $genero, string $codigo, string $nombre): bool
    {
        // Validamos que los campos no estén vacios, que el género sea masculino o femenino y que el código y el nombre no tengan longitud menor o mayor a 50, además solo caracteres alfanumericos y espacios
        if (empty($genero) || empty($codigo) || empty($nombre) || ($genero != 'masculino' && $genero != 'femenino') || strlen($codigo) > 50 || strlen($codigo) < 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $codigo)) {
            return false;
        }

        // Obtenemos la edición
        $edicion = $this->getEdicion($idEdicion);
        if (!$edicion) {
            return false;
        }

        // Actualizamos la edición
        $edicion
            ->setId($idEdicion)
            ->setGenero($genero)
            ->setCodigo($codigo)
            ->setNombre($nombre);

        return true; // TODO: Actualizar la edición en el repositorio
    }

    /**
     * Eliminar una edición del campeonato
     * @param int $idEdicion
     * @return bool
     */
    public function deleteEdicion(int $idEdicion): bool
    {
        // Obtenemos la edición
        $edicion = $this->getEdicion($idEdicion);
        if (!$edicion) {
            return false;
        }

        return true; // TODO: Eliminar la edición del repositorio
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
