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
                                <th scope="col">Proveedor</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Orden</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">Total a pagar</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pedidosDeleteData as $pedido) : ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($pedido['id_pedido']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['id_proveedor']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['fecha_pedido']); ?></td>
                                    <td>
                                        <?php echo $pedido['estado_pedido'] ? "<div class='Entregado'>Pago</div>" : "<div class='no-Entregado text-center'>No pagado</div>"; ?>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                            data-bs-target="#orden<?php echo $pedido['id_pedido'] ?>">
                                            <?php include './src/Assets/bootstrap-icons-1.11.3/eye-fill.svg'; ?>
                                        </button>
                                    </td>
                                    <td><?php echo htmlspecialchars($pedido['id_usuario']); ?></td>
                                    <td><?php echo htmlspecialchars($pedido['total_pedido']); ?> bs</td>

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

<?php foreach ($pedidosDeleteData as $pedido) :
                        include("src/Views/Pedidos/Orden.php");
                    endforeach; ?>