<?php

namespace App\Service\Noticias;

use App\Model\Noticias\Noticia;
use App\Repository\NoticiasRepository;
use Exception;

/**
 * Servicio para la lógica de negocio del módulo de noticias
 */
class NoticiasService
{
    /**
     * @var NoticiasRepository
     */
    private $noticiasRepository;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->noticiasRepository = new NoticiasRepository();
    }

    /**
     * Obtener una noticia por su identificador
     * @param int $idNoticia
     * @return Noticia|null
     * @throws Exception
     */
    public function getNoticia(int $idNoticia): ?Noticia
    {
        return $this->noticiasRepository->find($idNoticia);
    }

    /**
     * Función para obtener todas las noticias
     * @return Noticia[]
     * @throws Exception
     */
    public function getNoticias(): array
    {
        return $this->noticiasRepository->findAll();
    }

    /**
     * Función que devuelve las últimas noticias
     * @param int $num Número máximo de noticias que se desea obtener. (10 por defecto)
     * @return array
     * @throws Exception
     */
    public function getUltimasNoticias(int $num = 10): array
    {
        // Falseamos las noticias
        return array_slice($this->noticiasRepository->findAll(), 0, $num);
    }

    /**
     * Función para crear una nueva noticia
     * @param string|null $titular
     * @param string|null $cuerpo
     * @param string|null $imageURL
     * @return bool
     */
    public function createNoticia(string $titular = null, string $cuerpo = null, string $imageURL = null): bool
    {
        // Validamos los datos
        if (empty($titular) || empty($cuerpo) || empty($imageURL)) {
            return false;
        }

        // Limpiamos los datos
        $titular = htmlspecialchars($titular);
        $cuerpo = htmlspecialchars($cuerpo);
        $imageURL = htmlspecialchars($imageURL);

        // Creamos la noticia
        $noticia = (new Noticia())
            ->setTitular($titular)
            ->setCuerpo($cuerpo)
            ->setImageURL($imageURL)
            ->setFecha(new \DateTime());

        // Insertamos la noticia
        return $this->noticiasRepository->insert($noticia);
    }

    /**
     * Función para actualizar una noticia
     * @param int $idNoticia
     * @param string|null $titular
     * @param string|null $cuerpo
     * @param string|null $imageURL
     * @return bool
     * @throws Exception
     */
    public function updateNoticia(int $idNoticia, string $titular = null, string $cuerpo = null, string $imageURL = null): bool
    {
        // Validamos los datos
        if (empty($titular) || empty($cuerpo) || empty($imageURL)) {
            return false;
        }

        // Limpiamos los datos
        $titular = htmlspecialchars($titular);
        $cuerpo = htmlspecialchars($cuerpo);
        $imageURL = htmlspecialchars($imageURL);

        // Recuperamos la noticia
        $noticia = $this->getNoticia($idNoticia);
        if (!$noticia) {
            return false;
        }

        // Actualizamos los datos
        $noticia->setTitular($titular)
            ->setCuerpo($cuerpo)
            ->setImageURL($imageURL);

        // Actualizamos la noticia
        return $this->noticiasRepository->update($noticia);
    }

    /**
     * Función para eliminar una noticia
     * @param int $idNoticia
     * @return bool
     * @throws Exception
     */
    public function deleteNoticia(int $idNoticia): bool
    {
        // Obtenemos la noticia
        $noticia = $this->getNoticia($idNoticia);
        if (!$noticia) {
            return false;
        }

        // Eliminamos la noticia
        return $this->noticiasRepository->delete($noticia);
    }
}