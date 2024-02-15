<?php

namespace App\Service\Resultados;

use App\Model\Resultados\Edicion;
use App\Model\Resultados\EdicionResultadoDeportista;
use App\Repository\DeportistaRepository;
use App\Repository\EdicionRepository;
use App\Repository\ResultadosEdicionRepository;

/**
 * Servicio para la lógica de negocio del módulo de resultados
 */
class ResultadosService
{
    /**
     * @var EdicionRepository
     */
    private $edicionRepository;

    /**
     * @var DeportistaRepository
     */
    private $deportistaRepository;

    /**
     * @var ResultadosEdicionRepository
     */
    private $resultadosEdicionRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->edicionRepository = new EdicionRepository();
        $this->deportistaRepository = new DeportistaRepository();
        $this->resultadosEdicionRepository = new ResultadosEdicionRepository();
    }

    /**
     * Obtener las ediciones del campeonato
     * @return Edicion[]
     */
    public function getEdiciones(): array
    {
        return $this->edicionRepository->findAll();
    }


    /**
     * Obtener una edición del campeonato por su ID
     * @param int $idEdicion
     * @return Edicion|null
     */
    public function getEdicion(int $idEdicion): ?Edicion
    {
        return $this->edicionRepository->find($idEdicion);
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
        if (empty($genero) || empty($codigo) || empty($nombre) || ($genero != 'masculino' && $genero != 'femenino') || (strlen($codigo) > 50) || strlen($codigo) < 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>]/', $codigo)) {
            return false;
        }

        // Generamos la edición
        $edicion = (new Edicion())
            ->setGenero($genero)
            ->setCodigo($codigo)
            ->setNombre($nombre);

        // Insertamos la edición
        return $this->edicionRepository->insert($edicion);
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
        if ((empty($genero) || empty($codigo) || empty($nombre) || ($genero != 'masculino' && $genero != 'femenino') || strlen($codigo) > 50 || strlen($codigo) < 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $codigo))) {
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

        // Actualizamos la edición
        return $this->edicionRepository->update($edicion);
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

        // Eliminamos la edición
        return $this->edicionRepository->delete($edicion);
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
        return $this->resultadosEdicionRepository->findByEdicion($idEdicion);
    }

    /**
     * Obtener un resultado de una edición del campeonato
     * @param int $idResultadoEdicion
     * @return EdicionResultadoDeportista|null
     */
    public function getResultadoEdicion(int $idResultadoEdicion): ?EdicionResultadoDeportista
    {
       return $this->resultadosEdicionRepository->find($idResultadoEdicion);
    }

    public function createResultadoEdicion(int $idEdicion, int $idDeportista, int $posicion, string $tiempo): bool
    {
        // Validamos que el tiempo sea un número entero
        if (!is_numeric($tiempo)) {
            return false;
        }

        // Creamos el resultado
        $edicion = $this->edicionRepository->find($idEdicion);
        $deportista = $this->deportistaRepository->find($idDeportista);
        $resultado = (new EdicionResultadoDeportista())
            ->setEdicion($edicion)
            ->setDeportista($deportista)
            ->setPosicion($posicion)
            ->setTiempo($tiempo);

        // Insertamos el resultado
        return $this->resultadosEdicionRepository->insert($resultado);
    }

    /**
     * Actualizar un resultado de una edición del campeonato
     *
     * @param int $idResultado
     * @param int $idDeportista
     * @param int $posicion
     * @param string $tiempo
     * @return bool
     */
    public function updateResultadoEdicion(int $idResultado, int $idDeportista, int $posicion, string $tiempo): bool
    {

        // Validamos que el tiempo sea un número entero
        if (!is_numeric($tiempo)) {
            return false;
        }

        // Obtenemos el resultado a actualizar
        $resultado = $this->getResultadoEdicion($idResultado);
        if (!$resultado) {
            return false;
        }


        // Creamos el resultado
        $deportista = $this->deportistaRepository->find($idDeportista);
        $resultado
            ->setDeportista($deportista)
            ->setPosicion($posicion)
            ->setTiempo($tiempo);

        // Insertamos el resultado
        return $this->resultadosEdicionRepository->update($resultado);
    }


    /**
     * Eliminar un resultado de una edición del campeonato
     * @param int $idResultado
     * @return bool
     */
    public function deleteResultado(int $idResultado): bool
    {
        // Obtenemos la edición
        $resultado = $this->resultadosEdicionRepository->find($idResultado);
        if (!$resultado) {
            return false;
        }

        // Eliminamos la edición
        return $this->resultadosEdicionRepository->delete($resultado);
    }
}
