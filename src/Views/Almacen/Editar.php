<?php

use src\Model\ColoresModel;
use src\Model\TiposMaterialModel;

?>

<!-- Modal Para Editar Material -->
<div class="modal fade" id="editarM<?php echo $material['id_material']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar Material
                </h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation bg-body-secondary formEdit" action="index.php?page=almacen&function=edit" method="post">
                    <div class="container container-form d-flex flex-column p-3">
                        <!-- Campo oculto para el ID del material -->
                        <input type="hidden" name="id" value="<?php echo $material['id_material']; ?>">
                        <input type="hidden" name="page" value="materiales">

                        <!-- Nombre del Material -->
                        <label class="fw-bold" class="form-label">Descripción</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" name="nombre_material" class="form-control campoEdit descripcionMaterialEdit"
                                placeholder="Nombre del Material" aria-label="Nombre"
                                value="<?php echo $material['nombre_material']; ?>">
                            <div class="valid-feedback"></div>
                        </div>
                        <span class="error descripcionMaterialEditError"></span>

                        <!-- Tipo de Material -->
                        <label class="fw-bold" class="form-label">Tipo de material</label>
                        <div class="input-group pt-3 pb-3">
                            <select class="form-select" name="tipo_material" required>

                                <option selected>Seleccione un Tipo</option>
                                <?php
                                $tiposMateialModel = new TiposMaterialModel;
                                $tiposData = $tiposMateialModel->viewAll();
                                foreach ($tiposData as $tipo): ?>
                                    <option value="<?php echo $tipo["id_tipo_material"] ?>"><?php echo $tipo["tipo_material"] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <!-- Color del Material -->
                        <label class="fw-bold" class="form-label">Color</label>
                        <div class="input-group pt-3 pb-3">
                            <select class="form-select" name="color_material" id="inputGroupSelect02">
                                <option selected>Seleccione un Color</option>
                                <?php
                                $coloresModel = new ColoresModel();
                                $coloresData = $coloresModel->viewAll();
                                foreach ($coloresData as $color): ?>
                                    <option value="<?php echo $color["id_color"] ?>"><?php echo $color["color"] ?></option>
                                <?php endforeach; ?>

                            </select>
                        </div>

                        <!-- Stock del Material -->
                        <label class="fw-bold" class="form-label">Stock</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="" name="stock" class="form-control campoEdit stockMaterialEdit" placeholder="Stock"
                                aria-label="Stock" value="<?php echo $material['stock']; ?>">
                        </div>
                        <span class="error stockMaterialEditError"></span>

                        <!-- Precio del Material -->
                        <label for="precio" class="fw-bold" class="form-label campoEdit precioMaterialEdit">Precio</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="" name="precio" class="form-control campoEdit precioMaterialEdit" placeholder="Precio"
                                aria-label="Precio" value="<?php echo $material['precio']; ?>">
                        </div>
                        <span class="error precioMaterialEditError"></span>
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