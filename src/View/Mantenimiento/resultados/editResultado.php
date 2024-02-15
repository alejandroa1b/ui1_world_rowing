<?php
$action = $action ?? 'new';
$titulo = $action == 'new' ? 'Nuevo resultado' : 'Editar resultado';
$resultado = $resultado ?? null;
$deportistas = $deportistas ?? [];
$edicion = $edicion ?? null;
ob_start();
?>
<div style="margin-top: 1em; margin-bottom: 1em">
    <a href="/mantenimiento/resultados/<?= $edicion->getId()?>" style="display: flex; align-items: center;"><span
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
                    <input id="posicion" type="number" name="posicion" value="<?= $resultado ? $resultado->getPosicion() : null ?>">
                    <label for="posicion">Posición</label>
                </div>
                <div class="input-field col s12">
                    <input id="tiempo" type="number" name="tiempo" value="<?= $resultado ? $resultado->getTiempo() : null ?>">
                    <label for="tiempo">Tiempo (segundos)</label>
                </div>
                <div class="input-field col s12">
                    <select name="deportista">
                        <option value="" disabled selected>Selecciona un deportista</option>
                        <?php foreach ($deportistas as $deportista): ?>
                            <option value="<?= $deportista->getId() ?>" <?= $resultado && $resultado->getDeportista()->getId() == $deportista->getId() ? 'selected' : '' ?>><?= $deportista->getNombre() ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label>Deportista</label>
                </div>
                <div class="col s12" style="margin-top: 10px">
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
