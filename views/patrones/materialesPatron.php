<!-- Modal Para ver Los materiales del patron -->
<div class="modal fade" id="materialesPatron<?php echo $patron['id_patron']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="MaterialesPatronLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="MaterialesPatronLabel">Materiales del Patrón</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                

                <table class="table table-striped table-hover align-middle text-center">
                    <thead>
                        <tr>
                            <th scope="col">Descripción</th>
                            <th scope="col">Tipod</th>
                            <th scope="col">Color</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $materiales = $this->patronMaterialModel->viewMaterials($patron['id_patron']);

                        foreach ($materiales as $material) :
                        ?>
                            <tr>
                                <td><?php echo $material['material']; ?></td>
                            
                                <td><?php echo $material['tipo']; ?></td>
                                <td><?php echo $material['color']; ?></td>

                                <td><?php echo $material['cantidad']; ?></td>
                                <td><?php echo $material['cantidad_Stock']; ?></td>
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
