<!-- Modal Para ver los usuarios deshabilitados -->
<div class="modal fade" id="elementosDesabilitados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UsuariosDesabilitadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="UsuariosDesabilitadosLabel">Empleados Deshabilitado</h5>
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
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Email</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">Ocupación</th>
                                <th scope="col">Cédula</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php
                             foreach ($empleadosDesabilitadosData as $empleado) : ?>
                                <tr class="table-custom-row">
                                    <td><?php echo htmlspecialchars($empleado['id_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['nombre_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['apellido_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['email_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['telefono_empleado']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['id_ocupacion']); ?></td>
                                    <td><?php echo htmlspecialchars($empleado['cedula_empleado']); ?></td>
                                    <td class="d-flex">
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=empleados&function=restore" method="post">
                                            <input type="hidden" name="id" value="<?php echo $empleado['id_empleado']; ?>">
                                            <button type="submit"
                                                class="btn btn-warning mx-1"><?php include './src/Assets/bootstrap-icons-1.11.3/recycle.svg'; ?></button>
                                        </form>
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=empleados&function=remove" method="post">
                                            <input type="hidden" name="id" value="<?php echo $empleado['id_empleado']; ?>">
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