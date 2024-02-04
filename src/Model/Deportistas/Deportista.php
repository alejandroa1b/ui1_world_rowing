<?php

namespace App\Model\Deportistas;

/**
 * Representa un deportista
 */
class Deportista
{
    /**
     * Identificador del deportista
     * @var int
     */
    private $id;

    /**
     * Código de identificación del país del deportista
     * @var string
     */
    private $codPais;

    /**
     * Nombre del deportista
     * @var string
     */
    private $nombre;

    /**
     * @return int
     */
    public function getId(): int
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
    public function getCodPais(): string
    {
        return $this->codPais;
    }

    /**
     * @param string $codPais
     * @return $this
     */
    public function setCodPais(string $codPais): self
    {
        $this->codPais = $codPais;
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