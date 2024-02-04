<?php

namespace App\Service\Noticias;

use App\Model\Noticias\Noticia;

/**
 * Servicio para la lógica de negocio del módulo de noticias
 */
class NoticiasService
{
    /**
     * Obtener una noticia por su identificador
     * @param int $idNoticia
     * @return Noticia|null
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
     * Función que devuelve las últimas noticias
     * @param int $num Número máximo de noticias que se desea obtener. (10 por defecto)
     * @return array
     */
    public function getUltimasNoticias(int $num = 10): array
    {
        // Falseamos las noticias
        return array_slice($this->getDummyNews(), 0, $num);
    }

    /**
     * Función temporal para obtener noticias de prueba
     * @return Noticia[]
     */
    private function getDummyNews(): array
    {
        return [
            (new Noticia())
                ->setId(1)
                ->setTitular("Los alumnos de la Universidad Isabel I de Burgos son los actuales campeones de remo.")
                ->setCuerpo("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie orci ac vulputate semper. Phasellus fermentum eget arcu sit amet tincidunt. Maecenas tristique magna in cursus vulputate. Integer semper leo sed quam pellentesque consectetur. In ullamcorper nibh eu arcu sollicitudin, nec iaculis urna fringilla. Sed sed sodales dolor. Maecenas quis ex sem. Etiam ultrices augue eget tortor feugiat facilisis. Curabitur odio nisl, ultrices et semper id, tempor nec ante. Aenean vehicula faucibus vulputate. In id urna cursus, cursus arcu at, interdum odio. Etiam et ligula vitae leo blandit vulputate vitae non magna. Nulla facilisi. Curabitur fermentum libero vitae malesuada interdum. Nunc sed euismod quam.")
                ->setImageURL("https://www.ui1.es/sites/all/themes/custom/ui1_theme/images/la_universidad/fachada_ui1.png")
        ];

        // TODO: Implementación de repositorio de noticias para obtenerlas de base de datos.

    }
}