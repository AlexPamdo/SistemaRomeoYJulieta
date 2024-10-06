<!-- Modal Para Editar -->
<div class="modal fade" id="editar<?php echo ($prenda['id_prenda']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                    Editar proveedor
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" method="post" novalidate>
                    <div class="container d-flex flex-column">

                        <input type="hidden" name="id" value="<?php echo ($prenda['id_prenda']) ?>">
                        <input type="hidden" name="page" value="proveedores">

                        <!--Contenido del modal -->
                        <div>
                            <label for="validationCustom01">Descripcion</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="ingrese el nombre de la prenda" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="nombre_edit"
                                    value="<?php echo ($prenda['nombre_prenda']) ?>">
                                <div class="valid-feedback"></div>
                            </div>

                            <label for="">Categoria</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="categoria_edit" id="inputGroupSelect02" required>
                                    <option selected value="1">Franela</option>

                                </select>
                            </div>

                            <label for="">Talla</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="talla_edit" id="inputGroupSelect02" required>
                                    <option selected value="1">S</option>

                                </select>
                            </div>

                            <label for="">Coleccion</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="coleccion_edit" id="inputGroupSelect02" required>
                                    <option selected value="1">Lima Limón</option>

                                </select>
                            </div>

                            <label for="">color</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="color_edit" id="inputGroupSelect02" required>
                                    <option selected value="1">negro</option>

                                </select>
                            </div>

                            <label for="validationCustom01">Cantidad</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="number" class="form-control" id="validationCustom01"
                                    placeholder="Ingrese el nombre de la prenda" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="cant_edit"
                                    value="<?php echo ($prenda['stock']) ?>">
                                <div class="valid-feedback"></div>
                            </div>

                            <label for="">Genero</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="genero_edit" id="inputGroupSelect02" required>
                                    <option selected value="1">niño</option>

                                </select>
                            </div>

                            <label for="validationCustom01">precio</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="number" class="form-control" id="validationCustom01"
                                    placeholder="Ingrese el precio de la prenda" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="precio_edit"
                                    value="<?php echo ($prenda['precio_unitario']) ?>">
                                <div class="valid-feedback"></div>
                            </div>


                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">
                                Registrar
                            </button>
                        </div>


                </form>
            </div>

        </div>
    </div>
</div>