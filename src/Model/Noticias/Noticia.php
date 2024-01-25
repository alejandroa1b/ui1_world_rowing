<?php

namespace App\Model\Noticias;

class Noticia
{
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
     * Constructor
     */
    public function __construct()
    {
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
}