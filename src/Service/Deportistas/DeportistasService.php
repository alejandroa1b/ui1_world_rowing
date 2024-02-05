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
    public function getDeportistas(): array
    {
        $deportistas = []; // TODO: Obtener los deportistas del repositorio
        return $deportistas;
    }

    /**
     * Función para obtener un deportista por su identificador
     * @param int $id
     * @return Deportista|null
     */
    public function getDeportista(int $id): ?Deportista
    {
        $deportista = new Deportista(); // TODO: Obtener el deportista del repositorio
        return $deportista;
    }

    /**
     * Función para crear un nuevo deportista
     * @param string|null $codPais
     * @param string|null $nombre
     * @return bool
     */
    public function createDeportista(string $codPais = null, string $nombre = null): bool
    {
        // Validamos que los campos no estén vacios, que el código del país no tenga longitud menor o mayor a 3 y que no se intnenten inyecciones sql ni similares
        if (empty($codPais) || empty($nombre) || strlen($codPais) != 3 || strlen($nombre) > 50 || strlen($nombre) < 3 || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $nombre) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $codPais)) {
            return false;
        }

        // Generamos el deportista
        $deportista = (new Deportista())
            ->setCodPais($codPais)
            ->setNombre($nombre);

        return true; // TODO: Guardar el deportista en el repositorio
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
        // Validamos que los campos no estén vacios, que el código del país no tenga longitud menor o mayor a 3 y que no se intnenten inyecciones sql ni similares
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

        return true; // TODO: Guardar el deportista en el repositorio
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

        return true; // TODO: Eliminar el deportista del repositorio
    }
}