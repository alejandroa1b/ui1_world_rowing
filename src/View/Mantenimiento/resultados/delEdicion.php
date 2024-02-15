<?php
$titular = 'Eliminar edición';
$edicion = $edicion ?? null;
ob_start();
?>

<div class="row">
    <div class="col s12 m12">
        <div style="margin-top: 1em; margin-bottom: 1em"
        ">
        <a href="/mantenimiento/resultados" style="display: flex; align-items: center;"><span class="material-icons">arrow_back</span>
            Volver</a>
    </div>
    <div class="card">
        <div class="card-content">
            <h3>¿Estás seguro de que quieres eliminar la edición?</h3>
            <p>Genero: <?= $edicion->getGenero() ?></p>
            <p>Código: <?= $edicion->getCodigo() ?></p>
            <p>Nombre: <?= $edicion->getNombre() ?></p>
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
