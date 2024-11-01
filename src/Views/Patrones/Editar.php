<!-- Modal Para Editar Patrón -->
<div class="modal fade" id="editarPatron<?php

                                        use src\Model\AlmacenModel;

                                        echo $patron['id_patron'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarPatronLabel<?php echo $patron['id_patron'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-rj-blue text-white">
                <h5 class="modal-title" id="editarPatronLabel<?php echo $patron['id_patron'] ?>">Editar Patrón</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Modal Body -->
            <div class="container modal-body">
                <form class="needs-validation" action="index.php?page=patrones&function=edit" method="post" enctype="multipart/form-data" novalidate>
                    <input type="hidden" name="id" value="<?php echo $patron['id_patron'] ?>">

                    <div class="row g-3"> <!-- Div info -->
                        <div class="col-md-6">

                            <h4 class="text-center text-body">Materiales de la prenda</h4>

                            <!-- boton para agregar materiales -->
                            <div class="text-center d-flex flex-column align-content-center align-items-center">
                                <button type="button" onclick="añadirMaterialEdit(<?php echo $patron['id_patron'] ?>)" name="btnAñadirMaterial"
                                    class="btn btn-rj-blue w-50">Añadir Material +</button>
                                <small class="form-text text-muted">Minimo un Material, Maximo: 10 Materiales</small>
                            </div>

                            <!-- Tabla de materiales agregados -->
                            <div class="card mt-3">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Acción</th>
                                        </tr>
                                    </thead>

                                    <tbody class="tablaMateriales" data-patron="<?php echo $patron['id_patron'] ?>">
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <div class="input-group">
                                                    <select class="form-select materialSelect" name="material[0][id_Material]">
                                                        <option value="none">Ninguno</option>
                                                        <?php foreach ($materialesData as $material) : ?>
                                                            <option value="<?php echo $material['id_material'] ?>">
                                                                <?php echo $material['nombre_material'] ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <div class="invalid-feedback">Por favor, selecciona un material.</div>
                                                </div>
                                            </td>
                                            <td>
                                                <input type="number" class="cantidadInput form-control" name="material[0][cantidad]" placeholder="Cantidad de materiales">
                                                <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm eliminarBtn"><i class="fa-solid fa-xmark"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>

                            <!-- Botón para crear el patrón -->
                            <div class="text-center mt-3">
                                <button type="submit" name="btnCrearPatron" value="crear"
                                    class="btn btn-rj-blue w-100">Crear</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>