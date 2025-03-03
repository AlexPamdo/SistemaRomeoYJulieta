<!-- Sidebar de navegación para la aplicación -->



<div class="sidebar d-flex flex-column flex-shrink-0 p-3 bg-dark text-white col-3" style="width: 280px;" id="offcanvasSidebar">
    <div class="logo-conteiner d-flex justify-content-between align-items-center mb-3">
        <a href="#" class="text-white text-decoration-none d-flex align-items-center">
            <img src="src/Assets/img/logo2.png" alt="Logo" height="40" width="45" />
            <h5 class="ms-2 mb-0">ROMEO Y JULIETA</h5>
        </a>
    </div>

    <div class="offcanvas-body p-0">
        <ul class="nav flex-column">
            <!-- Elementos visibles para todos los usuarios -->
            <li class="nav-item">
                <a id="dashboard" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=dashboard">
                <?php include './src/Assets/bootstrap-icons-1.11.3/house-door-fill.svg'; ?>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a id="almacen" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=almacen">
                <?php include './src/Assets/bootstrap-icons-1.11.3/box-seam-fill.svg'; ?>
                    Almacén
                </a>
            </li>
            <li class="nav-item">
                <a id="proveedores" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=proveedores">
                <?php include './src/Assets/bootstrap-icons-1.11.3/person-check-fill.svg'; ?>
                    Proveedores
                </a>
            </li>
            
            <!-- Elementos visibles solo para administradores -->
            <?php if ($_SESSION['rol'] == 1) : ?>
                <hr class="my-3 text-secondary">
                <li class="nav-item">
                    <a id="pedidosPrendas" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=pedidosPrendas">
                    <?php include './src/Assets/bootstrap-icons-1.11.3/shop.svg'; ?>
                        Pedidos de prendas
                    </a>
                </li>
                <li class="nav-item">
                    <a id="prendas" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=prendas">
                    <?php include './src/Assets/bootstrap-icons-1.11.3/bookmark-check-fill.svg'; ?>
                        Prendas terminadas
                    </a>
                </li>
                <li class="nav-item">
                    <a id="confecciones" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=confecciones">
                    <?php include './src/Assets/bootstrap-icons-1.11.3/scissors.svg'; ?>
                        Confecciones
                    </a>
                </li>
                <li class="nav-item">
                    <a id="pedidosProveedores" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=pedidosProveedores">
                    <?php include './src/Assets/bootstrap-icons-1.11.3/clipboard2-check-fill.svg'; ?>
                        Pedidos a Proveedores
                    </a>
                </li>
                <li class="nav-item">
                    <a id="supervisores" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=supervisores">
                    <?php include './src/Assets/bootstrap-icons-1.11.3/person-vcard-fill.svg'; ?>
                    Supervisores
                    </a>
                </li>
                <li class="nav-item">
                    <a id="usuarios" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=usuarios">
                    <?php include './src/Assets/bootstrap-icons-1.11.3/person-circle.svg'; ?>
                        Usuarios
                    </a>
                </li>
                <li class="nav-item">
                    <a id="reportes" class="nav-link-rj nav-link d-flex align-items-center gap-2" href="index.php?page=reportes">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1z"/>
</svg>    
                    Reportes
                        
                    </a>
                </li>
            <?php endif; ?>

            <hr class="my-3 text-secondary">
            <li class="nav-item">
                <a class="nav-link-rj nav-link d-flex align-items-center gap-2 text-white" href="src/Views/logout.php">
                <?php include './src/Assets/bootstrap-icons-1.11.3/box-arrow-left.svg'; ?>
                    Cerrar sesión
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Botón para abrir/cerrar el menú -->
<button class="btn btn-dark" id="menu-toggle" onclick="toggleMenu()">&#9776;</button>


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
