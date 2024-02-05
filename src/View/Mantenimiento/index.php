<?php
$titulo = "Mantenimiento";
ob_start();
?>

<h3 class="light-blue-text text-darken-4">Mantenimiento</h3>
<p>Selecciona una opción de mantenimiento:</p>
<div class="row">
    <div class="col s12 m4">
        <a href="/mantenimiento/noticias" class="waves-effect waves-light btn-large blue darken-2">
            <i class="material-icons left">library_books</i>Noticias
        </a>
    </div>
    <div class="col s12 m4">
        <a href="/mantenimiento/deportistas" class="waves-effect waves-light btn-large green darken-2">
            <i class="material-icons left">directions_run</i>Deportistas
        </a>
    </div>
    <div class="col s12 m4">
        <a href="/mantenimiento/resultados" class="waves-effect waves-light btn-large red darken-2">
            <i class="material-icons left">emoji_events</i>Resultados
        </a>
    </div>
</div>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";
?>
