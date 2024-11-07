<?php

use src\Model\ColoresModel;
use src\Model\TiposMaterialModel;

$tiposMateialModel = new TiposMaterialModel;
$tiposData = $tiposMateialModel->viewAll();

$coloresModel = new ColoresModel();
$coloresData = $coloresModel->viewAll();
?>
<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-dark modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Crear Material
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" action="index.php?page=almacen&function=create" method="post">
                    <div class="container container-form d-flex flex-column p-3">

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" for="descripcionMaterial">Descripcion del material</label>
                            <input type="text" name="nombre_material" class="form-control-input campo descripcion w-100" id="descripcionMaterial" placeholder="descripcion" aria-label="Username" aria-describedby="addon-wrapping" minlength="5" title="Descripcion minimo 5 caracteres" />
                            <div class="valid-feedback"></div>
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" for="stockMaterial">Stock</label>

                            <input type="" name="stock" class="form-control-input campo stock w-100" placeholder="Stock del material" aria-label="Username" aria-describedby="addon-wrapping" id="stockMaterial" required />
                        </div>


                        <div class="input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" for="precioMaterial">Precio</label>

                            <input type="text" name="precio" class="form-control-input campo precio w-100" id="precioMaterial" placeholder="00.00Bs" aria-label="Username" aria-describedby="addon-wrapping" required />

                        </div>

                        <div class="container p-3">
                            <!-- Tipo de Material -->
                            <div class="row align-items-center py-2">
                                <div class="col-2 ">
                                    <label class="fw-bold" for="tipo_edit">Tipo</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control custom-select" name="tipo_material" id="tipo" required>
                                    <option value="" select >Seleccione un tipo</option>
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
                                    <select class="form-control custom-select" name="color_material" id="color">
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

                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue">
                            Registrar
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>