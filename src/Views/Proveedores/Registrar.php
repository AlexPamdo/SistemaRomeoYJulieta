<!-- Modal Para Crear -->
<!-- la verdad no se cual era el problema aca, pero lo solucione -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Registrar Proveedor
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation form" action="index.php?page=proveedores&function=create" method="post">
                    <div class="container container-form d-flex flex-column p-3">

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column">
                            <label class="fw-bold" for="nameProveedor">Nombre</label>
                            <input type="text" pattern="[A-Za-z\s]+" name="nombre_proveedor" class="form-control-input campo name w-100" id="nameProveedor"
                                placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping"
                                title="No se permiten números. Solo letras y espacios." required />
                            <div class="valid-feedback"></div>
                        </div>

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="rifProveedor">RIF</label>
                            <input type="text" class="form-control-input campo rif w-100" id="rifProveedor"
                                placeholder="Ingrese el RIF del proveedor" aria-label="RIF"
                                aria-describedby="addon-wrapping" name="rif_proveedor"
                                minlength="11" maxlength="11"
                                title="Formato: letra V, E, J, G o P + 9 dígitos." required />
                            <div class="invalid-feedback">
                                RIF inválido. Formato: letra + 9 dígitos.
                            </div>
                            <div class="valid-feedback"></div>
                        </div>

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="telfProveedor">Telefono</label>
                            <input type="number" class="form-control-input campo telf w-100" id="telfProveedor"
                                placeholder="Ingrese el telefono del proveedor" aria-label="Username"
                                aria-describedby="addon-wrapping" name="telefono_proveedor"
                                title="Porfavor solo numeros" />
                            <div class="valid-feedback"></div>
                        </div>


                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="emailProveedor">Email</label>

                            <input type="email" class="form-control-input campo email w-100" id="emailProveedor"
                                placeholder="Ingrese el Email del proveedor" aria-label="Username"
                                aria-describedby="addon-wrapping" name="gmail_proveedor" />
                            <div class="valid-feedback"></div>
                        </div>

                        <div class="form-label input-group flex-nowrap m-2 d-flex flex-column p-2">
                            <label class="fw-bold" for="notasProveedor">Notas</label>

                            <textarea class="form-control-input campo notas w-100" id="notasProveedor" placeholder="notas del proveedor"
                                aria-label="Username" aria-describedby="addon-wrapping"
                                name="notas_proveedor"></textarea>
                            <div class="valid-feedback"></div>
                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                        <button type="submit" name="btnCrear" value="crear" class="btn btn-rj-blue btn-registrar">
                            Registrar
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</div>