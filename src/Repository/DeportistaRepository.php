<?php

namespace App\Repository;

use App\Model\Deportistas\Deportista;

/**
 * Repositorio de deportistas
 */
class DeportistaRepository extends BaseRepository
{

    /**
     * @inheritDoc
     */
    protected function getTableName(): string
    {
        return 'deportistas';
    }

    /**
     * @inheritDoc
     */
    protected function mapRowToObject(array $row)
    {
        return (new Deportista())
            ->setId($row['id'])
            ->setNombre($row['nombre'])
            ->setCodPais($row['codPais']);
    }

    /**
     * @inheritDoc
     */
    protected function mapObjectToRow($object): array
    {
        return [
            'id' => $object->getId(),
            'nombre' => $object->getNombre(),
            'codPais' => $object->getCodPais()
        ];
    }
}