<?php
$action = $action ?? 'new';
$titulo = $action == 'new' ? 'Nueva edicion' : 'Editar edicion';
$edicion = $edicion ?? null;
ob_start();
?>
<div style="margin-top: 1em; margin-bottom: 1em">
    <a href="/mantenimiento/ediciones" style="display: flex; align-items: center;"><span
                class="material-icons">arrow_back</span>
        Volver</a>
</div>
<h3 class="mt-3 mb-3 light-blue-text text-darken-4">Mantenimiento de resultados</h3>
<div class="card">
    <div class="card-content">
        <span class="card-title"><?= $titulo ?></span>
        <form method="post" enctype="multipart/form-data" action=<?= $_SERVER['REQUEST_URI'] ?>>
            <div class="row">
                <div class="input-field col s12">
                    <p>Género</p>
                    <p>
                        <label>
                            <input name="genero" type="radio"
                                   value="masculino" <?= $edicion && $edicion->getGenero() == 'masculino' ? 'checked' : '' ?> />
                            <span>Masculino</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input name="genero" type="radio"
                                   value="femenino" <?= $edicion && $edicion->getGenero() == 'femenino' ? 'checked' : '' ?> />
                            <span>Femenino</span>
                        </label>
                    </p>
                </div>
                <div class="input-field col s12">
                    <input id="codigo" name="codigo" type="text" required
                           value="<?= $edicion ? $edicion->getCodigo() : '' ?>">
                    <label for="codigo">Código</label>
                </div>
                <div class="input-field col s12">
                    <input id="nombre" name="nombre" type="text" required
                           value="<?= $edicion ? $edicion->getNombre() : '' ?>">
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
