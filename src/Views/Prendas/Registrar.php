<!-- Modal Para Crear -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    Registrar Prenda
                </h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation" action="index.php?page=prendas" method="post">
                    <input type="hidden" name="id" id="id_edit">
                    <div class="container container-form p-3">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="validationCustom01">Descripción</label>
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Ingrese el nombre de la prenda" aria-label="Username"
                                    name="nombre" required>
                            </div>
                            <div class="col">
                                <label for="">Categoría</label>
                                <select class="form-select" name="id_categoria">
                                    <option selected value="1">Franela</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Color</label>
                                <select class="form-select" name="id_color">
                                    <option selected>Seleccione un Color</option>
                                    <?php foreach($coloresData as $color): ?>
                                        <option value="<?php echo $color["id_color"]?>"><?php echo $color["color"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="validationCustom01">Stock</label>
                                <input type="number" class="form-control" id="validationCustom01" placeholder="Stock"
                                    aria-label="Username" name="stock" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label for="">Colección</label>
                                <select class="form-select" name="id_coleccion">
                                    <option value="1">Lima Limón</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Talla</label>
                                <select class="form-select" name="id_talla">
                                    <option selected value="1">S</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Género</label>
                                <select class="form-select" name="id_genero">
                                    <option selected value="1">Niño</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="validationCustom01">Precio</label>
                                <input type="number" class="form-control" id="validationCustom01"
                                    placeholder="Ingrese el precio de la prenda" aria-label="Username"
                                    name="precio" required>
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
