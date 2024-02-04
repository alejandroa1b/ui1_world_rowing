<?php

namespace App\Model\Noticias;

use DateTime;
use Exception;

class Noticia
{
    /**
     * Identificador de la noticia
     * @var int
     */
    private $id;

    /**
     * Fecha de la noticia
     * @var DateTime
     */
    private $fecha;

    /**
     * Titular de la noticia
     * @var string
     */
    private $titular;

    /**
     * Cuerpo de la noticia
     * @var string
     */
    private $cuerpo;

    /**
     * URL de la imagen de la noticia
     * @var string
     */
    private $imageURL;

    /**
     * Constructor
     */
    public function __construct()
    {
    }

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
    public function setId(int $id): Noticia
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFecha(): DateTime
    {
        return $this->fecha;
    }

    /**
     * @param DateTime $fecha
     * @return $this
     */
    public function setFecha(DateTime $fecha): self
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * Obtener la fecha en formato normalizado
     * @return string
     */
    public function getFechaNormalizada(): string
    {
        return $this->fecha->format('Y-m-d H:i:s');
    }

    /**
     * Función para establecer la fecha a partir de una cadena normalizada.
     * Formato de la cadena válido: Y-m-d H:i:s
     * @param string $fecha
     * @return $this
     *
     * @throws Exception
     */
    public function setFechaNormalizada(string $fecha): self
    {
        $this->fecha = new DateTime($fecha);
        return $this;
    }

    /**
     * @return string
     */
    public function getTitular(): string
    {
        return $this->titular;
    }

    /**
     * @param string $titular
     * @return Noticia
     */
    public function setTitular(string $titular): Noticia
    {
        $this->titular = $titular;
        return $this;
    }

    /**
     * @return string
     */
    public function getCuerpo(): string
    {
        return $this->cuerpo;
    }

    /**
     * @return string
     */
    public function getResumenCuerpo()
    {
        return substr($this->cuerpo, 0, 150);
    }

    /**
     * @param string $cuerpo
     * @return Noticia
     */
    public function setCuerpo(string $cuerpo): Noticia
    {
        $this->cuerpo = $cuerpo;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageURL(): string
    {
        return $this->imageURL;
    }

    /**
     * @param string $imageURL
     * @return $this
     */
    public function setImageURL(string $imageURL): Noticia
    {
        $this->imageURL = $imageURL;
        return $this;
    }
}