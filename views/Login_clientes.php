<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresa</title>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Assets/style/estilos.css">
</head>

<body>

    <?php

    include_once("controllers/loginClientesController.php");
    include_once("model/loginClientesmodel.php");

    $crearCliente = new loginClientes();
    $crearCliente->create();


    ?>

    <div class="backgroud-img">
        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion">Iniciar Sesión</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">Regístrarse</button>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">




                    <?php
                    //login
                    include_once("views/loginClientes/iniciarSesion.php");

                    //registrar
                    include_once("views/loginClientes/registrar.php");

                    ?>


                </div>
            </div>

        </main>
    </div>
    <script src="Assets/js/script.js"></script>
</body>

</html>