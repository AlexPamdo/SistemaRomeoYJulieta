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
                    <div class="container container-form d-flex flex-column p-3">

                        <label for="validationCustom01">Descripcion</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" class="form-control" id="validationCustom01"
                                placeholder="Ingrese el nombre de la prenda" aria-label="Username"
                                aria-describedby="addon-wrapping" name="nombre">
                            <div class="valid-feedback"></div>
                        </div>

                        <label for="">Categoria</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_categoria" id="inputGroupSelect02">
                                <option selected value="1">Franela</option>

                            </select>
                        </div>

                        <label for="">color</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_color" id="inputGroupSelect02">

                                <option value="1">negro</option>

                            </select>
                        </div>

                        <label for="validationCustom01">stock</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="number" class="form-control" id="validationCustom01" placeholder="stock"
                                aria-label="Username" aria-describedby="addon-wrapping" name="stock" required>
                            <div class="valid-feedback"></div>
                        </div>

                        <label for="">Colección</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_coleccion" id="inputGroupSelect02">

                                <option value="1">Lima Limón</option>
                            </select>
                        </div>

                        <label for="">talla</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_talla" id="inputGroupSelect02">
                                <option selected value="1">S</option>

                            </select>
                        </div>

                        <label for="">genero</label>
                        <div class="input-group pt-3 pb-3 ">
                            <select class="form-select" name="id_genero" id="inputGroupSelect02">
                                <option selected value="1">Niño</option>

                            </select>
                        </div>

                        <label for="validationCustom01">Precio</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="number" class="form-control" id="validationCustom01"
                                placeholder="Ingrese el precio de la prenda" aria-label="Username"
                                aria-describedby="addon-wrapping" name="precio" required>
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