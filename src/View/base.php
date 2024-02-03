<?php
    $contenido = $contenido ?? "";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">      <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo (isset($titulo) ? $titulo . " | " : "") . "UI1 World Rowing"; ?></title>
</head>
<body>
    <header>
        <nav class="nav-extended light-blue darken-4">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">UI1 World Rowing</a>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/resultados">Resultados</a></li>
                    <li><a href="/deportistas">Deportistas</a></li>
                    <li><a href="/mantenimiento">Mantenimiento</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <main class="container">
            <?php echo $contenido; ?>
    </main>

    <footer>
        <!-- TODO -->
    </footer>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="/assets/js/materialize.min.js"></script>
<script src="/assets/js/scripts.js"></script>
</body>
</html>
