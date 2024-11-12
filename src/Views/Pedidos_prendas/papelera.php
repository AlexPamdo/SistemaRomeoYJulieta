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
                                <th scope="col">Fecha</th>
                                <th scope="col">Total</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entregasDeleteData as $entrega) : ?>
                                <tr>
                                <td><?php echo htmlspecialchars($entrega['id_pedido_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($entrega['fecha_pedido_prenda']); ?></td>
                                    <td><?php echo htmlspecialchars($entrega['total_pedido_prenda']); ?></td>
                                    <td class="d-flex">
                                        <!-- Boton de eliminar -->
                                        <form class="d-flex" action="index.php" method="get">
                                            <button type="button" class="btn btn-warning m-1" data-bs-toggle="modal"
                                                data-bs-target="#orden<?php echo $entrega['id_pedido'] ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/eye-fill.svg'; ?>
                                            </button>

                                            <button type="button" class="btn btn-danger m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#eliminar<?php echo htmlspecialchars($pedido['id_pedido']); ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/ban.svg'; ?>
                                            </button>

                                            <!-- Botón para abrir el modal de actualización -->
                                            <button type="button" class="btn btn-success m-1 btn-sm" data-bs-toggle="modal" data-bs-target="#actualizar<?php echo htmlspecialchars($pedido['id_pedido']); ?>">
                                                <?php include './src/Assets/bootstrap-icons-1.11.3/currency-dollar.svg'; ?>
                                            </button>
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

<?php foreach ($entregasDeleteData as $entrega) :
                        include("src/Views/Pedidos/Orden.php");
                    endforeach; ?>