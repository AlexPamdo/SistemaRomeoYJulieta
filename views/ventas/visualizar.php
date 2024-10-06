 <!-- Modal Para visualizar la factura -->
 <div class="modal fade" id="visualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Venta-1
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=usuarios" method="post">
                     <div class="container container-form d-flex flex-column  p-3">
                         <input type="hidden" name="page" value="usuarios">

                         <!-- Contenido del modal -->


                         <div class="p-4">

                             <!-- carta para ver al cliente seleccionado -->
                             <div class="card">
                                 <div class="card-body p-0 d-flex justify-content-evenly align-items-center">
                                     <i class="fa-solid fa-circle-user fs-1 "></i>

                                     <div class="text-center">
                                         <h4 class="m-0 f-4 fw-bold">Cliente tal</h4>
                                         <p class="m-0">V-30872742</p>
                                     </div>
                                     <i class="fa-solid fa-plus fs-2"></i>
                                 </div>
                             </div>

                         </div>

                         <div>

                             <!-- Tabla para registrar los productos -->
                             <div class="card">
                                 <table class="table table table-striped my-table table-borderless">
                                     <thead>
                                         <tr>
                                             <th scope="col">ID</th>
                                             <th scope="col">Nombre</th>
                                             <th scope="col">Cantidad</th>
                                             <th scope="col">Precio</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td>1</td>
                                             <td>Camisa a cuadros</td>
                                             <td>2</td>
                                             <td>10$</td>

                                         </tr>
                                         <tr>
                                             <td>6</td>
                                             <td>pantalon</td>
                                             <td>1</td>
                                             <td>5$</td>

                                         </tr>
                                         <tr>
                                             <td>10</td>
                                             <td>franela roja</td>
                                             <td>1</td>
                                             <td>5$</td>

                                         </tr>
                                     </tbody>
                                 </table>
                             </div>


                             <!--Imputs para conocer los detalles de la venta -->
                             <div class=" d-flex align-items-center m-2 row">

                                 <div class="input-group d-flex col">
                                     <label class="fw-bold" for="">¿Es un envio?</label>
                                     <input class="form-check-input" type="radio" name="flexRadioDisabled"
                                         id="flexRadioDisabled" disabled>
                                     <label class="form-check-label" for="flexRadioDisabled">
                                         si
                                     </label>

                                 </div>

                                 <div class="input-group d-flex flex-column col">
                                     <label class="fw-bold" for="">Tipo de pago</label>
                                     <div class="form-check">
                                         <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                 id="flexCheckDisabled" disabled>
                                             <label class="form-check-label" for="flexCheckDisabled">
                                                 Efectivo
                                             </label>
                                         </div>
                                         <div class="form-check">
                                             <input class="form-check-input" type="checkbox" value=""
                                                 id="flexCheckCheckedDisabled" checked disabled>
                                             <label class="form-check-label" for="flexCheckCheckedDisabled">
                                                 Transferencia
                                             </label>
                                         </div>
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

                         <button class="btn btn-warning m-1" type="submit">
                             <i class="fa-solid fa-print"></i>
                         </button>

                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>