<?php
$titulo = "Home";
ob_start();
?>

<p>Mensaje: <?= $mensaje ?></p>

<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";