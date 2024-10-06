<div class="flex  row" id="navbarNav">

    <ul class="navbar-nav d-flex justify-content-end col-6">
        <li class="d-flex justify-content-end nav-item dropdown">

        <li class="nav-item dropdown">

            <!-- Si el usuario no tiene imagen se muestra la predeterminada -->
            <?php
                            if(empty($_SESSION['img'])){
                                $imgUser = "Assets/img/users/User_default_icon.png";
                            }else{
                                $imgUser = $_SESSION['img'];
                            }
                            ?>

            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $imgUser; ?>" class="img-perfil" width="50px" height="50px">
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="index.php?page=perfil">Perfil</a></li>
                <li><a class="dropdown-item" href="#">Configuracion</a></li>
                <li><a class="dropdown-item" href="views/logout.php">Cerrar sesion</a></li>
            </ul>
        </li>

    </ul>

</div>