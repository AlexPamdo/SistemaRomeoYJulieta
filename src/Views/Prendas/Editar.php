<!-- Modal Para Editar -->
<?php

use src\Model\AlmacenModel;
use src\Model\CategoriasPrendaModel;
use src\Model\ColeccionesModel;
use src\Model\ColoresModel;
use src\Model\GenerosModel;
use src\Model\TallasModel;

$categoriasModel = new CategoriasPrendaModel();
$tallasModel = new TallasModel();
$coloresModel = new ColoresModel();
$materialesModel = new AlmacenModel();
$coleccionesModel = new ColeccionesModel();
$generosModel = new GenerosModel();
?>

<div class="modal fade" id="editar" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Editar Prenda
                </h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="" method="post" novalidate>
                    <div class="container p-3">
                        <input type="hidden" name="id" id="id_edit">
                        <input type="hidden" name="img" id="img_edit" value="">

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nombre_edit">Descripción</label>
                                <input type="text" class="form-control" id="desc_edit"
                                    placeholder="Ingrese el nombre de la prenda" name="nombre_edit"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="categoria_edit">Categoría</label>
                                <select class="form-select" name="categoria_edit" id="categoria_edit" required>
                                    <option selected>Categoria</option>
                                    <?php
                                    $categoriasData = $categoriasModel->viewAll();
                                    foreach ($categoriasData as $categoria): ?>
                                        <option value="<?php echo $categoria["id_categoria"] ?>"><?php echo $categoria["nombre"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="talla_edit">Talla</label>
                                <select class="form-select" name="talla_edit" id="talla_edit" required>
                                    <option selected>Talla</option>
                                    <?php
                                    $tallaData = $tallasModel->viewAll();
                                    foreach ($tallaData as $talla): ?>
                                        <option value="<?php echo $talla["id_talla"] ?>"><?php echo $talla["edad"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="coleccion_edit">Colección</label>
                                <select class="form-select" name="coleccion_edit" id="coleccion_edit" required>
                                    <option selected>Coleccion</option>
                                    <?php
                                    $coleccionesData = $coleccionesModel->viewAll();
                                    foreach ($coleccionesData as $coleccion): ?>
                                        <option value="<?php echo $coleccion["id_coleccion"] ?>"><?php echo $coleccion["coleccion"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <select class="form-select" name="color_edit" id="color_edit" require>
                                    <option selected>Color</option>
                                    <?php
                                    $coloresData = $coloresModel->viewAll();
                                    foreach ($coloresData as $color): ?>
                                        <option value="<?php echo $color["id_color"] ?>"><?php echo $color["color"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="cant_edit">Cantidad</label>
                                <input type="text" class="form-control" id="cant_edit"
                                    placeholder="Ingrese la cantidad" name="cant_edit"
                                    required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="genero_edit">Género</label>
                                <select class="form-select" name="genero_edit" id="genero_edit" required>
                                    <option selected>Genero</option>
                                    <?php
                                    $generosData = $generosModel->viewAll();
                                    foreach ($generosData as $genero): ?>
                                        <option value="<?php echo $genero["id_genero"] ?>"><?php echo $genero["genero"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="precio_edit">Precio</label>
                                <input type="text" class="form-control" id="precio_edit"
                                    placeholder="Ingrese el precio de la prenda" name="precio_edit"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>