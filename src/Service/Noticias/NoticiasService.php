<?php

namespace App\Service\Noticias;

use App\Model\Noticias\Noticia;
use Exception;

/**
 * Servicio para la lógica de negocio del módulo de noticias
 */
class NoticiasService
{
    /**
     * Obtener una noticia por su identificador
     * @param int $idNoticia
     * @return Noticia|null
     * @throws Exception
     */
    public function getNoticia(int $idNoticia): ?Noticia
    {
        foreach ($this->getDummyNews() as $noticia) {
            if ($noticia->getId() == $idNoticia) {
                return $noticia;
            }
        }

        return null;
    }

    /**
     * Función para obtener todas las noticias
     * @return Noticia[]
     * @throws Exception
     */
    public function getNoticias(): array
    {
        return $this->getDummyNews(); // TODO: Implementación de repositorio de noticias para obtenerlas de base de datos.
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
        return array_slice($this->getDummyNews(), 0, $num);
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

        // TODO: Implementación de repositorio de noticias para guardar la noticia en base de datos.
        $noticia = (new Noticia())
            ->setTitular($titular)
            ->setCuerpo($cuerpo)
            ->setImageURL($imageURL)
            ->setFecha(new \DateTime());

        return true;
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

        // TODO: Implementación de repositorio de noticias para guardar la noticia en base de datos.

        return true;
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

        // TODO: Implementación de repositorio de noticias para eliminar la noticia de base de datos.
        return true;
    }

    /**
     * Función temporal para obtener noticias de prueba
     * @return Noticia[]
     * @throws Exception
     */
    private function getDummyNews(): array
    {
        return [
            (new Noticia())
                ->setId(1)
                ->setFechaNormalizada('2024-02-01 14:20:00')
                ->setTitular("Los alumnos de la Universidad Isabel I de Burgos son los actuales campeones de remo.")
                ->setCuerpo("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie orci ac vulputate semper. Phasellus fermentum eget arcu sit amet tincidunt. Maecenas tristique magna in cursus vulputate. Integer semper leo sed quam pellentesque consectetur. In ullamcorper nibh eu arcu sollicitudin, nec iaculis urna fringilla. Sed sed sodales dolor. Maecenas quis ex sem. Etiam ultrices augue eget tortor feugiat facilisis. Curabitur odio nisl, ultrices et semper id, tempor nec ante. Aenean vehicula faucibus vulputate. In id urna cursus, cursus arcu at, interdum odio. Etiam et ligula vitae leo blandit vulputate vitae non magna. Nulla facilisi. Curabitur fermentum libero vitae malesuada interdum. Nunc sed euismod quam.")
                ->setImageURL("https://www.ui1.es/sites/all/themes/custom/ui1_theme/images/la_universidad/fachada_ui1.png"),
            (new Noticia())
                ->setId(2)
                ->setFechaNormalizada('2024-02-02 16:40:00')
                ->setTitular("Descalificado un concursante por llevar un Reno en lugar de un Remo.")
                ->setCuerpo("Según el concursante, \"es fácil liarse con estas cosas..\". Pronto más declaraciones")
                ->setImageURL("https://d7lju56vlbdri.cloudfront.net/var/ezwebin_site/storage/images/_aliases/img_1col/noticias/las-poblaciones-de-reno-en-el-artico-se-desmoronan/6401627-6-esl-MX/Las-poblaciones-de-reno-en-el-Artico-se-desmoronan.jpg"),
            (new Noticia())
                ->setId(3)
                ->setFechaNormalizada('2024-02-03 17:50:00')
                ->setTitular("Campeonato Mundial de Remo interrumpido por invasión de piratas buscando el tesoro perdido bajo la línea de meta")
                ->setCuerpo("En un giro inesperado de eventos, el Campeonato Mundial de Remo fue abruptamente interrumpido este fin de semana cuando una banda de audaces piratas irrumpió en la competencia. Los espectadores quedaron atónitos cuando una flotilla de barcos piratas, completos con banderas negras ondeando al viento, apareció de repente en el horizonte, navegando directamente hacia la línea de meta.")
                ->setImageURL("https://www.isla-pirata.com/wp-content/uploads/2021/10/piratas-del-caribe-personajes-principales-1.jpeg"),
        ];

        // TODO: Implementación de repositorio de noticias para obtenerlas de base de datos.

    }
}