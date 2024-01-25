<?php
$titulo = "Noticias";
ob_start();
?>
    <h2>Últimas noticias</h2>
    <div class="row">
        <?php foreach ($noticias as $noticia): ?>
            <div class="col s12 m6">
                <div class="card">
                    <div class="card-image">
                        <img src="<?= $noticia->getImageURL() ?>">
                        <span class="card-title"><?= $noticia->getTitular(); ?></span>
                        <a href="/noticias/<?= $noticia->getId(); ?>" class="btn-floating halfway-fab waves-effect waves-light red"><i class="material-icons">visibility</i></a>
                    </div>
                    <div class="card-content">
                        <p><?= $noticia->getCuerpo() ?></p>.</p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";