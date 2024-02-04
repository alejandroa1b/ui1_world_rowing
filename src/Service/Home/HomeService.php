<?php

namespace App\Service\Home;

/**
 * Servicio para la sección de inicio
 */
class HomeService
{

    /**
     * Función para envío de mensajes de contacto
     * @param string $nombre
     * @param string $email
     * @param string $mensaje
     * @return bool Indicador de que el envío es correcto
     */
    public function sendContacto(string $nombre, string $email, string $mensaje): bool
    {
        // Sanear el input para evitar inyecciones SQL y ejecución de HTML/JS
        $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $mensaje = filter_var($mensaje, FILTER_SANITIZE_STRING);

        // Validación básica de los campos
        if (empty($nombre) || empty($email) || empty($mensaje)) {
            return false;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        // Escapar el HTML para evitar inyecciones de HTML/JS
        $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
        $mensaje = htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');

        $para = 'alejandro.carrillo.amayuelas@alumnos.ui1.es';
        $asunto = 'Nuevo mensaje de contacto';
        $cuerpoMensaje = "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje";
        $cabeceras = 'From: contact@ui1worldrowing.com' . "\r\n" .
            'Reply-To: contact@ui1worldrowing.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        if (mail($para, $asunto, $cuerpoMensaje, $cabeceras)) {
            return true; // El email se envió correctamente
        } else {
            return false; // Hubo un problema al enviar el email
        }
    }
}