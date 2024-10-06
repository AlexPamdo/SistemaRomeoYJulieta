<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="Assets/style/Login.css">
</head>

<body>

    <?php
    $usuarios = new usuarios();
    $usuario = $usuarios->viewOne($_GET["id"]);
    ?>

    <!-- Formulario de Cambio de Contraseña -->
    <div class="login-form">
        <h1>Cambio de Contraseña</h1>
        <form class="needs-validation" method="post">
            <div class="container p-0">
                <div class="mb-3">
                    <label class="form-label">Pregunta de seguridad</label>
                    <p><?php echo $usuario["pregunta"]; ?></p>
                </div>

                <div class="mb-3">
                    <label for="answer" class="form-label">Respuesta de seguridad</label>
                    <input type="text" name="answer" class="form-control" id="answer" placeholder="Escriba su respuesta" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Escriba su nueva contraseña" required>
                </div>

                <div class="mb-3">
                    <label for="c_password" class="form-label">Confirme su Contraseña</label>
                    <input type="password" name="c_password" class="form-control" id="c_password" placeholder="Confirme la contraseña" required>
                </div>

                <div class="modal-footer">
                    <a href="index.php?page=login" class="btn btn-secondary">Cerrar</a>
                    <button type="submit" name="btnSwichPassword" value="swichPassword" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>
