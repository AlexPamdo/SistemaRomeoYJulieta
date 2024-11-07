 <?php

    use src\Model\PrendasModel;

    ?>

<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Encabezado del Modal -->
            <div class="modal-header bg-rj-blue text-white">
                <h5 class="modal-title" id="staticBackdropLabel">Registrar Entrega</h5>
            </div>

            <!-- Cuerpo del Modal -->
            <div class="modal-body container">
                <form class="needs-validation" action="index.php?page=entregas&function=create" method="post">
                    <div class="row g-4 m-3">
                        <div class="col-md-10 mx-auto">
                            <h4 class="text-center text-body">Prendas a Entregar</h4>

                            <!-- Botón para agregar prendas -->
                            <div class="text-center my-3 d-flex flex-column align-items-center">
                                <button type="button" id="añadirPrenda" class="btn btn-rj-blue w-50">Añadir Material +</button>
                                <small class="form-text text-muted">Mínimo un material, máximo 10 materiales</small>
                            </div>

                            <!-- Tabla de materiales agregados -->
                            <div class="card shadow-sm mt-4 overflow-auto" style="max-height: 300px;">
                                <table class="table table-striped mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tablaPrendas">
                                        <tr id="filaPrenda">
                                            <td id="numberPrenda">1</td>
                                            <td>
                                                <div class="input-group">
                                                    <select class="custom-select-table" name="prenda[0][id_prenda]" id="prenda" required>
                                                        <option value="none">Ninguno</option>
                                                        <?php
                                                        $prendasModel = new PrendasModel();
                                                        $prendasData = $prendasModel->viewAll(0, "estado");
                                                        foreach ($prendasData as $prenda) : ?>
                                                            <option value="<?php echo $prenda['id_prenda'] ?>">
                                                                <?php echo $prenda['nombre_prenda'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">Por favor, selecciona un material.</div>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="prenda[0][cantidad]" id="cantidadPrenda" placeholder="Cantidad de Prendas">
                                                <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm"><i class="fa-solid fa-xmark"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pie del Modal -->
                    <div class="modal-footer d-flex justify-content-between p-3">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>