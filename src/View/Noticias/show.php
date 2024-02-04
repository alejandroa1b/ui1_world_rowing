<?php
$titulo = $noticia->getTitular();
ob_start();
?>
    <div class="row">
        <div class="col s12 m12">
            <div style="margin-top: 1em; margin-bottom: 1em" ">
                <a href="/" style="display: flex; align-items: center;"><span class="material-icons">arrow_back</span> Volver al inicio</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img alt="Imágen de la noticia" src="<?= $noticia->getImageURL() ?>">
                    <span class="card-title light-blue-text grey lighten-5 text-darken-4"><?= $noticia->getTitular(); ?></span>
                </div>
                <div class="card-content">
                    <p style="font-size: 0.8em;" class="grey-text"><?= $noticia->getFecha()->format('Y-m-d H:i:s'); ?> </p>
                    <p><?= $noticia->getCuerpo() ?></p></p>
                </div>
            </div>
        </div>
    </div>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";