 <!-- Modal Para visualizar la factura -->
 <div class="modal fade" id="visualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Prenda-1
                 </h1>
             </div>
             <div class="modal-body">

                 <form class="needs-validation" action="index.php?page=confecciones" method="post">

                     <div class="container container-form d-flex flex-column p-3">
                         <input type="hidden" name="page" value="confecciones">
                         <div class="p-4">
                             <!-- Buscador de prenda -->
                             <!-- Carta para ver la prenda seleccionada -->
                             <div class="card ">
                                 <div class="card-body p-0 d-flex justify-content-evenly align-items-center">
                                     <i class="fa-solid fa-shirt fs-1"></i>
                                     <div class="text-center">
                                         <h4 class="m-0 f-4 fw-bold">Camisa roja</h4>
                                         <p class="m-0">id 3</p>
                                     </div>

                                 </div>
                             </div>

                         </div>
                         <div>

                             <!-- Tabla para registrar los productos -->
                             <div class="card">
                                 <table class="table table-striped my-table table-borderless">
                                     <thead>
                                         <tr>
                                             <th scope="col">ID</th>
                                             <th scope="col">Nombre</th>
                                             <th scope="col">Cantidad</th>

                                         </tr>
                                     </thead>
                                     <tbody>
                                         <tr>
                                             <td>1</td>
                                             <td>Tela roja</td>
                                             <td>4 Rollos</td>

                                         </tr>
                                         <tr>
                                             <td>6</td>
                                             <td>Boton negro</td>
                                             <td>6</td>

                                         </tr>
                                         <tr>
                                             <td>40</td>
                                             <td>Hilo negro</td>
                                             <td>1 Rollo</td>

                                         </tr>
                                     </tbody>
                                 </table>
                             </div>
                             <!-- Inputs para conocer los detalles de la venta -->
                             <div class="d-flex align-items-center m-2 row">
                                 <div class="card p-2 col text-center">
                                     <p class="m-0 fw-bold">Total</p>
                                     <p class="m-0">50$</p>
                                 </div>
                             </div>

                         </div>

                     </div>
                     <div class="modal-footer">
                         <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                             data-bs-target="#patrones">
                             Cerrar
                         </button>
                     </div>
                 </form>

             </div>
         </div>
     </div>
 </div>