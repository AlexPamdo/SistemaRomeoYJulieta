<?php
use src\Model\OrdenEntregaModel;
?>

<!-- Modal Para ver Los materiales del patron -->
<div class="modal fade" id="orden<?php echo $entrega['id_pedido_prenda']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="MaterialesPatronLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="MaterialesPatronLabel">Orden de la entrega</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

                <table class="table table-striped table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Prenda</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $ordenEntrega = new OrdenEntregaModel();
                        $prendas = $ordenEntrega->viewPrendas($entrega['id_pedido_prenda'],"id_pedido_prenda");
                        foreach ($prendas as $prenda) :
                        ?>
                            <tr>
                                <td><?php echo $prenda['id_pedido_prenda']; ?></td>
                                <td><?php echo $prenda['id_prenda']; ?></td>
                                <td><?php echo $prenda['cantidad_prenda']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
