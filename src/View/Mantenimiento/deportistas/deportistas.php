<?php
$titulo = 'Mantenimiento de deportistas';
$deportistas = $deportistas ?? [];
ob_start();
?>

<div style="margin-top: 1em; margin-bottom: 1em">
    <a href="/mantenimiento" style="display: flex; align-items: center;"><span
                class="material-icons">arrow_back</span>
        Volver</a>
</div>
<h3 class="mt-3 mb-3 light-blue-text text-darken-4">Mantenimiento de deportistas</h3>
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
    <a href="/mantenimiento/deportistas/new" class="btn" style
    ="display: flex; align-items: center;"><i
                class="material-icons">add</i>Crear
        deportista</a>
</div>
<table class="highlight">
    <thead>
    <tr>
        <th>Id</th>
        <th>País</th>
        <th>Nombre</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($deportistas as $deportista): ?>
        <tr>
            <td><?= $deportista->getId() ?></td>
            <td><?= $deportista->getCodPais() ?></td>
            <td><?= $deportista->getNombre() ?></td>
            <td style="display: flex; align-items: center;">
                <a href="/mantenimiento/deportistas/edit/<?= $deportista->getId() ?>" class="btn"
                   style="margin-right: 10px;"><i
                            class="material-icons">edit</i></a>
                <a href="/mantenimiento/deportistas/del/<?= $deportista->getId() ?>" class="btn red"><i
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

