<?php

require_once("templates/head.php");
?>

    <title>Perfil</title>    
</head>

<body class="bg-body-secondary">

    <main class="d-flex">
        <!--Barra lateral-->
        <?php include("views/templates/Header.php"); ?>

        <div class="col bg-custom-content p-0">
            <header class="bg-dark">
                <div class="p-3 d-flex justify-content-between align-items-center border-bottom">
                    <div class="d-flex align-items-center text-white">
                        <i class="fa-solid fa-user-circle fs-1 me-3"></i>
                        <h3 class="ms-3">Perfil</h3>
                    </div>
                    <!-- Menu Desplegable del perfil -->
                    <?php include_once("views/templates/menuDesplegable.php"); ?>
                </div>
            </header>

            <!-- Contenido de la página -->
            <div class="container mt-4">
                <div class="row g-4 container p-5">
                    <!-- Información General -->
                    <div class="col-lg-8">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white">
                                <h4 class="fw-bold">INFORMACIÓN GENERAL</h4>
                                <h6>Datos generales de la cuenta</h6>
                            </div>
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <!-- Imagen del usuario -->
                                    <form method="post" enctype="multipart/form-data" class="text-center me-4">
                                        <?php
                                        $imgUser = empty($_SESSION['img']) ? "Assets/img/users/User_default_icon.png" : $_SESSION['img'];
                                        ?>
                                        <label for="file1">
                                            <img src="<?php echo $imgUser; ?>" class="img-perfil" width="100px" height="100px" alt="Perfil">
                                        </label>
                                        <input type="file" name="file1" id="file1" style="display: none;">
                                        <button type="submit" value="editImg" name="ImgBtn" class="btn btn-sm btn-primary mt-2">Cambiar Imagen</button>
                                    </form>
                                    <div>
                                        <h5 class="fw-bold"><?php echo $_SESSION["username"] . " " . $_SESSION["lastname"]; ?></h5>
                                        <p class="text-muted">
                                            <?php echo $_SESSION["rol"] == 1 ? "Administrador" : "Usuario"; ?>
                                        </p>
                                    </div>
                                </div>

                                <h5>Información del usuario</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" id="nombre" class="form-control" value="<?php echo $_SESSION["username"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellido">Apellido</label>
                                        <input type="text" id="apellido" class="form-control" value="<?php echo $_SESSION["lastname"]; ?>" disabled>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label for="email">Correo Electrónico</label>
                                        <input type="email" id="email" class="form-control" value="<?php echo $_SESSION["email"]; ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="telefono">Teléfono</label>
                                        <input type="tel" id="telefono" class="form-control" value="<?php echo $_SESSION["cedula"]; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información Adicional -->
                    <div class="col-lg-4">
                        <div class="card shadow-sm">
                            <div class="card-header bg-dark text-white">
                                <h4 class="fw-bold">OPCIONES ADICIONALES</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Cambiar Contraseña
                                        <a href="#" class="btn btn-primary btn-sm">Editar</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Actividad Reciente
                                        <a href="#" class="btn btn-primary btn-sm">Ver</a>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        Cerrar Sesión
                                        <a href="logout.php" class="btn btn-danger btn-sm">Cerrar</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?php
    require("model/usuariosModel.php");

    if (isset($_POST["ImgBtn"])) {
        $users = new usuarios();

        if ($_FILES["file1"]["error"] > 0) {
            // Código para manejar el error
        } else {
            $nom_archivo = $_FILES['file1']['name'];
            $ruta = "Assets/img/users/" . $nom_archivo;
            $archivo = $_FILES['file1']['tmp_name'];
            $users->setImg($ruta);

            $subir = move_uploaded_file($archivo, $ruta);

            if ($users->subirImg($_SESSION["id_user"])) {
                $_SESSION["img"] = $ruta;
                header("Location: index.php?page=perfil&success=1");
            } else {
                header("Location: index.php?page=perfil&error=1");
            }
        }
    }

    include_once("views/templates/footer.php");
    ?>
  
</body>

</html>
