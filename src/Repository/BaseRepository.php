<?php

namespace App\Repository;

use App\Database\DatabaseConnection;
use PDO;
use PDOStatement;

/**
 * Clase base para los repositorios
 */
abstract class BaseRepository
{

    /**
     * @var PDO
     */
    protected $dbConnection;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dbConnection = DatabaseConnection::getConnection();
    }

    /**
     * Obtener el nombre de la tabla para cada repositorio
     * @return string
     */
    abstract protected function getTableName(): string;

    /**
     * Definir la forma concreta en cada repositorio de mapear una fila a un objeto
     * @param array $row
     */
    abstract protected function mapRowToObject(array $row);

    /**
     * Definir la forma concreta en cada repositorio de mapear un objeto a una fila
     * @param $object
     */
    abstract protected function mapObjectToRow($object): array;

    /**
     * Ejecutar una consulta
     *
     * @param string $sql
     * @param array $parameters
     * @return PDOStatement
     */
    protected function executeQuery(string $sql, array $parameters = [])
    {
        $stmt = $this->dbConnection->prepare($sql);
        $stmt->execute($parameters);
        return $stmt;
    }

    /**
     * Buscar una entidad por su id
     *
     * @param int $id
     * @return null
     */
    public function find(int $id)
    {
        $stmt = $this->executeQuery("SELECT * FROM {$this->getTableName()} WHERE id = :id", ['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ? $this->mapRowToObject($row) : null;

    }

    /**
     * Buscar todas las entidades
     *
     * @return array
     */
    public function findAll(): array
    {
        $stmt = $this->executeQuery("SELECT * FROM {$this->getTableName()}");
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return array_map([$this, 'mapRowToObject'], $rows);
    }

    /**
     * Insertar una entidad
     *
     * @param $object
     * @return bool
     */
    public function insert($object): bool
    {
        $row = $this->mapObjectToRow($object);
        $columns = implode(', ', array_keys($row));
        $values = implode(', ', array_map(function ($value) {
            return ":$value";
        }, array_keys($row)));

        $sql = "INSERT INTO {$this->getTableName()} ($columns) VALUES ($values)";
        $stmt = $this->executeQuery($sql, $row);
        return $stmt->rowCount() === 1;
    }

    /**
     * Actualizar una entidad
     *
     * @param $object
     * @return bool
     */
    public function update($object): bool
    {
        $row = $this->mapObjectToRow($object);
        $set = implode(', ', array_map(function ($value) {
            return "$value = :$value";
        }, array_keys($row)));

        $sql = "UPDATE {$this->getTableName()} SET $set WHERE id = :id";
        $stmt = $this->executeQuery($sql, $row);
        return $stmt->rowCount() === 1;
    }

    /**
     * Eliminar una entidad
     *
     * @param $object
     * @return bool
     */
    public function delete($object): bool
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        $stmt = $this->executeQuery($sql, ['id' => $object->getId()]);
        return $stmt->rowCount() === 1;
    }
}