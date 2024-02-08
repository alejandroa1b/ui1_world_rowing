<?php
$titular = 'Eliminar deportista';
$deportista = $deportista ?? null;
ob_start();
?>

<div class="row">
    <div class="col s12 m12">
        <div style="margin-top: 1em; margin-bottom: 1em"
        ">
        <a href="/mantenimiento/deportistas" style="display: flex; align-items: center;"><span class="material-icons">arrow_back</span>
            Volver</a>
    </div>
    <div class="card">
        <div class="card-content">
            <h3>¿Estás seguro de que quieres eliminar el deportista?</h3>
            <p>Cod. País: <?= $deportista->getCodPais() ?></p>
            <p>Nombre: <?= $deportista->getNombre() ?></p>
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
