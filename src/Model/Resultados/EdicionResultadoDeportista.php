<?php

namespace App\Model\Resultados;

use App\Model\Deportistas\Deportista;

/**
 * Representa el resultado de um deportista en una edición
 */
class EdicionResultadoDeportista
{
    /**
     * Identificador del resultado
     * @var int
     */
    private $id;

    /**
     * Edición a la que pertenece el resultado
     * @var Edicion
     */
    private $edicion;

    /**
     * Deportista al que peretence el resultado
     * @var Deportista
     */
    private $deportista;

    /**
     * Posición del deportista dentro de la edición
     * @var int
     */
    private $posicion;

    /**
     * Tiempo que le ha llevado al deportista completar la prueba (en segundos)
     * @var int
     */
    private $tiempo;

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
     * @return Edicion
     */
    public function getEdicion(): Edicion
    {
        return $this->edicion;
    }

    /**
     * @param Edicion $edicion
     * @return $this
     */
    public function setEdicion(Edicion $edicion): self
    {
        $this->edicion = $edicion;
        return $this;
    }

    /**
     * @return Deportista
     */
    public function getDeportista(): Deportista
    {
        return $this->deportista;
    }

    /**
     * @param Deportista $deportista
     * @return $this
     */
    public function setDeportista(Deportista $deportista): self
    {
        $this->deportista = $deportista;
        return $this;
    }

    /**
     * @return int
     */
    public function getPosicion(): int
    {
        return $this->posicion;
    }

    /**
     * @param int $posicion
     * @return $this
     */
    public function setPosicion(int $posicion): self
    {
        $this->posicion = $posicion;
        return $this;
    }

    /**
     * @return int
     */
    public function getTiempo(): int
    {
        return $this->tiempo;
    }

    /**
     * @param int $tiempo
     * @return $this
     */
    public function setTiempo(int $tiempo): self
    {
        $this->tiempo = $tiempo;
        return $this;
    }

    /**
     * Función de ayuda para obtener el tiempo de forma normalizada
     * @return string
     */
    public function getTiempoNormalizado(): string
    {
        $minutos = floor($this->tiempo / 60);
        $segundos = $this->tiempo % 60;
        return sprintf('%02d:%02d', $minutos, $segundos);
    }

    /**
     * Función de ayuda para establecer el tiempo a partir de minutos y segundos
     * @param int $minutos
     * @param int $segundos
     * @return $this
     */
    public function setTiempoNormalizado(int $minutos, int $segundos): self
    {
        $this->tiempo = ($minutos * 60) + $segundos;
        return $this;
    }
}
