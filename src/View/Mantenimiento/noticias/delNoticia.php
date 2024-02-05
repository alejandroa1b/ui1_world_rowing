<?php
$titular = 'Eliminar noticia';
$noticia = $noticia ?? null;
ob_start();
?>

    <div class="row">
        <div class="col s12 m12">
            <div style="margin-top: 1em; margin-bottom: 1em"
            ">
            <a href="/mantenimiento/noticias" style="display: flex; align-items: center;"><span class="material-icons">arrow_back</span>
                Volver al mantenimiento</a>
        </div>
        <div class="card">
            <div class="card-content">
                <h3>¿Estás seguro de que quieres eliminar la noticia?</h3>
                <p>Titular: <?= $noticia->getTitular() ?></p>
                <p>Fecha: <?= $noticia->getFechaNormalizada() ?></p>
                <p>Imagen: <img src="<?= $noticia->getImageURL() ?>" alt="Imagen de la noticia"
                                style="max-width: 100px;"></p>
                <p>Cuerpo: <?= $noticia->getCuerpo() ?></p>
                <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                    <button class="waves-effect waves-light btn-large red darken-2" type="submit">Eliminar</button>
                </form>
            </div>
        </div>
    </div>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../../base.php";
?>
