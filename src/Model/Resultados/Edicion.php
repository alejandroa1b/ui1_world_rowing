<?php

namespace App\Model\Resultados;

/**
 * Representa una edición del campeonato
 */
class Edicion
{
    /**
     * Identificador de la edición
     * @var int
     */
    private $id;

    /**
     * Género de la competición.
     * Valores posibles: masculino/femenino
     * @var string
     */
    private $genero;

    /**
     * Código de la edición
     * @var string
     */
    private $codigo;

    /**
     * Nombre del evento
     * @var string
     */
    private $nombre;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getGenero(): string
    {
        return $this->genero;
    }

    /**
     * @param string $genero
     * @return $this
     */
    public function setGenero(string $genero): self
    {
        $this->genero = $genero;
        return $this;
    }

    /**
     * @return string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return $this
     */
    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return $this
     */
    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;
        return $this;
    }
}