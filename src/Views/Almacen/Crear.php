<?php

use src\Model\ColoresModel;
use src\Model\TiposMaterialModel;

$tiposMateialModel = new TiposMaterialModel;
$tiposData = $tiposMateialModel->viewAll();

$coloresModel = new ColoresModel();
$coloresData = $coloresModel->viewAll();
?>
<!-- Modal Para Crear -->
<div class="modal fade" id="crear" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-dark modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Crear Material
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" id="createForm" method="post">
                    <div class="container container-form d-flex flex-column p-3">

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" for="descripcionMaterial">Descripción del material</label>
                            <input type="text" name="nombre_material" class="form-control-input campo descripcion w-100 nombreMaterial" id="descripcionMaterial" placeholder="descripcion" aria-label="Username" aria-describedby="addon-wrapping"/>
                            <div class="valid-feedback"></div>
                        </div>

                        <div class="input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" for="stockMaterial">Stock</label>

                            <input type="" name="stock" class="form-control-input campo stock w-100 stockMaterial" placeholder="Stock del material" aria-label="Username" aria-describedby="addon-wrapping" id="stockMaterial"  />
                        </div>

                        <div class="container p-3">
                            <!-- Tipo de Material -->
                            <div class="row align-items-center py-2">
                                <div class="col-2 ">
                                    <label class="fw-bold" for="tipo_edit">Tipo</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control custom-select tipoMaterial" name="tipo_material" id="tipo" >
                                    <option value="" select >Seleccione un tipo</option>
                                        <?php foreach ($tiposData as $tipo): ?>
                                            <option value="<?php echo $tipo["id_tipo_material"] ?>"><?php echo $tipo["tipo_material"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <span class="errorTipoMaterial error d-block text-center"></span>
                            </div>

                            <div class="row align-items-center py-2">
                                <div class="col-2 ">
                                    <label class="fw-bold" for="tipo_edit">Medida</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control custom-select medidaMaterial" name="medida_material" id="medida" >
                                    <option value="" select >Seleccione un tipo de medida</option>
                                    <option value="Unidades" >Unidades</option>
                                    <option value="Metros" >Metros</option>
                                    </select>
                                </div>
                                <span class="errorMedidaMaterial d-block text-center"></span>
                            </div>

                            <!-- Color del Material -->
                            <div class="row align-items-center py-2">
                                <div class="col-2 ">
                                    <label class="fw-bold" for="color_edit">Color</label>
                                </div>
                                <div class="col-9">
                                    <select class="form-control custom-select colorMaterial" name="color_material" id="color">
                                    <option value="" select>Seleccione un color</option>

                                        <?php foreach ($coloresData as $color): ?>
                                            <option value="<?php echo $color["id_color"] ?>"><?php echo $color["color"] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <span class="errorColorMaterial error d-block text-center"></span>
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