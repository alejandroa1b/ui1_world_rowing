<?php

namespace App\Model\Noticias;

class Noticia
{
    /**
     * Identificador de la noticia
     * @var int
     */
    private $id;

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

    public function setId(int $id): Noticia
    {
        $this->id = $id;
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