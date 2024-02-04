<?php
$titulo = "Resultados";
$ediciones = $ediciones ?? [];
ob_start()
?>
<h3 class="light-blue-text text-darken-4">Ediciones del campeonato</h3>
<table class="highlight">
    <thead>
    <tr>
        <th>Código</th>
        <th>Evento</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($ediciones as $edicion): ?>
    <tr>
        <td><?= $edicion->getCodigo()?></td>
        <td><?= $edicion->getNombre()?></td>
        <td><a href="/resultados/<?= $edicion->getId()?>" style="display:flex; align-items: center;">Ver detalles <span class="material-icons">chevron_right</span> </a></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php if (!count($ediciones)): ?>
    <p class="grey-text">Aún no se han registrado ediciones</p>
<?php endif; ?>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";
?>
