<!-- Modal Para ver los usuarios deshabilitados -->
<div class="modal fade" id="UsuariosDesabilitados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UsuariosDesabilitadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="UsuariosDesabilitadosLabel">Usuarios Deshabilitado</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <link rel="stylesheet" href="src/Libraries/DataTables/datatables.min.css">
            </div>
            <div class="modal-body">
                <div class="container">
                    <table class="table table-striped table-hover align-middle text-center" id="myTable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contraseña</th>
                                <th scope="col">Permisos</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuariosDesabilitadosData as $usuario):
                                $imgUser = empty($usuario['img_usuario']) ? "Assets/img/users/User_default_icon.png" : $usuario['img_usuario'];
                                ?>
                                <tr>
                                    <td><?php echo $usuario['id_usuario']; ?></td>
                                    <td><img class="rounded-circle" src="<?php echo $imgUser; ?>" alt="Perfil" width="50">
                                    </td>
                                    <td><?php echo $usuario['nombre_usuario']; ?></td>
                                    <td><?php echo $usuario['apellido_usuario']; ?></td>
                                    <td><?php echo $usuario['gmail_usuario']; ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <input type="password" class="form-control border-0 bg-light password-table"
                                                id="passwordInput<?php echo $usuario['id_usuario']; ?>"
                                                value="<?php echo htmlspecialchars($usuario['contraseña_usuario']); ?>"
                                                readonly>
                                            <i class="fas fa-eye show-password-icon ms-2"
                                                id="togglePasswordIcon<?php echo $usuario['id_usuario']; ?>"
                                                onclick="togglePasswordVisibility(<?php echo $usuario['id_usuario']; ?>)"></i>
                                        </div>
                                    </td>
                                    <td><?php echo $usuario['rol'] == 1 ? 'admin' : ($usuario['rol'] == 2 ? 'usuario' : 'otro rol'); ?>
                                    </td>
                                    <td class="d-flex">
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=usuarios&function=restore" method="post">
                                            <input type="hidden" name="id" value="<?php echo $usuario['id_usuario']; ?>">
                                            <button type="submit"
                                                class="btn btn-warning mx-1"><?php include './src/Assets/bootstrap-icons-1.11.3/recycle.svg'; ?></button>
                                        </form>
                                        <form class="d-flex justify-content-center" action="index.php?page=usuarios&function=remove" method="post">
                                        <input type="hidden" name="id" value="<?php echo $usuario['id_usuario']; ?>">
                                            <button type="submit"
                                                class="btn btn-danger mx-1"><?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?></button>
                                        </form>
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