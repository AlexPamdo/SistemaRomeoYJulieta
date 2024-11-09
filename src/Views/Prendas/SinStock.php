<!-- Modal Para ver los usuarios deshabilitados -->
<div class="modal fade" id="ningunStock" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="UsuariosDesabilitadosLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="UsuariosDesabilitadosLabel">Usuarios Eliminados</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <table class="table table-striped table-hover align-middle text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">Identificador</th>
                                <th scope="col"></th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Categoría</th>
                                <th scope="col">Talla</th>
                                <th scope="col">Colección</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Género</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($prendasNoStockData as $prenda) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($prenda['id_prenda']); ?></td>
                                    <td><img class="img-prenda" src="<?php echo htmlspecialchars($prenda['img_prenda']); ?>" alt="" height="60px" width="60px"></td>
                                    <td><?php echo htmlspecialchars($prenda['nombre_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_categoria']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_talla']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['id_coleccion']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['stock']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['genero']); ?></td>
                                    <td><?php echo htmlspecialchars($prenda['precio_unitario']); ?> bs</td>
                                    <td class="d-flex">
                                        <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                            data-bs-target="#materialesPatron<?php echo $prenda['id_prenda']; ?>">
                                            <?php include './src/Assets/bootstrap-icons-1.11.3/eye-fill.svg'; ?>
                                        </button>
                                        <!-- Botones de editar y eliminar -->
                                        <button type="button" class="btn btn-danger me-1" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($prenda['id_prenda']); ?>">
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