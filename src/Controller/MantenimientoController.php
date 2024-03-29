<?php

namespace App\Controller;

use App\Service\Deportistas\DeportistasService;
use App\Service\Noticias\NoticiasService;
use App\Service\Resultados\ResultadosService;
use Exception;

/**
 * Controlador para el mantenimiento de la aplicación
 */
class MantenimientoController extends AbstractController
{
    /**
     * @var NoticiasService
     */
    private $noticiasService;

    /**
     * @var DeportistasService
     */
    private $deportistasService;

    /**
     * @var ResultadosService
     */
    private $resultadosService;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->noticiasService = new NoticiasService();
        $this->deportistasService = new DeportistasService();
        $this->resultadosService = new ResultadosService();
    }

    /**
     * Función para mostrar la página de mantenimiento
     */
    public function index()
    {
        $this->requireLogin();
        $this->renderView('Mantenimiento/index', []);
    }

    /**
     * Función para mostrar la página de mantenimiento de noticias
     * @return void
     * @throws Exception
     */
    public function noticias()
    {
        $this->requireLogin();
        $status = $_GET['status'] ?? null;
        $msg = htmlspecialchars($_GET['msg']) ?? null;
        $this->renderView('Mantenimiento/noticias/noticias', [
            'noticias' => $this->noticiasService->getNoticias(),
            'status' => $status,
            'msg' => $msg
        ]);
    }

    /**
     * Función para mostrar el formulario de creación de una nueva noticia
     * @return void
     */
    public function newNoticia()
    {
        $this->requireLogin();
        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titular = $_POST['titular'];
            $cuerpo = $_POST['cuerpo'];
            $imageURL = $_POST['imageURL'];

            // Enviamos los datos al servicio
            if ($this->noticiasService->createNoticia($titular, $cuerpo, $imageURL)) {
                $this->redirect('/mantenimiento/noticias?status=success&msg=La noticia se ha creado correctamente');
            } else {
                $this->redirect('/mantenimiento/noticias?status=error&msg=Ha ocurrido un error al crear la noticia');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/noticias/editNoticia', [
            'action' => 'new'
        ]);
    }

    /**
     * Función para mostrar el formulario de edición de una noticia
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function editNoticia(int $id)
    {
        $this->requireLogin();
        $noticia = $this->noticiasService->getNoticia($id);
        if (!$noticia) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titular = $_POST['titular'];
            $cuerpo = $_POST['cuerpo'];
            $imageURL = $_POST['imageURL'];

            // Enviamos los datos al servicio
            if ($this->noticiasService->updateNoticia($id, $titular, $cuerpo, $imageURL)) {
                $this->redirect('/mantenimiento/noticias?status=success&msg=La noticia se ha actualizado correctamente');
            } else {
                $this->redirect('/mantenimiento/noticias?status=error&msg=Ha ocurrido un error al actualizar la noticia');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/noticias/editNoticia', [
            'action' => 'edit',
            'noticia' => $noticia
        ]);
    }

    /**
     * Función para eliminar una noticia
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delNoticia(int $id)
    {
        $this->requireLogin();
        $noticia = $this->noticiasService->getNoticia($id);
        if (!$noticia) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->noticiasService->deleteNoticia($id)) {
                $this->redirect('/mantenimiento/noticias?status=success&msg=La noticia se ha eliminado correctamente');
            } else {
                $this->redirect('/mantenimiento/noticias?status=error&msg=Ha ocurrido un error al eliminar la noticia');
            }
        }

        $this->renderView('Mantenimiento/noticias/delNoticia', [
            'noticia' => $noticia
        ]);
    }

    /**
     * Función para mostrar la página de mantenimiento de deportistas
     * @return void
     * @throws Exception
     */
    public function deportistas()
    {
        $this->requireLogin();
        $status = $_GET['status'] ?? null;
        $msg = htmlspecialchars($_GET['msg']) ?? null;
        $this->renderView('Mantenimiento/deportistas/deportistas', [
            'deportistas' => $this->deportistasService->getDeportistas(),
            'status' => $status,
            'msg' => $msg
        ]);
    }

    /**
     * Función para mostrar el formulario de creación de un nuevo deportista
     * @return void
     */
    public function newDeportista()
    {
        $this->requireLogin();
        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codPais = $_POST['codPais'];
            $nombre = $_POST['nombre'];

            // Enviamos los datos al servicio
            if ($this->deportistasService->createDeportista($codPais, $nombre)) {
                $this->redirect('/mantenimiento/deportistas?status=success&msg=El deportista se ha creado correctamente');
            } else {
                $this->redirect('/mantenimiento/deportistas?status=error&msg=Ha ocurrido un error al crear el deportista');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/deportistas/editDeportista', [
            'action' => 'new'
        ]);
    }

    /**
     * Función para mostrar el formulario de edición de un deportista
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function editDeportista(int $id)
    {
        $this->requireLogin();
        $deportista = $this->deportistasService->getDeportista($id);
        if (!$deportista) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codPais = $_POST['codPais'];
            $nombre = $_POST['nombre'];

            // Enviamos los datos al servicio
            if ($this->deportistasService->updateDeportista($id, $codPais, $nombre)) {
                $this->redirect('/mantenimiento/deportistas?status=success&msg=El deportista se ha actualizado correctamente');
            } else {
                $this->redirect('/mantenimiento/deportistas?status=error&msg=Ha ocurrido un error al actualizar el deportista');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/deportistas/editDeportista', [
            'action' => 'edit',
            'deportista' => $deportista
        ]);
    }

    /**
     * Función para eliminar un deportista
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delDeportista(int $id)
    {
        $this->requireLogin();
        $deportista = $this->deportistasService->getDeportista($id);
        if (!$deportista) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->deportistasService->deleteDeportista($id)) {
                $this->redirect('/mantenimiento/deportistas?status=success&msg=El deportista se ha eliminado correctamente');
            } else {
                $this->redirect('/mantenimiento/deportistas?status=error&msg=Ha ocurrido un error al eliminar el deportista');
            }
        }

        $this->renderView('Mantenimiento/deportistas/delDeportista', [
            'deportista' => $deportista
        ]);
    }

    /**
     * Función para mostrar la página de mantenimiento de resultados
     * @return void
     * @throws Exception
     */
    public function resultados()
    {
        $this->requireLogin();
        $status = $_GET['status'] ?? null;
        $msg = htmlspecialchars($_GET['msg']) ?? null;
        $this->renderView('Mantenimiento/resultados/ediciones', [
            'ediciones' => $this->resultadosService->getEdiciones(),
            'status' => $status,
            'msg' => $msg
        ]);
    }

    /**
     * Función para mostrar el formulario de creación de una nueva edición
     * @return void
     */
    public function newEdicion()
    {
        $this->requireLogin();
        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genero = $_POST['genero'];
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];

            // Enviamos los datos al servicio
            if ($this->resultadosService->createEdicion($genero, $codigo, $nombre)) {
                $this->redirect('/mantenimiento/resultados?status=success&msg=La edición se ha creado correctamente');
            } else {
                $this->redirect('/mantenimiento/resultados?status=error&msg=Ha ocurrido un error al crear la edición');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/resultados/editEdicion', [
            'action' => 'new'
        ]);
    }

    /**
     * Función para mostrar el formulario de edición de una edición
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function editEdicion(int $id)
    {
        $this->requireLogin();
        $edicion = $this->resultadosService->getEdicion($id);
        if (!$edicion) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $genero = $_POST['genero'];
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];

            // Enviamos los datos al servicio
            if ($this->resultadosService->updateEdicion($id, $genero, $codigo, $nombre)) {
                $this->redirect('/mantenimiento/resultados?status=success&msg=La edición se ha actualizado correctamente');
            } else {
                $this->redirect('/mantenimiento/resultados?status=error&msg=Ha ocurrido un error al actualizar la edición');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/resultados/editEdicion', [
            'action' => 'edit',
            'edicion' => $edicion
        ]);
    }

    /**
     * Función para eliminar una edición
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function delEdicion(int $id)
    {
        $this->requireLogin();
        $edicion = $this->resultadosService->getEdicion($id);
        if (!$edicion) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->resultadosService->deleteEdicion($id)) {
                $this->redirect('/mantenimiento/resultados?status=success&msg=La edición se ha eliminado correctamente');
            } else {
                $this->redirect('/mantenimiento/resultados?status=error&msg=Ha ocurrido un error al eliminar la edición');
            }
        }

        $this->renderView('Mantenimiento/resultados/delEdicion', [
            'edicion' => $edicion
        ]);
    }

    /**
     * Función para mostrar la página de mantenimiento de resultados de una edición
     * @return void
     */
    public function resultadosEdicion(int $idEdicion)
    {
        $this->requireLogin();
        $status = $_GET['status'] ?? null;
        $msg = htmlspecialchars($_GET['msg']) ?? null;
        $this->renderView('Mantenimiento/resultados/resultadosEdicion', [
            'edicion' => $this->resultadosService->getEdicion($idEdicion),
            'resultados' => $this->resultadosService->getResultadosEdicion($idEdicion),
            'status' => $status,
            'msg' => $msg
        ]);
    }

    /**
     * Función para mostrar el formulario de creación de un nuevo resultado para una edición
     * @param int $idEdicion
     * @return void
     */
    public function newResultadoEdicion(int $idEdicion)
    {
        $this->requireLogin();
        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idDeportista = $_POST['deportista'];
            $posicion = $_POST['posicion'];
            $tiempo = $_POST['tiempo'];

            // Enviamos los datos al servicio
            if ($this->resultadosService->createResultadoEdicion($idEdicion, $idDeportista, $posicion, $tiempo)) {
                $this->redirect('/mantenimiento/resultados/' . $idEdicion . '?status=success&msg=El resultado se ha creado correctamente');
            } else {
                $this->redirect('/mantenimiento/resultados/' . $idEdicion . '?status=error&msg=Ha ocurrido un error al crear el resultado');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/resultados/editResultado', [
            'action' => 'new',
            'edicion' => $this->resultadosService->getEdicion($idEdicion),
            'deportistas' => $this->deportistasService->getDeportistas()
        ]);
    }

    /**
     * Función para mostrar el formulario de creación de un nuevo resultado para una edición
     * @param int $idEdicion
     * @param int $idResultado
     * @return void
     */
    public function editResultadoEdicion(int $idEdicion, int $idResultado)
    {
        $this->requireLogin();
        $edicion = $this->resultadosService->getEdicion($idEdicion);
        $resultado = $this->resultadosService->getResultadoEdicion($idResultado);
        if (!$edicion || !$resultado || $resultado->getEdicion()->getId() !== $idEdicion) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idDeportista = $_POST['deportista'];
            $posicion = $_POST['posicion'];
            $tiempo = $_POST['tiempo'];

            // Enviamos los datos al servicio
            if ($this->resultadosService->updateResultadoEdicion($idResultado, $idDeportista, $posicion, $tiempo)) {
                $this->redirect('/mantenimiento/resultados/' . $idEdicion . '?status=success&msg=El resultado se ha creado correctamente');
            } else {
                $this->redirect('/mantenimiento/resultados/' . $idEdicion . '?status=error&msg=Ha ocurrido un error al crear el resultado');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/resultados/editResultado', [
            'action' => 'edit',
            'edicion' => $edicion,
            'resultado' => $resultado,
            'deportistas' => $this->deportistasService->getDeportistas()
        ]);
    }

    /**
     * Función para eliminar un resultado de una edición
     * @param int $idEdicion
     * @param int $idResultado
     * @return void
     * @throws Exception
     */
    public function delResultadoEdicion(int $idEdicion, int $idResultado)
    {
        $this->requireLogin();
        $edicion = $this->resultadosService->getEdicion($idEdicion);
        $resultado = $this->resultadosService->getResultadoEdicion($idResultado);
        if (!$edicion || !$resultado || $resultado->getEdicion()->getId() !== $idEdicion) {
            $this->returnNotFound();
        }

        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($this->resultadosService->deleteResultado($idResultado)) {
                $this->redirect("/mantenimiento/resultados/${idEdicion}?status=success&msg=La edición se ha eliminado correctamente");
            } else {
                $this->redirect("/mantenimiento/resultados/${idEdicion}?status=error&msg=Ha ocurrido un error al eliminar la edición");
            }
        }

        $this->renderView('Mantenimiento/resultados/delResultado', [
            'resultado' => $resultado
        ]);
    }
}