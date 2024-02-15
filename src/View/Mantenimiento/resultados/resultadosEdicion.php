<?php
$titulo = 'Mantenimiento de resultados';
$edicion = $edicion ?? null;
$resultados = $resultados ?? [];
$status = $status ?? '';
$msg = $msg ?? '';
ob_start();
?>
<div style="margin-top: 1em; margin-bottom: 1em">
    <a href="/mantenimiento/resultados" style="display: flex; align-items: center;"><span
            class="material-icons">arrow_back</span>
        Volver</a>
</div>
<h3 class="mt-3 mb-3 light-blue-text text-darken-4"><?= $edicion->getNombre() ?></h3>
<?php
if ($status == 'success'): ?>
    <div class="card green lighten-4" id="alert">
        <div class="card-content">
            <p>
                <span onclick="document.getElementById('alert').style.display='none'" class="btn btn-floating btn-small grey" style="cursor: pointer">X</span>
                <?= $msg ?>
            </p>
        </div>
    </div>
<?php elseif ($status == 'error'): ?>
    <div class="card red lighten-4" id="alert">
        <div class="card-content">
            <p>
                <span onclick="document.getElementById('alert').style.display='none'" class="btn btn-floating btn-small grey" style="cursor: pointer">X</span>
                <?= $msg ?>
            </p>
        </div>
    </div>
<?php endif; ?>
<div style="display: flex; align-items: center; justify-content: end">
    <a href="/mantenimiento/resultados/<?= $edicion->getId()?>/new" class="btn" style="display: flex; align-items: center;"><i
            class="material-icons">add</i>Registrar resultado</a>
</div>
<table class="highlight">
    <thead>
    <tr>
        <th>Id</th>
        <th>Deportista</th>
        <th>Posicion</th>
        <th>Tiempo</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($resultados as $resultado): ?>
        <tr>
            <td><?= $resultado->getId() ?></td>
            <td><?= $resultado->getDeportista()->getNombre() ?></td>
            <td><?= $resultado->getPosicion() ?></td>
            <td><?= $resultado->getTiempoNormalizado() ?></td>
            <td style="display: flex; align-items: center;">
                <a href="/mantenimiento/resultados/<?= $edicion->getId()?>/edit/<?= $resultado->getId() ?>" class="btn" style="margin-right: 10px;"><i
                        class="material-icons">edit</i></a>
                <a href="/mantenimiento/resultados/<?= $edicion->getId()?>/del/<?= $resultado->getId() ?>" class="btn red"><i
                        class="material-icons">delete</i>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
$contenido = ob_get_clean();
include __DIR__ . '/../../base.php';
?>
