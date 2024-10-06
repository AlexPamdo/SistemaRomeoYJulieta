<!-- Modal Para Crear -->
<!-- la verdad no se cual era el problema aca, pero lo solucione -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Registrar Proveedor
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" action="index.php?page=proveedores" method="post">
                    <div class="container container-form d-flex flex-column p-3">

                        <label class="fw-bold" for="validationCustom01">Nombre</label>
                        <div class="form-label input-group flex-nowrap m-2">
                        <input type="text" pattern="[A-Za-z\s]+" name="nombre_proveedor" class="form-control" id="validationCustom01"
               placeholder="Nombre" aria-label="Username" aria-describedby="addon-wrapping"
               title="No se permiten números. Solo letras y espacios." required />
                            <div class="valid-feedback"></div>
                        </div>

                        <label class="fw-bold" for="validationCustom01">Telefono</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="number" class="form-control" id="validationCustom01"
                                placeholder="Ingrese el telefono del proveedor" aria-label="Username"
                                aria-describedby="addon-wrapping" name="telefono_proveedor" pattern="\d{11}"
                                minlength="11" maxlength="11" inputmode="numeric" title="Porfavor solo numeros" />
                            <div class="valid-feedback"></div>
                        </div>

                        <label class="fw-bold" for="validationCustom01">Gmail</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="email" class="form-control" id="validationCustom01"
                                placeholder="Ingrese el Email del proveedor" aria-label="Username"
                                aria-describedby="addon-wrapping" name="gmail_proveedor" />
                            <div class="valid-feedback"></div>
                        </div>


                        <label class="fw-bold" for="">Tipo de proveedor</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_tipo_proveedor" id="inputGroupSelect02" required>
                                <option selected value="1">Telas</option>
                                <option value="2">Maquinaria</option>
                                <option value="3">Estampados</option>
                            </select>
                        </div>


                        <label class="fw-bold" for="">Estado</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_estado" id="inputGroupSelect02" required>
                                <option selected value="1">Activo</option>
                                <option value="2">Inactivo</option>

                            </select>
                        </div>

                        <label class="fw-bold" for="validationCustom01">Notas</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <textarea class="form-control" id="validationCustom01" placeholder="notas del proveedor"
                                aria-label="Username" aria-describedby="addon-wrapping"
                                name="notas_proveedor"></textarea>
                            <div class="valid-feedback"></div>
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