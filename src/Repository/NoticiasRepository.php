<?php

namespace App\Repository;

use App\Model\Noticias\Noticia;
use Exception;

class NoticiasRepository extends BaseRepository
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * @inheritDoc
     */
    protected function getTableName(): string
    {
        return 'noticias';
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    protected function mapRowToObject(array $row): Noticia
    {
        return (new Noticia())
            ->setId($row['id'])
            ->setFecha(new \DateTime($row['fecha']))
            ->setTitular($row['titular'])
            ->setCuerpo($row['cuerpo'])
            ->setImageURL($row['imageURL']);
    }

    /**
     * @inheritDoc
     * @var Noticia $object
     */
    protected function mapObjectToRow($object): array
    {
        return [
            'id' => $object->getId(),
            'fecha' => $object->getFecha()->format('Y-m-d H:i:s'),
            'titular' => $object->getTitular(),
            'cuerpo' => $object->getCuerpo(),
            'imageURL' => $object->getImageURL()
        ];
    }
}