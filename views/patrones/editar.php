<!-- Modal Para Editar Patrón -->
<div class="modal fade" id="editarPatron<?php echo $patron['id_patron'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarPatronLabel<?php echo $patron['id_patron'] ?>" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-rj-blue text-white">
                <h5 class="modal-title" id="editarPatronLabel<?php echo $patron['id_patron'] ?>">Editar Patrón</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Modal Body -->
            <div class="container modal-body">
                <form class="needs-validation" action="index.php?page=patrones&function=edit" method="post" enctype="multipart/form-data" novalidate>
                 

                    <div class="row g-3">       <!-- Div info -->
                        <div>
                        <p class="fs-5 ">Patron de <?php echo htmlspecialchars($patron['nombre_patron']); ?></p>
                            <label for="descripcion" class="form-label fw-bold mt-3">Nombre Prenda/Patron</label>
                            <input type="text" class="form-control" id="descripcion" name="nombre"
                                placeholder="Ingrese el nuevo nombre que tendra el Patron/Prenda" required>
                            <div class="invalid-feedback">Por favor, ingrese el nuevo nombre.</div>
                        </div>

                        <!-- Boton para agregar los materiales -->
                        <div class="text-center d-flex flex-column align-content-center align-items-center">
                        <button type="button" onclick="añadirMaterial()" name="btnAñadirMaterial" 
                        class="btn btn-primary w-50">Añadir Material +</button>
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

                                <tbody class="tablaMateriales">
                                    <tr id="filaMaterial">
                                        <td id="numberMaterial">1</td>
                                        <td>
                                            <div class="input-group">
                                                <select class="form-select" name="material[0][id_Material]" id="material" required>
                                                    <option value="none">Ninguno</option>
                                                    <?php
                                                    // Incluimos el controlador para acceder a los materiales disponibles
                                                    include_once("model/almacenModel.php");
                                                    $materiales = new Material();
                                                    $materialesData = $materiales->viewAll();
                                                    foreach ($materialesData as $material) : ?>
                                                        <option value="<?php echo $material['id_material'] ?>">
                                                            <?php echo $material['nombre_material'] ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <div class="invalid-feedback">Por favor, selecciona un material.
                                                </div>
                                            </div>
                                        </td>
                                        <td><input type="number" class="form-control" name="material[0][cantidad]"
                                                id="cantidadMaterial" placeholder="Cantidad de materiales" required>
                                            <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                        </td>
                                        <td><button class="btn btn-danger btn-sm"><i
                                                    class="fa-solid fa-xmark"></i></button></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                        <!-- Detalle de total -->
                        <div class="text-center mt-3">
                            <div class="card p-2">
                                <p class="fw-bold m-0">Total</p>
                                <p class="m-0"><?php echo htmlspecialchars($patron['costo_unitario']); ?> Bs</p>
                            </div>
                        </div>


                        <!-- Botón para crear el patrón -->
                        <div class="text-center mt-3">
                            <button type="submit" name="btnCrearPatron" value="crear"
                                class="btn btn-primary w-100">Editar</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>