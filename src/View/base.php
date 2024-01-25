<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?php echo (isset($titulo) ? $titulo . " | " : "")."UI1 World Rowing"; ?></title>
</head>
<body>
<header>
    <h1>UI1 World Rowing</h1>
    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
        </ul>
    </nav>
</header>

<main>
    <?php echo $content; ?>
</main>

<footer>
    <!-- TODO -->
</footer>
</body>
</html>
