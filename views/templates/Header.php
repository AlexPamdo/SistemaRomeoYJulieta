<!-- Sidebar de navegación para la aplicación -->

<div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-dark text-white col-3" style="width: 280px;" id="offcanvasSidebar">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="#" class="text-white text-decoration-none d-flex align-items-center">
            <img src="Assets/img/logo2.png" alt="Logo" height="40" width="45" />
            <h5 class="ms-2 mb-0">ROMEO Y JULIETA</h5>
        </a>
    </div>

    <div class="offcanvas-body p-0">
        <ul class="nav flex-column">
            <!-- Elementos visibles para todos los usuarios -->
            <li class="nav-item">
                <a id="dashboard" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=dashboard">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a id="catalogo" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=catalogo">
                    <i class="fas fa-book-open"></i>
                    Catálogo
                </a>
            </li>
            <li class="nav-item">
                <a id="almacen" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=almacen">
                    <i class="fas fa-warehouse"></i>
                    Inventario
                </a>
            </li>
            <li class="nav-item">
                <a id="clientes" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=clientes">
                    <i class="fas fa-user-friends"></i>
                    Clientes
                </a>
            </li>
            <li class="nav-item">
                <a id="facturas" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=ventas">
                    <i class="fas fa-file-invoice"></i>
                    Facturas
                </a>
            </li>
            <li class="nav-item">
                <a id="envios" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=envios">
                    <i class="fas fa-shipping-fast"></i>
                    Envios
                </a>
            </li>
            <li class="nav-item">
                <a id="proveedores" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=proveedores">
                    <i class="fas fa-truck"></i>
                    Proveedores
                </a>
            </li>

            <!-- Elementos visibles solo para administradores -->
            <?php if ($_SESSION['rol'] == 1) : ?>
                <hr class="my-3 text-secondary">
                <li class="nav-item">
                    <a id="prendas" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=prendas">
                        <i class="fas fa-tshirt"></i>
                        Prendas terminadas
                    </a>
                </li>
                <li class="nav-item">
                    <a id="confecciones" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=confecciones">
                        <i class="fas fa-cut"></i>
                        Confecciones
                    </a>
                </li>
                <li class="nav-item">
                    <a id="patrones" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=patrones">
                        <i class="fas fa-ruler-combined"></i>
                        Patrones
                    </a>
                </li>
                <li class="nav-item">
                    <a id="pedidos" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=pedidos">
                        <i class="fas fa-clipboard-list"></i>
                        Pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a id="empleados" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=empleados">
                        <i class="fas fa-user-tie"></i>
                        Empleados
                    </a>
                </li>
                <li class="nav-item">
                    <a id="usuarios" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=usuarios">
                        <i class="fas fa-users-cog"></i>
                        Usuarios
                    </a>
                </li>
            <?php endif; ?>

            <hr class="my-3 text-secondary">
            <li class="nav-item">
                <a class="nav-link-rj nav-link d-flex align-items-center gap-2 text-white" href="views/logout.php">
                    <i class="fas fa-sign-out-alt"></i>
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Código para resaltar el enlace activo según la página actual -->
<?php
$pagina = isset($_GET["page"]) ? htmlspecialchars($_GET["page"]) : '';
?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var pagina = "<?php echo $pagina; ?>";
        if (pagina) {
            var link = document.getElementById(pagina);
            if (link) {
                link.classList.add("link-rj-blue", "text-white");
            } else {
                console.warn("Elemento con ID '" + pagina + "' no encontrado.");
            }
        } else {
            console.warn("No se ha proporcionado una página válida.");
        }
    });
</script>
