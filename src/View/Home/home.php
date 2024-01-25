<?php
$titulo = "Home";
ob_start();
?>
    <h2>Lo más reciente:</h2>
    <div class="collection">
        <?php foreach ($noticias as $noticia): ?>
            <a href="/noticias/<?= $noticia->getId() ?>" class="collection-item">
                <?= $noticia->getTitular(); ?>
            </a>
        <?php endforeach; ?>
    </div>

<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";