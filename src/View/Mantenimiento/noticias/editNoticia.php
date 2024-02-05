<?php
$action = $action ?? 'new';
$titulo = $action == 'new' ? 'Nueva noticia' : 'Editar noticia';
$noticia = $noticia ?? null;
ob_start();
?>
<div style="margin-top: 1em; margin-bottom: 1em">
    <a href="/mantenimiento/noticias" style="display: flex; align-items: center;"><span
                class="material-icons">arrow_back</span>
        Volver al mantenimiento</a>
</div>
<h3 class="mt-3 mb-3 light-blue-text text-darken-4">Mantenimiento de noticias</h3>
<div class="card">
    <div class="card-content">
        <span class="card-title"><?= $titulo ?></span>
        <form method="post" enctype="multipart/form-data" action=<?= $_SERVER['REQUEST_URI'] ?>>
            <div class="row">
                <div class="input-field col s12">
                    <input id="titular" name="titular" type="text" required
                           value="<?= $noticia ? $noticia->getTitular() : '' ?>">
                    <label for="titular">Título</label>
                </div>
                <div class="input-field col s12">
                        <textarea id="cuerpo" name="cuerpo" required
                                  class="materialize-textarea"><?= $noticia ? $noticia->getCuerpo() : '' ?></textarea>
                    <label for="cuerpo">Cuerpo</label>
                </div>
                <div class="input-field col s12">
                    <input id="imageURL" name="imageURL" type="text" required
                           value="<?= $noticia ? $noticia->getImageURL() : '' ?>">
                    <label for="imageURL">URL de la imagen</label>
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
