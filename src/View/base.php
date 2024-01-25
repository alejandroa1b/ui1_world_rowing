<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">      <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="/assets/css/materialize.min.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo (isset($titulo) ? $titulo . " | " : "") . "UI1 World Rowing"; ?></title>
</head>
<body>
    <header>
        <nav class="nav-extended">
            <div class="nav-wrapper container">
                <a href="#" class="brand-logo">UI1 World Rowing</a>
                <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/noticias">Noticias</a></li>
                    <li><a href="/resultados">Resultados</a></li>
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
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
</body>
</html>
