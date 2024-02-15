<?php

namespace App\Database;

use PDO;

/**
 * Clase para gestionar la conexión a la base de datos
 */
class DatabaseConnection
{
    private static $connection;

    public static function getConnection(): PDO
    {
        if (self::$connection === null) {
            self::$connection = new PDO('mysql:host=db;dbname=ui1_world_rowing', 'root', 'password_for_database');
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}