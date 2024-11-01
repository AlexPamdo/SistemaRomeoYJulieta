<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar Contraseña</title>
    <link rel="stylesheet" href="src/Assets/style/Login.css">
    <link rel="stylesheet" href="src/libraries/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/Assets/style/index.css">
    <link rel="stylesheet" href="src/Assets/style/index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script type="text/javascript" src="src/Assets/js/jquery-3.7.1.min.js"></script>
</head>

<body>
    <!-- Formulario de Cambio de Contraseña -->
    <div class="login-form">
        <h1>Cambio de Contraseña</h1>
        <form class="needs-validation" action="index.php?function=cambiarContraseña" method="post" id="formPass">
            <input type="hidden" name="id" value="<?php echo $usuarioData["id_usuario"]?>">
            <div class="container p-0">
                <div class="mb-3">
                    <label class="form-label">Pregunta de seguridad</label>
                    <p><?php echo $usuarioData["pregunta"]; ?></p>
                </div>

                <div class="mb-3">
                    <label for="res" class="form-label">Respuesta de seguridad</label>
                    <input type="text" name="answer" class="form-control campoPass" id="res" placeholder="Escriba su respuesta">
                    <span class="error" id="resError"></span>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input type="password" name="password" class="form-control campoPass" id="password" placeholder="Escriba su nueva contraseña">
                </div>
                 <span class="error" id="passwordError"></span>
                <div class="mb-3">
                    <label for="c_password" class="form-label">Confirme su Contraseña</label>
                    <input type="password" name="c_password" class="form-control campoPass" id="c_password" placeholder="Confirme la contraseña">
                </div>

                 <span class="error" id="c_passwordError"></span>
                <div class="modal-footer">
                    <a href="index.php?page=login" class="btn btn-secondary">Cerrar</a>
                    <button type="submit"class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </form>
    </div>
  <script type="text/javascript" src="src/Assets/js/validarCambioPass.js"></script>r
</body>

</html>
