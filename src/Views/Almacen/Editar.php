<?php

use src\Model\ColoresModel;
use src\Model\TiposMaterialModel;

$tiposMateialModel = new TiposMaterialModel;
$tiposData = $tiposMateialModel->viewAll();

$coloresModel = new ColoresModel();
$coloresData = $coloresModel->viewAll();
?>

<!-- Modal Para Editar Material -->
<div class="modal fade" id="editar" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-dark modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar Material
                </h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation form" action="index.php?page=almacen&function=edit" method="post">
                    <div class=" d-flex flex-column p-3">
                        <!-- Campo oculto para el ID del material -->
                        <input type="hidden" name="id" id="id_edit">

                        <!-- Nombre del Material -->
                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" class="form-label">Descripción</label>

                            <input type="text" name="nombre_material" class="form-control-input campo descripcion w-100" id="desc_edit"
                                placeholder="Nombre del Material" aria-label="Nombre">
                            <div class="valid-feedback"></div>
                        </div>

                        <!-- Stock del Material -->
                        <div class="input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" class="form-label">Stock</label>

                            <input type="" name="stock" class="form-control-input campo stock w-100" id="stock_edit" placeholder="Stock"
                                aria-label="Stock">
                        </div>

                        <!-- Precio del Material -->
                        <div class="input-group flex-nowrap m-2 d-flex flex-column">
                            <label for="precio" class="fw-bold" class="form-label campoEdit precioMaterialEdit">Precio</label>

                            <input type="" name="precio" class="form-control-input campo precio w-100" id="precio_edit" placeholder="Precio"
                                aria-label="Precio">
                        </div>

                        <div class="container p-3">
                            <!-- Tipo de Material -->
                            <div class="row align-items-center py-2">
                                <div class="col-2 ">
                                    <label class="fw-bold" for="tipo_edit">Tipo</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control custom-select-edit" name="tipo_material" id="tipo_edit" required>
                                    <option value="" select>Seleccione un tipo</option>

                                        <?php foreach ($tiposData as $tipo): ?>
                                            <option value="<?php echo $tipo["id_tipo_material"] ?>"><?php echo $tipo["tipo_material"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <!-- Color del Material -->
                            <div class="row align-items-center py-2">
                                <div class="col-2 ">
                                    <label class="fw-bold" for="color_edit">Color</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control custom-select-edit" name="color_material" id="color_edit">
                                    <option value="" select>Seleccione un color</option>

                                        <?php foreach ($coloresData as $color): ?>
                                            <option value="<?php echo $color["id_color"] ?>"><?php echo $color["color"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>