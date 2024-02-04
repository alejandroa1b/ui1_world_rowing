<?php
$titulo = "Contacto";
$status = $status ?? "";
ob_start();
?>
    <h3 class="light-blue-text text-darken-4">Contacto</h3>
    <p>Si tienes preguntas o necesitas más información, no dudes en contactarnos.</p>

<?php if ($status == "success"): ?>
    <div class="card-panel teal lighten-2">Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo
        pronto.
    </div>
<?php elseif ($status == "fail"): ?>
    <div class="card-panel red lighten-2">Hubo un problema al enviar tu mensaje. Por favor, intenta de nuevo más
        tarde.
    </div>
<?php endif; ?>
    <form action="/contacto" method="POST">
        <div class="input-field">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div class="input-field">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="input-field">
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" class="materialize-textarea" required></textarea>
        </div>
        <button type="submit" class="btn waves-effect waves-light">Enviar Mensaje</button>
    </form>
<?php
$contenido = ob_get_clean();
include __DIR__ . "/../base.php";

