<?php

namespace App\Repository;

use App\Model\Resultados\EdicionResultadoDeportista;
use PDO;

/**
 * Repositorio para los resultados de edición
 */
class ResultadosEdicionRepository extends BaseRepository
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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->edicionRepository = new EdicionRepository();
        $this->deportistaRepository = new DeportistaRepository();
    }

    /**
     * @inheritDoc
     */
    protected function getTableName(): string
    {
        return 'edicion_resultado_deportista';
    }

    /**
     * @inheritDoc
     */
    protected function mapRowToObject(array $row)
    {
        $edicion = $this->edicionRepository->find($row['edicion_id']);
        $deportista = $this->deportistaRepository->find($row['deportista_id']);

        return (new EdicionResultadoDeportista())
            ->setId($row['id'])
            ->setEdicion($edicion)
            ->setDeportista($deportista)
            ->setPosicion($row['posicion'])
            ->setTiempo($row['tiempo']);
    }

    /**
     * @inheritDoc
     */
    protected function mapObjectToRow($object): array
    {
        return [
            'id' => $object->getId(),
            'edicion_id' => $object->getEdicion()->getId(),
            'deportista_id' => $object->getDeportista()->getId(),
            'posicion' => $object->getPosicion(),
            'tiempo' => $object->getTiempo(),
        ];
    }

    /**
     * Obtener los resultados de una edición
     * @param int $idEdicion
     * @return EdicionResultadoDeportista[]
     */
    public function findByEdicion(int $idEdicion): array
    {
        $stmt = $this->executeQuery("SELECT * FROM {$this->getTableName()} WHERE edicion_id = :idEdicion", ['idEdicion' => $idEdicion]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'mapRowToObject'], $rows);
    }
}