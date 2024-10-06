<!-- Modal Para Crear Patrones -->
<div class="modal fade" id="crearPatrones" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="crearPatronLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-rj-blue text-white">
                <h5 class="modal-title" id="crearPatronLabel">Crear Prenda/Patrón</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Modal Body -->
            <div class="container modal-body">
                <form class="needs-validation" action="index.php?page=patrones&function=create" method="post" enctype="multipart/form-data" novalidate>
                    <div class="row g-3">
                        <!-- Sección de Datos de la Prenda -->
                        <div class="container col-md-6 row">

                        <h4 class="text-center">Detalles de prenda</h4>

                            <div class="col">
                                <label for="descripcion" class="form-label fw-bold mt-3">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="nombre"
                                    placeholder="Ingrese el nombre de la prenda" required>
                                <div class="invalid-feedback">Por favor, ingrese una descripción.</div>

                                <label for="categoria" class="form-label fw-bold mt-3">Categoría</label>
                                <select class="form-select" name="id_categoria" id="categoria" required>
                                    <option selected value="1">Franela</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione una categoría.</div>

                                <label for="color" class="form-label fw-bold mt-3">Color</label>
                                <select class="form-select" name="id_color" id="color" required>
                                    <option selected value="1">Negro</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione un color.</div>

                                <label for="stock" class="form-label fw-bold mt-3">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock"
                                    placeholder="Stock disponible" required>
                                <div class="invalid-feedback">Por favor, ingrese el stock.</div>

                            </div>

                            <div class="col">

                                <label for="coleccion" class="form-label fw-bold mt-3">Colección</label>
                                <select class="form-select" name="id_coleccion" id="coleccion" required>
                                    <option selected value="1">Lima Limón</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione una colección.</div>

                                <label for="talla" class="form-label fw-bold mt-3">Talla</label>
                                <select class="form-select" name="id_talla" id="talla" required>
                                    <option selected value="1">S</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione una talla.</div>

                                <label for="genero" class="form-label fw-bold mt-3">Género</label>
                                <select class="form-select" name="id_genero" id="genero" required>
                                    <option selected value="1">Niño</option>
                                </select>
                                <div class="invalid-feedback">Por favor, seleccione un género.</div>
                            </div>

                            <!-- Vista previa de la prenda seleccionada -->
                            <label for="file1">
                                <div
                                    class="input-img-rj card mt-3 d-flex align-items-center justify-content-center flex-column">
                                    <div class="col-md-12 text-center d-flex flex-column">
                                        <p class="fw-bold m-0">Imagen de la prenda</p>
                                        <input type="file" name="file1" class="form-control-file" id="file1"
                                            accept="image/*">
                                        <small class="form-text text-muted">Opcional. Tamaño máximo: 2MB</small>
                                    </div>
                                </div>
                            </label>

                            <!-- Opción para agregar nueva prenda -->
                            <div class="text-center mt-2">
                                <p class="d-inline">¿No se encuentra creado?</p>
                                <a href="#" class="fw-bold text-decoration-none">Nueva prenda</a>
                            </div>
                        </div>

                        <!-- Sección de Materiales -->
                        <div class="col-md-6">

                        <h4 class="text-center text-body">Materiales de la prenda</h4>

                        <!-- boton para agregar materiales -->
                        <div class="text-center d-flex flex-column align-content-center align-items-center">
                        <button type="button" onclick="añadirMaterial()" name="btnAñadirMaterial" 
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
                                    <p class="m-0">$50</p>
                                </div>
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