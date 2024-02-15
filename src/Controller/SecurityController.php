<?php

namespace App\Controller;

use App\Service\Security\SecurityService;

/**
 * Controlador para la seguridad
 */
class SecurityController extends AbstractController
{
    /**
     * @var SecurityService
     */
    private $securityService;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->securityService = new SecurityService();
    }

    /**
     * Función para el login
     * @return void
     */
    public function login()
    {
        $redirect = $_GET['redirect'] ?? '/';
        $usuario = null;
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            if ($this->securityService->login($usuario, $password)) {
                $this->redirect($redirect);
            } else {
                $error = 'Usuario o contraseña incorrectos';
            }
        }

        $this->renderView('Security/login', [
            'error' => $error,
            'usuario' => $usuario,
        ]);
    }

    /**
     * Función para el logout
     * @return void
     */
    public function logout()
    {
        $this->securityService->logout();
        $this->redirect('/');
    }
}