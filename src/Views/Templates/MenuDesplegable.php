<div class="flex  row" id="navbarNav">

    <ul class="navbar-nav d-flex justify-content-end col-6">
        <li class="d-flex justify-content-end nav-item dropdown">

        <li class="nav-item dropdown">

            <!-- Si el usuario no tiene imagen se muestra la predeterminada -->
            <?php
                            if(empty($_SESSION['img'])){
                                $imgUser = "src/Assets/img/users/User_default_icon.png";
                            }else{
                                $imgUser = $_SESSION['img'];
                            }
                            ?>

            <a class="nav-link dropdown-toggle" href="index.php?page=perfil" role="button" aria-expanded="false">
                <img src="<?php echo $imgUser; ?>" class="img-perfil" width="50px" height="50px">
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?page=perfil">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuración</a></li>
                <li><a class="dropdown-item" href="src/Views/logout.php">Cerrar sesión</a></li>
            </ul>
        </li>

    </ul>

</div>