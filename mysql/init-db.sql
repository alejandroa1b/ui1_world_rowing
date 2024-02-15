USE ui1_world_rowing;
-- Creación de la tabla `noticias`
CREATE TABLE IF NOT EXISTS noticias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATETIME NOT NULL,
    titular VARCHAR(255) NOT NULL,
    cuerpo TEXT NOT NULL,
    imageURL VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Creación de la tabla `deportistas`
CREATE TABLE IF NOT EXISTS deportistas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codPais VARCHAR(3) NOT NULL,
    nombre VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Creación de la tabla `ediciones`
CREATE TABLE IF NOT EXISTS ediciones (
    id INT AUTO_INCREMENT PRIMARY KEY,
    genero ENUM('masculino', 'femenino') NOT NULL,
    codigo VARCHAR(10) NOT NULL,
    nombre VARCHAR(255) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Creación de la tabla `edicion_resultado_deportista`
CREATE TABLE IF NOT EXISTS edicion_resultado_deportista (
    id INT AUTO_INCREMENT PRIMARY KEY,
    edicion_id INT NOT NULL,
    deportista_id INT NOT NULL,
    posicion INT NOT NULL,
    tiempo INT NOT NULL,
    FOREIGN KEY (edicion_id) REFERENCES ediciones(id) ON DELETE CASCADE,
    FOREIGN KEY (deportista_id) REFERENCES deportistas(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
