<?php

namespace App\Repository;

use App\Model\Resultados\Edicion;

/**
 * Repositorio de ediciones del campenato
 */
class EdicionRepository extends BaseRepository
{
        /**
        * @inheritDoc
        */
        protected function getTableName(): string
        {
            return 'ediciones';
        }

        /**
        * @inheritDoc
        */
        protected function mapRowToObject(array $row)
        {
            return (new Edicion())
                ->setId($row['id'])
                ->setNombre($row['nombre'])
                ->setGenero($row['genero'])
                ->setCodigo($row['codigo']);
        }

        /**
        * @inheritDoc
        */
        protected function mapObjectToRow($object): array
        {
            return [
                'id' => $object->getId(),
                'nombre' => $object->getNombre(),
                'genero' => $object->getGenero(),
                'codigo' => $object->getCodigo()
            ];
        }
}