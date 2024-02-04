<?php
$titulo = "Deportistas";
$deportistas = $deportistas ?? [];
ob_start();
?>
<h3 class="light-blue-text text-darken-4">Deportistas del campeonato</h3>
<table class="highlight">
    <thead>
    <tr>
        <th>País</th>
        <th>Nombre</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($deportistas as $deportista): ?>
        <tr>
            <td><?= $deportista->getCodPais()?></td>
            <td><?= $deportista->getNombre()?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php if (!count($deportistas)): ?>
    <p class="grey-text">Aún no se han registrado deportistas</p>
<?php endif; ?>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";
?>
