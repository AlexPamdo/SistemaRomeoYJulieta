<!-- Modal Para Crear -->
<!-- la verdad no se cual era el problema aca, pero lo solucione -->
<div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-rj-blue">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">
                    Subir Prenda al catalogo
                </h1>
            </div>
            <div class="modal-body">

                <form class="needs-validation" action="index.php?page=proveedores" method="post">
                    <div class="container container-form d-flex flex-column p-3">

                        <label for="validationCustom01">Nombre</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="nombre la prenda " aria-label="Username" aria-describedby="addon-wrapping"
                                name="nombre_proveedor" />
                            <div class="valid-feedback"></div>
                        </div>

                        <label for="validationCustom01">Talla</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="talla de la prenda" aria-label="Username" aria-describedby="addon-wrapping"
                                name="telefono_proveedor" />
                            <div class="valid-feedback"></div>
                        </div>

                        <label for="validationCustom01">Genero</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <select class="form-select" name="id_tipo_proveedor" id="inputGroupSelect02" required>
                                <option selected value="1">Niño</option>
                                <option value="2">Niña</option>
                            </select>
                        </div>


                        <label for="">Coleccion</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_tipo_proveedor" id="inputGroupSelect02" required>
                                <option selected value="1">Lima Limon</option>
                                <option value="2">NaviWow</option>
                                <option value="3">Pastorcita</option>
                                <option value="4">San Valentin</option>
                                <option value="5">Hoy elijo actuar con amor</option>
                                <option value="6">Happy Holidays</option>
                                <option value="7">Fiestas y Villancicos</option>
                            </select>
                        </div>

                        <label for="">Imagen de prenda</label>
                        <div class="input-group pt-3 pb-3">
                            <input type="file" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                        </select>
                    </div>


                    <label for="validationCustom01">Descripción</label>
                    <div class="form-label input-group flex-nowrap m-2">
                        <textarea class="form-control" id="validationCustom01"
                            placeholder="Una breve descripcion de la prenda" aria-label="Username"
                            aria-describedby="addon-wrapping" name="notas_proveedor"></textarea>
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