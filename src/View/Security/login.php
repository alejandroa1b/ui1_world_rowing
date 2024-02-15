<?php
$titulo = 'Login';
$usuario = $usuario ?? '';
$error = $error ?? '';
ob_start()
?>
    <div class="row">

        <div class="col-12 col-md-6 offset-md-3">
            <h2>Login</h2>
            <?php if ($error): ?>
                <p class="red-text"><?= $error ?></p>
            <?php endif; ?>
            <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="text" class="form-control" id="usuario" name="usuario" value="<?= $usuario ?>">

                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Entrar</button>
            </form>
            <p>Pista: admin - 1234</p>
        </div>
    </div>
<?php
$contenido = ob_get_clean();
include __DIR__ . '/../base.php';