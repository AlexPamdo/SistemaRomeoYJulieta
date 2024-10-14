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
                         <?php include './Assets/bootstrap-icons-1.11.3/printer-fill.svg'; ?>
                         </button>

                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>