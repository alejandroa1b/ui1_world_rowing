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
            <td><?= $deportista->getCodPasi() ?></td>
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

