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

                <form class="needs-validation formEdit" action="index.php?page=proveedores&function=edit" method="post" novalidate>
                    <div class="container d-flex flex-column">

                        <input type="hidden" name="id" value="<?php echo ($proveedor['id_proveedor']) ?>">
                        <input type="hidden" name="page" value="proveedores">

                        <!--Contenido del modal -->
                        <div>
                            <div>
                            <label class="fw-bold">Proveedor</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control campoEdit nameProveedorEdit"
                                    placeholder="Identidad del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="nombre_proveedor_edit"
                                    value="<?php echo ($proveedor['nombre_proveedor']) ?>" required >
                                <div class="valid-feedback"></div>
                            </div>
                            <span class="error nameProveedorEditError"></span>
                            </div>

                            <div>
                            <label class="fw-bold">RIF</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control campoEdit rifProveedorEdit"
                                    placeholder="Ingrese el RIF del proveedor" aria-label="RIF"
                                    aria-describedby="addon-wrapping" name="rif_proveedor_edit"
                                    pattern="^[VEJGPvejgp]\d{9}$" minlength="10" maxlength="10"
                                    title="Formato: letra V, E, J, G o P + 9 dígitos." value="<?php echo ($proveedor['rif_proveedor']) ?>" required />
                                <div class="invalid-feedback">
                                    RIF inválido. Formato: letra + 9 dígitos.
                                </div>
                                <div class="valid-feedback"></div>
                            </div>
                            <span class="error" id="rifProveedorEditError"></span>
                            </div>

                            <div>
                                <label class="fw-bold">Telefono</label>
                                <div class="form-label input-group flex-nowrap m-2">
                                    <input type="text" class="form-control campoEdit telfProveedorEdit"
                                        placeholder="telefono del proveedor" aria-label="Username"
                                        aria-describedby="addon-wrapping" name="telefono_proveedor_edit"
                                        value="<?php echo ($proveedor['telefono_proveedor']) ?>" required >
                                    <div class="valid-feedback"></div>
                                </div>
                                <span class="error telfProveedorEditError"></span>
                            </div>

                            <div>
                            <label class="fw-bold">Gmail</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control campoEdit emailProveedorEdit"
                                    placeholder="gmail del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="gmail_proveedor_edit"
                                    value="<?php echo ($proveedor['gmail_proveedor']) ?>" required >
                                <div class="valid-feedback"></div>
                            </div>
                            <span class="error emailProveedorEditError"></span>
                            </div>

                            <div>
                            <label class="fw-bold">Notas</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" class="form-control campoEdit notasProveedorEdit"
                                    placeholder="Notas del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="notas_proveedor_edit"
                                    value="<?php echo ($proveedor['notas_proveedor']) ?>" required >
                                <div class="valid-feedback"></div>
                            </div>
                            <span class="error notasProveedorEditError"></span>
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