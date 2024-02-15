<?php

namespace App\Service\Deportistas;

use App\Model\Deportistas\Deportista;
use App\Repository\DeportistaRepository;

/**
 * Servicio para la lógica de negocio del módulo de deportistas
 */
class DeportistasService
{
    /**
     * @var DeportistaRepository
     */
    private $deportistaRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->deportistaRepository = new DeportistaRepository();
    }

    /**
     * Función para obtener todos los deportistas
     * @return Deportista[]
     */
    public function getDeportistas(): array
    {
        return $this->deportistaRepository->findAll();
    }

    /**
     * Función para obtener un deportista por su identificador
     * @param int $id
     * @return Deportista|null
     */
    public function getDeportista(int $id): ?Deportista
    {
        return $this->deportistaRepository->find($id);
    }

    /**
     * Función para crear un nuevo deportista
     * @param string|null $codPais
     * @param string|null $nombre
     * @return bool
     */
    public function createDeportista(string $codPais = null, string $nombre = null): bool
    {
        // Validamos que los campos no estén vacíos, que el código del país no tenga longitud menor o mayor a 3 y que no se intenten inyecciones sql ni similares
        if (empty($codPais) || empty($nombre) || strlen($codPais) != 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $codPais)) {
            return false;
        }

        // Generamos el deportista
        $deportista = (new Deportista())
            ->setCodPais($codPais)
            ->setNombre($nombre);

        // Insertamos el deportista
        return $this->deportistaRepository->insert($deportista);
    }

    /**
     * Función para editar un deportista
     * @param int $id
     * @param string|null $codPais
     * @param string|null $nombre
     * @return bool
     */
    public function updateDeportista(int $id, string $codPais = null, string $nombre = null): bool
    {
        // Validamos que los campos no estén vacíos, que el código del país no tenga longitud menor o mayor a 3 y que no se intnenten inyecciones sql ni similares
        if (empty($codPais) || empty($nombre) || strlen($codPais) != 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $codPais)) {
            return false;
        }

        // Obtenemos el deportista
        $deportista = $this->getDeportista($id);
        if (!$deportista) {
            return false;
        }

        // Actualizamos el deportista
        $deportista
            ->setCodPais($codPais)
            ->setNombre($nombre);

        // Actualizamos el deportista
        return $this->deportistaRepository->update($deportista);
    }

    /**
     * Función para eliminar un deportista
     * @param int $id
     * @return bool
     */
    public function deleteDeportista(int $id): bool
    {
        // Obtenemos el deportista
        $deportista = $this->getDeportista($id);
        if (!$deportista) {
            return false;
        }

        // Eliminamos el deportista
        return $this->deportistaRepository->delete($deportista);
    }
}