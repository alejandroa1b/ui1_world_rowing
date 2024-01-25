# Proyecto de Aplicación Web de Remo

## Descripción

Este proyecto es una aplicación web desarrollada en PHP como proyecto de aprendizaje para la asignatura de Servicios y Aplicaciones Orientadas a la Web. 

Su objetivo es mostrar los resultados históricos de las competiciones internacionales de remo.
Actualmente, el proyecto se centra en la estructura de la aplicación. 
El resto de funcionalidades serán implementadas en las siguientes fases.

## Características

- **Estructura Básica:** Página de inicio con imagen, menú y sección de noticias.
- **Secciones de la Aplicación:**
    - `Resultados`: Tabla para mostrar resultados de competiciones (vacía actualmente).
    - `Noticias`: Sección para mostrar las últimas noticias  (vacía actualmente).
    - `Contacto`: Formulario de contacto (sin funcionalidad de envío en esta fase).
    - `Mantenimiento`: Sección para futuros formularios de administración (acceso restringido en fases futuras).

## Estructura del proyecto

El proyecto sigue una estructura basada en el patrón de diseño Modelo-Vista-Controlador (MVC) con Front Controller. Esta arquitectura facilita la organización y mantenimiento del código de la aplicación. A continuación, se describe la estructura de directorios clave:

- `public/`: En esta carpeta se encuentra el punto de entrada de la aplicación, el archivo index.php. Esta es la única ubicación accesible públicamente desde el navegador, y se utiliza como Front Controller para gestionar todas las solicitudes web.

- `src/`: Aquí se encuentran los archivos de código fuente de la aplicación. La estructura de carpetas dentro de src/ sigue una organización lógica basada en controladores, modelos, vistas y otros componentes de la aplicación.

  - `Controller/`: Contiene los controladores de la aplicación, que manejan las solicitudes web y coordinan la lógica de negocio.

  - `Model/`: Aquí se almacenan los modelos que representan los datos y la lógica de acceso a la base de datos.

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


3. **Construir las Imágenes:**

   `docker-compose build`


4. **Ejecutar con Docker:**

   `docker-compose up`

## Planificación del Proyecto
La planificación y desarrollo del proyecto puede ser seguida desde Trello:
https://trello.com/b/BVTFjxA4/ui1-world-rowing
