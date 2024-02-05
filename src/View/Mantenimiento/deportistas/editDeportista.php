<?php
$action = $action ?? 'new';
$titulo = $action == 'new' ? 'Nuevo deportista' : 'Editar deportista';
$deportista = $deportista ?? null;
ob_start();
?>
<div style="margin-top: 1em; margin-bottom: 1em">
    <a href="/mantenimiento/deportistas" style="display: flex; align-items: center;"><span
            class="material-icons">arrow_back</span>
        Volver al mantenimiento</a>
</div>
<h3 class="mt-3 mb-3 light-blue-text text-darken-4">Mantenimiento de deportistas</h3>
<div class="card">
    <div class="card-content">
        <span class="card-title"><?= $titulo ?></span>
        <form method="post" enctype="multipart/form-data" action=<?= $_SERVER['REQUEST_URI'] ?>>
            <div class="row">
                <div class="input-field col s12">
                    <input id="codPais" name="codPais" type="text" required maxlength="3"
                           value="<?= $deportista ? $deportista->getCodPais() : '' ?>">
                    <label for="codPais">Código de pais</label>
                </div>
                <div class="input-field col s12">
                    <input id="nombre" name="nombre" type="text" required
                           value="<?= $deportista ? $deportista->getNombre() : '' ?>">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="col s12">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
$contenido = ob_get_clean();
include __DIR__ . '/../../base.php';
?>
