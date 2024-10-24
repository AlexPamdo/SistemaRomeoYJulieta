<!-- Modal Para Editar -->
<div class="modal fade" id="editar<?php echo ($proveedor['id_proveedor']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Editar proveedor
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" method="post" novalidate>
                    <div class="container d-flex flex-column">

                        <input type="hidden" name="id" value="<?php echo ($proveedor['id_proveedor']) ?>">
                        <input type="hidden" name="page" value="proveedores">

                        <!--Contenido del modal -->
                        <div>
                            <label class="fw-bold" for="validationCustom01">Proveedor</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Identidad del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="nombre_proveedor_edit"
                                    value="<?php echo ($proveedor['nombre_proveedor']) ?>">
                                <div class="valid-feedback"></div>
                            </div>

                            <label class="fw-bold" for="validationCustom01">Telefono</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="telefono del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="telefono_proveedor_edit"
                                    value="<?php echo ($proveedor['telefono_proveedor']) ?>">
                                <div class="valid-feedback"></div>
                            </div>

                            <label class="fw-bold" for="validationCustom01">Gmail</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="gmail del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="gmail_proveedor_edit"
                                    value="<?php echo ($proveedor['gmail_proveedor']) ?>">
                                <div class="valid-feedback"></div>
                            </div>


                            <label class="fw-bold" for="">Tipo de proveedor</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="id_tipo_proveedor_edit" id="inputGroupSelect02"
                                    required>
                                    <option selected value="1">Telas</option>
                                    <option value="2">Maquinaria</option>
                                    <option value="3">Estampados</option>
                                </select>
                            </div>


                            <label class="fw-bold" for="">Estado</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="id_estado_edit" id="inputGroupSelect02" required>
                                    <option selected value="1">Activo</option>
                                    <option value="2">Inactivo</option>

                                </select>
                            </div>

                            <label class="fw-bold" for="validationCustom01">Notas</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control" id="validationCustom01"
                                    placeholder="Notas del proveedor" aria-label="Username"
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