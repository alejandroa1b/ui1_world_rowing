<?php
$titulo = "Home";
ob_start();
?>

    <div class="parallax-container">
        <div class="parallax"><img src="/assets/img/UI1.png"></div>
    </div>
    <div class="section white">
        <div class="row">
            <h2 class="header light-blue-text text-darken-4">Últimas noticias</h2>
            <div class="row">
                <div class="slider">
                    <ul class="slides">
                        <?php foreach ($noticias as $noticia): ?>
                            <li>
                                <img src="<?= $noticia->getImageURL(); ?>">
                                <div class="caption center-align">
                                    <h4 class="light-blue-text grey lighten-5 text-darken-4"><?= $noticia->getTitular() ?></h4>
                                    <a href="/noticias/<?= $noticia->getId(); ?>"
                                       class="btn white light-blue-text text-darken-4 waves-effect waves-light">Leer
                                        más</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

        </div>
    </div>

<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";