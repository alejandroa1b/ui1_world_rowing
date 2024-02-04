<?php

namespace App\Controller;

use App\Service\Home\HomeService;
use App\Service\Noticias\NoticiasService;
use Exception;

/**
 * Controlador de inicio
 */
class HomeController extends AbstractController
{
    /**
     * @var HomeService
     */
    private $homeService;

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
        $this->homeService = new HomeService();
    }

    /**
     * Función principal
     * @throws Exception
     */
    public function index()
    {
        $this->renderView('Home/home',[
            'noticias' => $this->noticiasService->getUltimasNoticias(3)
        ]);
    }

    /**
     * Formulario de contacto
     * @return void
     */
    public function contact()
    {
        $status = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'] ?? ''; // Usar el operador de fusión de null para valores predeterminados
            $email = $_POST['email'] ?? '';
            $mensaje = $_POST['mensaje'] ?? '';

            if ($this->homeService->sendContacto($nombre, $email, $mensaje)) {
                $status = "success";
            } else {
                $status = "fail";
            }
        }
        $this->renderView('Home/contact', [
            'status' => $status
        ]);
    }
}