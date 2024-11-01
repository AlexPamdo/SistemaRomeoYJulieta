<!-- Modal Para ver los usuarios deshabilitados -->
<div class="modal fade" id="elementosDesabilitados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UsuariosDesabilitadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="UsuariosDesabilitadosLabel">Prendas Deshabilitadas</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <link rel="stylesheet" href="src/Libraries/DataTables/datatables.min.css">
            </div>
            <div class="modal-body">
                <div class="container">
                    <table class="table table-striped table-hover align-middle text-center" id="myTable">
                        <thead>
                        <tr>
                                <th scope="col">Identificador</th>
                                <th scope="col"></th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Colección</th>
                                <th scope="col">Color</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Género</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prendaDesabilitadosData as $prenda):
                        
                                ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($prenda['id_prenda']); ?></td>
                                    <td><img class="img-prenda" src="<?php echo htmlspecialchars($prenda['img_prenda']); ?>" alt="" height="60px" width="60px"></td>
                                    <td><?php echo htmlspecialchars($prenda['nombre_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_categoria']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_talla']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_coleccion']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_color']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['stock']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_genero']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['precio_unitario']); ?> bs</td>
                                    <td class="d-flex">
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-danger me-1 eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                        <button type="button" class="btn btn-success me-1" data-bs-toggle="modal" data-bs-target="#editar<?php echo htmlspecialchars($prenda['id_prenda']); ?>">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="src/Assets/js/jquery-3.7.1.min.js"></script>
<script src="src/Libraries/DataTables/datatables.min.js"></script>

<script>
    // Función para alternar la visibilidad de la contraseña
    function togglePasswordVisibility(userId) {
        var passwordInput = document.getElementById('passwordInput' + userId);
        var togglePasswordIcon = document.getElementById('togglePasswordIcon' + userId);

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            togglePasswordIcon.classList.remove('fa-eye');
            togglePasswordIcon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            togglePasswordIcon.classList.remove('fa-eye-slash');
            togglePasswordIcon.classList.add('fa-eye');
        }
    }

    // Inicializar DataTable cuando el modal se muestre
    $('#UsuariosDesabilitados').on('shown.bs.modal', function () {
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
    });
</script>