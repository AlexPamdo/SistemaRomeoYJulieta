<!-- Modal Para Crear -->
<!-- la verdad no se cual era el problema aca, pero lo solucione -->

<?php
//incluimos el controlador para acceder a la funcion ver todo
$prendasModel = new prenda();
$prendasList = $prendasModel->viewAll("stock");

?>

<div class="modal fade" id="crearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Subir Prenda al catalogo
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" id="itemForm" action="index.php?page=catalogo&function=create" method="post" enctype="multipart/form-data">

                    <div class="container  p-3">
                        <div class="row mb-3">

                            <label class="fw-bold" for="validationCustom01">Prenda</label>
                            <div class="form-label col input-group flex-nowrap">
                                <select class="form-select" name="desc" id="">
                                    <?php
                                    if (!empty($prendasList)) {
                                        foreach ($prendasList as $prenda) :
                                            if ($prenda["id_prenda"] !== null) {
                                    ?>
                                                <option value="<?php echo $prenda['id_prenda'] ?>">
                                                    <?php echo $prenda['nombre_prenda'] ?></option>
                                    <?php
                                            }
                                        endforeach;
                                    } else {
                                        echo '<option value="">No hay prendas disponibles</option>';
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="col mb-3">
                                <label class="fw-bold" for="validationCustom02">Precio</label>
                                <input type="text" name="precio" class="form-control" id="validationCustom02" placeholder="Introduzca el precio..." required />
                            </div>

                            <div class="col-12 mb-3">
                                <label class="fw-bold" for="validationCustom02">Detalles</label>
                                <textarea name="detalles" id="validationCustom03" class="form-control" placeholder="Introduzca los detalles que se observaran..."></textarea>

                            </div>

                            <div class="row mb-3">
                                <label class="fw-bold" for="imageUpload">Subir Imágenes</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <input type="file" name="images[]" id="imageUpload" class="form-control" multiple accept="image/*">
                                    <div class="valid-feedback"></div>
                                </div>
                            </div>

                            <label class="fw-bold" >Grupo</label>
                            <div class="form-label col input-group flex-nowrap ">
                                <select class="form-select" name="grupo" id="">
                                    <?php
                                    if (!empty($catalogoData)) {
                                        foreach ($catalogoData as $catalogo) :
                                            if ($catalogo["id_catalogo"] !== null) {
                                    ?>
                                                <option value="<?php echo $catalogo['grupo_catalogo'] ?>">
                                                    <?php echo $catalogo['desc_catalogo'] ?></option>
                                    <?php
                                            }
                                        endforeach;
                                    } else {
                                        echo '<option value="">No hay grupos disponibles</option>';
                                    }
                                    ?>
                                </select>
                                <div class="valid-feedback"></div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
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
</div>