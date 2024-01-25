<?php
$titulo = "Noticias";
ob_start();
?>
    <h2>Últimas noticias</h2>
    <ul>
        <?php foreach ($noticias as $noticia): ?>
            <li><?= $noticia->getTitular(); ?></li>

        <?php endforeach; ?>
    </ul>

<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";