<?php

namespace App\Controller;

use App\Service\Noticias\NoticiasService;
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
     * Constructor
     */
    public function __construct()
    {
        $this->noticiasService = new NoticiasService();
    }

    /**
     * Función para mostrar la página de mantenimiento
     */
    public function index()
    {
        $this->renderView('Mantenimiento/index', []);
    }

    /**
     * Función para mostrar la página de mantenimiento de noticias
     * @return void
     * @throws Exception
     */
    public function noticias()
    {
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
        // Manejamos el envío del formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titular = $_POST['titular'];
            $cuerpo = $_POST['cuerpo'];
            $imageURL = $_POST['imageURL'];

            // Enviamos los datos al servicio
            if ($this->noticiasService->createNoticia($titular, $cuerpo, $imageURL)) {
                $this->redirect('/mantenimiento/noticias?statis=success&msg=La noticia se ha creado correctamente');
            } else {
                $this->redirect('/mantenimiento/noticias?status=error&msg=Ha ocurrido un error al crear la noticia');
            }
        }

        // Mostramos el formulario
        $this->renderView('Mantenimiento/noticias/editNoticia', []);
    }

    /**
     * Función para mostrar el formulario de edición de una noticia
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function editNoticia(int $id)
    {
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
}