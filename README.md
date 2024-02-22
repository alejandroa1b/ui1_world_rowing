# Proyecto de Aplicación Web de Remo

## Descripción

Este proyecto es una aplicación web desarrollada en PHP como proyecto de aprendizaje para la asignatura de Servicios y Aplicaciones Orientadas a la Web.

Su objetivo es proporcionar una plataforma para mostrar los resultados de las competiciones de remo, así como información sobre los deportistas y las competiciones. Además, en la página de inicio se mostrarán noticias relacionadas con el mundo del remo.

## Características

- **Estructura Básica:** Página de inicio con imagen, menú y sección de noticias.
- **Secciones de la Aplicación:**
    - `Resultados`: Tabla para mostrar resultados de competiciones (vacía actualmente).
    - `Deportistas`: Tabla para mostrar los deportistas que han competido en cualquiera de las pruebas (vacía actualmente).
    - `Contacto`: Formulario de contacto.
    - `Mantenimiento`: Sección para futuros formularios de administración (acceso restringido en fases futuras).

## Arquitectura

La aplicación sigue una arquitectura hexagonal, que separa la lógica de negocio de los detalles de implementación. La lógica de negocio se encuentra en el centro de la arquitectura, rodeada por capas que manejan la entrada y salida de datos, la interfaz de usuario y otros detalles de implementación.

Además, hacemos uso de un Front Controller para gestionar todas las solicitudes web y un sistema de rutas para asociar las URL con los controladores y métodos correspondientes.

## Estructura del proyecto

La estructura del proyecto se organiza de la siguiente manera:
- `public/`: En esta carpeta se encuentra el punto de entrada de la aplicación, el archivo index.php. Esta es la única ubicación accesible públicamente desde el navegador, y se utiliza como Front Controller para gestionar todas las solicitudes web.

- `src/`: Aquí se encuentran los archivos de código fuente de la aplicación. La estructura de carpetas dentro de src/ sigue una organización lógica basada en controladores, modelos, vistas y otros componentes de la aplicación.

  - `Controller/`: Contiene los controladores de la aplicación, que manejan las solicitudes web y coordinan la lógica de negocio.
  
  - `Database/`: Contiene los archivos de configuración de la base de datos y la lógica de acceso a la base de datos.

  - `Model/`: Aquí se almacenan los modelos que representan los datos y la lógica de acceso a la base de datos.

  - `Repository/`: Contiene los repositorios que encapsulan la lógica de acceso a la base de datos y proporcionan una interfaz para interactuar con los modelos.

  - `Service`: Contiene los servicios para dar funcionalidad a los diferentes módulos de la aplicación.

  - `View/`: Contiene las vistas de la aplicación, que definen la presentación de las páginas web.

- `config/`: En esta carpeta se encuentran los archivos de configuración de la aplicación. El archivo routes.php define las rutas de la aplicación, relacionando las URL con controladores y métodos correspondientes.

- `vendor/`: Contiene las dependencias de terceros administradas por Composer, incluido el autoloader de Composer.

La aplicación utiliza un autoloader de Composer para cargar automáticamente las clases y archivos necesarios cuando se requieren. Esto simplifica la gestión de las dependencias y evita la necesidad de incluir manualmente archivos en todo el proyecto.

La estructura del proyecto está diseñada para fomentar la modularidad y la escalabilidad, lo que facilita la adición de nuevas características y la expansión de la aplicación en futuras fases de desarrollo.


## Instalación y Uso


1. **Clonar el Repositorio:**
   
   `gh repo clone alejandroa1b/ui1_world_rowing`


2. **Navegar al Directorio del Proyecto:**

   `cd ui1_world_rowing`

3. **Instalar Dependencias:**

   `composer install`

4. **Construir las Imágenes:**

   `docker-compose build`


5. **Ejecutar con Docker:**

   `docker-compose up`

    La aplicación estará disponible en `http://localhost:8080`.

Para crear el esquema de base de datos se debe lanzar el script: `mysql\init-db.sql`.

## Planificación del Proyecto
La planificación y desarrollo del proyecto puede ser seguida desde Trello:
https://trello.com/b/BVTFjxA4/ui1-world-rowing
