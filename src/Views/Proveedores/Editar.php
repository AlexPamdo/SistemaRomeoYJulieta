<!-- Modal Para Editar -->
<div class="modal fade" id="editar" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Editar proveedor
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" action="index.php?page=proveedores&function=edit" method="post" novalidate>
                    <div class="container d-flex flex-column">

                        <input type="hidden" name="id" id="id_edit">

                        <!--Contenido del modal -->
                        <div>

                            <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold">Proveedor</label>

                                <input type="text" class="form-control-input campo descripcion w-100"
                                    placeholder="Identidad del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="nombre_proveedor" id="nombre_edit"
                                    required>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold">RIF</label>

                                <input type="text" class="form-control-input campo rif w-100"
                                    placeholder="Ingrese el RIF del proveedor" aria-label="RIF"
                                    aria-describedby="addon-wrapping" name="rif_proveedor"
                                    pattern="^[VEJGPvejgp]-\d{9}$" minlength="11" maxlength="11"
                                    title="Formato: letra V, E, J, G o P + 9 dígitos." id="rif_edit" required />
                                <div class="invalid-feedback">
                                    RIF inválido. Formato: letra + 9 dígitos.
                                </div>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold">Telefono</label>

                                <input type="text" class="form-control-input campo w-100 telf"
                                    placeholder="telefono del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="telefono_proveedor" id="telefono_edit"
                                    required>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold">Gmail</label>

                                <input type="text" class="form-control-input campo email w-100"
                                    placeholder="gmail del proveedor" aria-label="Username"
                                    aria-describedby="addon-wrapping" name="gmail_proveedor" id="correo_edit" required>
                                <div class="valid-feedback"></div>
                            </div>

                            <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                                <label class="fw-bold">Notas</label>
                                <textarea name="notas_proveedor" class="form-control-input campo w-100 notas" id="notas_edit" placeholder="Notas del proveedor" required></textarea>


                                <div class="valid-feedback"></div>
                            </div>

                        </div>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
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