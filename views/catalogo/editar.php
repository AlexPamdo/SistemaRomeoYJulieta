<!-- Modal Para Editar -->
<div class="modal fade" id="editar<?php echo ($proveedor['id_proveedor']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Editar Prenda
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" method="post" novalidate>
                    <div class="container d-flex flex-column">

                        <input type="hidden" name="id" value="<?php echo ($proveedor['id_proveedor']) ?>">
                        <input type="hidden" name="page" value="proveedores">

                        <!--Contenido del modal -->
                        <div>
                            <label for="validationCustom01">Prenda</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="nombre de la prenda" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="nombre_proveedor_edit"
                                    value="<?php echo ($proveedor['nombre_proveedor']) ?>">
                                <div class="valid-feedback"></div>
                            </div>

                            <label for="validationCustom01">Talla</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="talla de la prenda" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="telefono_proveedor_edit"
                                    value="<?php echo ($proveedor['telefono_proveedor']) ?>">
                                <div class="valid-feedback"></div>
                            </div>

                            <label for="validationCustom01">Genero</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="genero de la prenda" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="gmail_proveedor_edit"
                                    value="<?php echo ($proveedor['gmail_proveedor']) ?>">
                                <div class="valid-feedback"></div>
                            </div>


                            <label for="">Coleccion</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="id_tipo_proveedor" id="inputGroupSelect02" required>
                                    <option selected value="1">Lima Limon</option>
                                    <option value="2">Naviwow</option>
                                    <option value="3">Pastorcita</option>
                                    <option value="4">San Valentin</option>
                                    <option value="5">Pastorcita</option>
                                    <option value="6">Hoy elijo actuar con amor</option>
                                    <option value="7">Happy Holidays</option>
                                    <option value="8">Fiestas y Villancicos</option>
                                </select>
                            </div>


                            <label for="">Imagen de prenda</label>
                            <div class="input-group pt-3 pb-3">
                                <input type="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            </div>
                            </select>
                        </div>

                        <label for="validationCustom01">Descripcion</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Una breve descripcion de la prenda" aria-label="Username"
                                aria-describedby="addon-wrapping" name="notas_proveedor_edit"
                                value="<?php echo ($proveedor['notas_proveedor']) ?>">
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