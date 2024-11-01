<!-- Modal Para ver los usuarios deshabilitados -->
<div class="modal fade" id="elementosDesabilitados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UsuariosDesabilitadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="UsuariosDesabilitadosLabel">Proveedores Deshabilitado</h5>
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
                                <th scope="col">Teléfono</th>
                                <th scope="col">Correo</th>                
                                <th scope="col">Notas</th>
                                <?php if ($_SESSION['rol'] == 1) { ?>
                                <th scope="col">Acciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($proveedoresDesabilitados as $proveedor): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($proveedor['id_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['nombre_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['telefono_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($proveedor['gmail_proveedor']); ?></td>
                                  
                                    
                                    <td><?php echo htmlspecialchars($proveedor['notas_proveedor']); ?></td>

                                    <?php if ($_SESSION['rol'] == 1) { ?>
                                        <td class="d-flex">
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=proveedores&function=restore" method="post">
                                            <input type="hidden" name="id" value="<?php echo $proveedor['id_proveedor']; ?>">
                                            <button type="submit"
                                                class="btn btn-warning mx-1"><?php include './src/Assets/bootstrap-icons-1.11.3/recycle.svg'; ?></button>
                                        </form>
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=proveedores&function=remove" method="post">
                                            <input type="hidden" name="id" value="<?php echo $proveedor['id_proveedor']; ?>">
                                            <button type="submit"
                                                class="btn btn-danger mx-1"><?php include './src/Assets/bootstrap-icons-1.11.3/trash-fill.svg'; ?></button>
                                        </form>
                                    </td>
                                    <?php } ?>
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