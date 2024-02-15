<?php
$titulo = $resultado->getTitular();
ob_start();
?>
    <div class="row">
        <div class="col s12 m12">
            <div style="margin-top: 1em; margin-bottom: 1em" ">
                <a href="/" style="display: flex; align-items: center;"><span class="material-icons">arrow_back</span> Volver al inicio</a>
            </div>
            <div class="card">
                <div class="card-image">
                    <img alt="Imágen de la noticia" src="<?= $resultado->getImageURL() ?>">
                    <span class="card-title light-blue-text grey lighten-5 text-darken-4"><?= $resultado->getTitular(); ?></span>
                </div>
                <div class="card-content">
                    <p style="font-size: 0.8em;" class="grey-text"><?= $resultado->getFechaNormalizada(); ?> </p>
                    <p><?= $resultado->getCuerpo() ?></p></p>
                </div>
            </div>
        </div>
    </div>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";