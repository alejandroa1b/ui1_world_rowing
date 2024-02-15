<?php

namespace App\Service\Security;

/**
 * Servicio para la seguridad
 */
class SecurityService
{
    /**
     * Función para el login
     * @param string $user
     * @param string $password
     * @return bool
     */
    public function login(string $user, string $password): bool
    {
        if ($user === 'admin' && $password === '1234') {
            $_SESSION['user'] = 'admin';
            return true;
        } else {
            return false;
        }
    }

    /**
     * Función para el logout
     */
    public function logout()
    {
        session_destroy();
    }
}