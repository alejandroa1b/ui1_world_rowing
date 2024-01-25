<?php

namespace App\Controller;

use App\Model\Noticias\Noticia;

/**
 * Controlador para la sección de noticias
 */
class NoticiasController extends AbstractController
{
    /**
     * Función para listar las noticias
     */
    public function list()
    {
        // Falseamos las noticias
        $noticias = [
            (new Noticia())
                ->setTitular("Los alumnos de UI1 son los campeones de remo")
                ->setCuerpo("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras molestie orci ac vulputate semper. Phasellus fermentum eget arcu sit amet tincidunt. Maecenas tristique magna in cursus vulputate. Integer semper leo sed quam pellentesque consectetur. In ullamcorper nibh eu arcu sollicitudin, nec iaculis urna fringilla. Sed sed sodales dolor. Maecenas quis ex sem. Etiam ultrices augue eget tortor feugiat facilisis. Curabitur odio nisl, ultrices et semper id, tempor nec ante. Aenean vehicula faucibus vulputate. In id urna cursus, cursus arcu at, interdum odio. Etiam et ligula vitae leo blandit vulputate vitae non magna. Nulla facilisi. Curabitur fermentum libero vitae malesuada interdum. Nunc sed euismod quam.")
        ];

        $this->renderView('Noticias/list', [
            'noticias' => $noticias
        ]);
    }

}