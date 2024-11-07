<!-- Modal Para Crear Patrones -->

<?php

use src\Model\AlmacenModel;
use src\Model\CategoriasPrendaModel;
use src\Model\ColeccionesModel;
use src\Model\ColoresModel;
use src\Model\TallasModel;

$categoriasModel = new CategoriasPrendaModel();
$tallasModel = new TallasModel();
$coloresModel = new ColoresModel();
$materialesModel = new AlmacenModel();
$coleccionesModel = new ColeccionesModel();
?>


<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="crearPatronLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header bg-dark text-white">
                <h5 class="modal-title" id="crearPatronLabel">Crear Prenda</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>

            <!-- Modal Body -->
            <div class="container modal-body mt-5">
                <form class="needs-validation form" action="index.php?page=prendas&function=create" method="post" enctype="multipart/form-data" novalidate id="formPatron">
                    <div class="row g-3">
                        <!-- Sección de Datos de la Prenda -->
                        <div class="container col-md-6 row">

                            <h4 class="text-center">Detalles de prenda</h4>

                            <div class="col">
                                <div>
                                    <label for="descripcion" class="form-label fw-bold mt-3">Descripción</label>
                                    <input type="text" class="form-control-input campo" id="descripcion" name="nombre"
                                        placeholder="Ingrese el nombre de la prenda">
                                    <div class="invalid-feedback">Por favor, ingrese una descripción.</div>
                                </div>

                                <div>
                                    <label for="stock" class="form-label fw-bold mt-3">Stock</label>
                                    <input type="" class="form-control-input campo" id="stock" name="stock"
                                        placeholder="Stock disponible">
                                    <div class="invalid-feedback">Por favor, ingrese el stock.</div>
                                </div>

                                <div class="p-4 text-center">
                                    <label for="genero" class="form-label fw-bold mt-3">Género</label>
                                    <div class="d-flex justify-content-around">
                                        <input type="hidden" value="" name="id_genero">

                                        <div class="d-flex flex-column align-items-center">
                                            <input type="radio" id="niño" value="Niño" name="id_genero">
                                            <label for="niño">niño</label>
                                        </div>
                                        <div class="d-flex flex-column align-items-center">
                                            <input type="radio" id="niña" value="Niña" name="id_genero">
                                            <label for="niña">niña</label>
                                        </div>
                                        <div class="invalid-feedback">Por favor, seleccione un género.</div>

                                    </div>
                                </div>
                            </div>

                            <div class="col">

                                <div class="p-2">
                                    <label for="coleccion" class="form-label fw-bold mt-3">Colección</label>
                                    <select class="custom-select" name="id_coleccion" id="coleccion">
                                        <option selected>Coleccion</option>
                                        <?php
                                        $coleccionesData = $coleccionesModel->viewAll();
                                        foreach ($coleccionesData as $coleccion): ?>
                                            <option value="<?php echo $coleccion["id_coleccion"] ?>"><?php echo $coleccion["coleccion"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Por favor, seleccione una colección.</div>
                                </div>

                                <div class="p-2">
                                    <label for="talla" class="form-label fw-bold mt-3">Talla</label>
                                    <select class="custom-select" name="id_talla" id="talla">
                                        <option selected>Talla</option>
                                        <?php
                                        $tallaData = $tallasModel->viewAll();
                                        foreach ($tallaData as $talla): ?>
                                            <option value="<?php echo $talla["id_talla"] ?>"><?php echo $talla["edad"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Por favor, seleccione una talla.</div>
                                </div>

                                <div class="p-2">
                                    <label for="categoria" class="form-label fw-bold mt-3">Categoría</label>
                                    <select class="custom-select" name="id_categoria" id="categoria">
                                        <option selected>Categoria</option>
                                        <?php
                                        $categoriasData = $categoriasModel->viewAll();
                                        foreach ($categoriasData as $categoria): ?>
                                            <option value="<?php echo $categoria["id_categoria"] ?>"><?php echo $categoria["nombre"] ?></option>
                                        <?php endforeach; ?>

                                    </select>
                                    <div class="invalid-feedback">Por favor, seleccione una categoría.</div>
                                </div>

                                <div class="p-2">
                                    <label for="color" class="form-label fw-bold mt-3">Color</label>
                                    <select class="custom-select" name="id_color" id="color">
                                        <option selected>Color</option>
                                        <?php
                                        $coloresData = $coloresModel->viewAll();
                                        foreach ($coloresData as $color): ?>
                                            <option value="<?php echo $color["id_color"] ?>"><?php echo $color["color"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">Por favor, seleccione un color.</div>
                                </div>

                            </div>

                            <div class>
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

                                    <tbody class="tablaMateriales">
                                        <tr id="filaMaterial">
                                            <td id="numberMaterial">1</td>
                                            <td>
                                                <div class="input-group">
                                                    <select class="custom-select-table" name="material[0][id_Material]" id="material">
                                                        <option value="none">Ninguno</option>
                                                        <?php
                                                        // Incluimos el controlador para acceder a los materiales disponibles
                                                        $materialesData = $materialesModel->viewAll(false);

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
                                            <td>
                                                <input type="" class="" name="material[0][cantidad]"
                                                    id="cantidadMaterial" placeholder="Cantidad de materiales">
                                                <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                            </td>
                                            <span class="error cantidadMaterialError"></span>
                                            <td><button class="btn btn-danger btn-sm"><i
                                                        class="fa-solid fa-xmark"></i></button></td>
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