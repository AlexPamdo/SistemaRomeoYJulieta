<?php include_once("src/Views/Templates/Eliminar.php") ?>
<?php include_once("src/Views/Templates/Anular.php") ?>
<?php include_once("src/Views/Templates/Anular.php") ?>
<?php include_once("src/Views/Templates/Actualizar.php") ?>
<?php include_once("src/Views/Templates/Orden.php") ?>
<?php include_once("src/Views/Templates/Restaurar.php") ?>
<?php include_once("src/Views/Templates/Remover.php") ?>
<?php include_once("src/Views/Templates/Papelera.php") ?>




<!-- Footer -->
<footer class="bg-dark text-white pt-4">
    <div class="container">
        <div class="row">
            <!-- Sección 1 -->
            <div class="col-md-4">
                <h5>Sobre Nosotros</h5>
                <p>En Romeo y Julieta, creemos en dar de vuelta a la comunidad. Por ello, apoyamos iniciativas locales que promueven el bienestar infantil y la educación.</p>
            </div>
            <!-- Sección 2 -->
            <div class="col-md-4">
                <h5>Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white" onclick="iniciarTour()">Ayuda</a></li>
                    <li><a href="#" class="text-white">Servicios</a></li>
                    <li><a href="#" class="text-white">Contacto</a></li>
                    <li><a href="#" class="text-white">Acerca de</a></li>
                </ul>
            </div>
            <!-- Sección 3 -->
            <div class="col-md-4">
                <h5>Contacto</h5>
                <p>
                    <i class="bi bi-telephone-fill"></i> +1 234 567 890<br>
                    <i class="bi bi-envelope-fill"></i> romeoyjulieta@gmail.com
                </p>
                <div>
                    <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </div>
        <hr class="bg-white">
        <div class="text-center py-3">
            &copy; 2024 Romeo y julieta. Todos los derechos reservados.
        </div>
    </div>
</footer>


<script src="src/Libraries/DataTables/datatables.min.js"></script>
<script src="src/Assets/js/Ajax.js"></script>


<!-- scrip de las estregas -->
<script src="src/Assets/js/entregas.js"></script>

<!-- Modales de editar -->



<script src="src/Libraries/Intro/intro.min.js"></script>

<script src="src/Assets/js/select2.js"></script>

<script src="src/Libraries/bootstrap-5.3.3-dist/js/bootstrap.min.js"></script>

<script src="src/Assets/js/script.js"></script>

<script src="src/Assets/js/fechaReporte.js"></script>

<!-- confecciones -->
<script src="src/Assets/js/confecciones.js"></script>



<script>
    $(document).ready(function() {
        if (!$.fn.DataTable.isDataTable('#myTable')) {
            $('#myTable').DataTable({
                language: {
                    info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    infoEmpty: "Mostrando 0 a 0 de 0 entradas",
                    infoFiltered: "(filtrado de _MAX_ entradas totales)",
                    lengthMenu: "Mostrar _MENU_ entradas",
                    search: "Buscar:",
                    zeroRecords: "No se encontraron entradas"
                }
            });
        }

        if (!$.fn.DataTable.isDataTable('#orderTable')) {
            $('#orderTable').DataTable({
                language: {
                    info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                    infoEmpty: "Mostrando 0 a 0 de 0 entradas",
                    infoFiltered: "(filtrado de _MAX_ entradas totales)",
                    lengthMenu: "Mostrar _MENU_ entradas",
                    search: "Buscar:",
                    zeroRecords: "No se encontraron entradas"
                }
            });
        }
    });
</script>



<script>
    function toggleMenu() {
        const sidebar = document.getElementById('offcanvasSidebar');
        const mainContent = document.getElementById('main-content');

        sidebar.classList.toggle('show'); // Muestra u oculta el sidebar
        sidebar.classList.toggle('hide'); // Aplica clase "hide" cuando esté oculto
    }
</script>