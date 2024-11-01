<!-- Modal Para ver los usuarios deshabilitados -->
<div class="modal fade" id="elementosDesabilitados" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="UsuariosDesabilitadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="UsuariosDesabilitadosLabel">Elementos Deshabilitado</h5>
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
                                <th scope="col">Descripción</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Color</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Precio</th>
                                <?php if ($_SESSION['rol'] == 1) { ?>
                                    <th scope="col">Acciones</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materialesDesabilitados as $material): ?>
                                <tr>
                                    <td><?php echo $material['id_material']; ?></td>
                                    <td><?php echo $material['nombre_material']; ?></td>
                                    <td><?php echo $material['tipo_material']; ?></td>
                                    <td><?php echo $material['color_material']; ?></td>
                                    <td><?php echo $material['stock']; ?></td>
                                    <td><?php echo $material['precio']; ?></td>


                                    <td class="d-flex">
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=almacen&function=restore" method="post">
                                            <input type="hidden" name="id" value="<?php echo $material['id_material']; ?>">
                                            <button type="submit"
                                                class="btn btn-warning mx-1"><?php include './src/Assets/bootstrap-icons-1.11.3/recycle.svg'; ?></button>
                                        </form>
                                        <form class="d-flex justify-content-center"
                                            action="index.php?page=almacen&function=remove" method="post">
                                            <input type="hidden" name="id" value="<?php echo $material['id_material']; ?>">
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