<!-- Modal Para Crear -->
<div class="modal fade" id="editar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar Factura
                </h1>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="needs-validation" action="index.php?page=usuarios" method="post">
                        <div class="container container-form d-flex flex-column  p-3">
                            <input type="hidden" name="page" value="usuarios">

                            <!-- Contenido del modal -->


                            <div class="p-4">
                                <!-- Buscador de cedula -->
                                <form class="" role="search">
                                    <label class="text-center fw-bold">Cliente a vender</label>
                                    <div class="d-flex">
                                        <input class="form-control m-2" type="search" placeholder="Buscar cedula"
                                            aria-label="Search" pattern="\d{8}" minlength="8" maxlength="8" />
                                        <button class="btn btn-success m-1" type="submit">
                                            Buscar
                                        </button>
                                    </div>
                                </form>

                                <!-- carta para ver al cliente seleccionado -->
                                <div class="card btn btn-light ">
                                    <div class="card-body p-0 d-flex justify-content-evenly align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
</svg>


                                        <div class="text-center">
                                            <h4 class="m-0 f-4 fw-bold">Cliente tal</h4>
                                            <p class="m-0">V-30872742</p>
                                        </div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
</svg>
                                 </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <p class="">¿no se encuentra creado? </p>
                                    <a href="#"> Nuevo cliente</a>
                                </div>
                            </div>

                            <div>
                                <!-- Buscador de productos -->
                                <form class="" role="search">
                                    <label for="" class="fw-bold">Prendas a comprar</label>
                                    <div class="d-flex">
                                        <input class="form-control m-2" type="search" placeholder="Buscar Prenda"
                                            aria-label="Search" pattern="\d{8}" minlength="8" maxlength="8" />
                                        <button class="btn btn-success m-1" type="submit">
                                            Buscar
                                        </button>
                                    </div>
                                    <div class="d-flex justify-content-evenly">
                                        <p class="">¿no se encuentra creado? </p>
                                        <a href="#"> Nuevo producto</a>
                                    </div>
                                </form>

                                <!-- Tabla para registrar los productos -->
                                <div class="card">
                                    <table class="table table table-striped my-table table-borderless">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Precio</th>
                                                <th scope="col">accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Camisa a cuadros</td>
                                                <td>2</td>
                                                <td>10$</td>
                                                <td><button class="btn btn-danger btn-sm"><?php include './src/Assets/bootstrap-icons-1.11.3/x.svg'; ?></button></td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>pantalon</td>
                                                <td>1</td>
                                                <td>5$</td>
                                                <td><button class="btn btn-danger btn-sm"> <?php include './src/Assets/bootstrap-icons-1.11.3/x.svg'; ?></button></td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>franela roja</td>
                                                <td>1</td>
                                                <td>5$</td>
                                                <td><button class="btn btn-danger btn-sm"><?php include './src/Assets/bootstrap-icons-1.11.3/x.svg'; ?></button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>


                                <!--Imputs para conocer los detalles de la venta -->
                                <div class=" d-flex align-items-center m-2 row">

                                    <div class="input-group d-flex col">
                                        <label class="fw-bold" for="">¿Es un envio?</label>
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            si
                                        </label>

                                    </div>

                                    <div class="input-group d-flex flex-column col">
                                        <label class="fw-bold" for="">Tipo de pago</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Efectivo
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" checked>
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Transferencia
                                            </label>
                                        </div>
                                    </div>


                                    <div class="card p-2 col text-center">
                                        <p class="m-0 fw-bold">total</p>
                                        <p class="m-0">50$</p>
                                    </div>
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
</div>