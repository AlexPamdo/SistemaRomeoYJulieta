<?php
require_once("Templates/Head.php");
?>
<link rel="stylesheet" href="src/Assets/style/login.css">
    <title>Login</title>    
</head>

<body>
    <!-- Formulario de Iniciar Sesión -->
    <div class="login-form">
        <div class="text-center">
            <img src="src/Assets/img/logo2.png" alt="Logo" width="80px">
            <h2>Iniciar Sesión</h2>
        </div>
        <form method="post" action="index.php?function=login">
            <div class="form-floating">
                <input type="email" class="form-control" name="gmail_usuario" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating">
                <input class="form-control" type="password" name="contraseña_usuario" id="floatingPassword" placeholder="Contraseña" required>
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div class="remember text-end">
                <a href="#" data-bs-toggle="modal" data-bs-target="#correoModal">Olvidé mi contraseña</a>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-3" type="submit" name="btnLogin" value="ok">Iniciar Sesión</button>
        </form>
    </div>

    <!-- Modal "Olvidé mi contraseña" -->
    <div class="modal fade" id="correoModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="correoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="correoModalLabel">Recuperar Contraseña</h5>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="index.php?function=showCambiarContraseña" method="post">
                        <div class="mb-3">
                            <label for="validationCustom01" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" name="correo" class="form-control" id="validationCustom01" placeholder="Introduzca su correo" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="btnOlvide" value="crear" class="btn btn-rj-blue">Buscar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once("src/Views/Templates/Log.php"); ?>
    <script src="src/libraries/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>
</body>

</html>
