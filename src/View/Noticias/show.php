<?php
$titulo = $noticia->getTitular();
ob_start();
?>
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-image">
                    <img src="<?= $noticia->getImageURL() ?>">
                    <span class="card-title"><?= $noticia->getTitular(); ?></span>
                </div>
                <div class="card-content">
                    <p><?= $noticia->getCuerpo() ?></p>.</p>
                </div>
            </div>
        </div>
    </div>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";