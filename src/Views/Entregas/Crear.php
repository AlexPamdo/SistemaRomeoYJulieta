 <?php

use src\Model\PrendasModel;

 ?>
 
 <!-- Modal Para Crear -->
 <div class="modal fade" id="CrearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-fullscreen modal-dialog-centered">
         <div class="modal-content">
             <div class="bg-rj-blue modal-header">
                 <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                     Crear pedido
                 </h1>
             </div>
             <div class="container modal-body">

                 <form class="needs-validation" action="index.php?page=entregas&function=create" method="post">
                     <div class="row g-3">
                    
                         <div class="col-md-6">
                             <h4 class="text-center text-body">Materiales a agregar</h4>

                             <!-- boton para agregar materiales -->
                             <div class="text-center d-flex flex-column align-content-center align-items-center">
                                 <button type="button" onclick="añadirMaterial()" name="btnAñadirMaterial"
                                     class="btn btn-rj-blue w-50">Añadir Material +</button>
                                 <small class="form-text text-muted">Minimo un Material, Maximo: 10 Materiales</small>
                             </div>

                             <!-- Tabla de materiales agregados -->
                             <div class="card mt-3">
                                 <table class="table table-striped">
                                     <thead>
                                         <tr>
                                             <th scope="col"></th>
                                             <th scope="col">Nombre</th>
                                             <th scope="col">Cantidad</th>
                                             <th scope="col">Acción</th>
                                         </tr>
                                     </thead>

                                     <tbody class="tablaMateriales">
                                         <tr id="filaMaterial">
                                             <td id="numberMaterial">1</td>
                                             <td>
                                                 <div class="input-group">
                                                     <select class="form-select" name="prenda[0][id_prenda]" id="prenda" required>
                                                         <option value="none">Ninguno</option>
                                                         <?php
                                                            // Incluimos el controlador para acceder a los materiales disponibles
                                                            $prendasModel = new PrendasModel();
                                                            $prendasData = $prendasModel->viewAll(0,"estado");
                                                            foreach ($prendasData as $prenda) : ?>
                                                             <option value="<?php echo $prenda['id_prenda'] ?>">
                                                                 <?php echo $prenda['nombre_prenda'] ?>
                                                             </option>
                                                         <?php endforeach; ?>
                                                     </select>
                                                     <div class="invalid-feedback">Por favor, selecciona un material.
                                                     </div>
                                                 </div>
                                             </td>
                                             <td><input type="number" class="form-control" name="prenda[0][cantidad]"
                                                     id="cantidadPrenda" placeholder="Cantidad de Prendas">
                                                 <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                             </td>
                                             <td><button class="btn btn-danger btn-sm"><i
                                                         class="fa-solid fa-xmark"></i></button></td>
                                         </tr>


                                     </tbody>
                                 </table>
                             </div>

                             <!-- Detalle de total -->
                             <div class="text-center mt-3">
                                 <div class="card p-2">
                                     <p class="fw-bold m-0">Total</p>
                                     <p class="m-0">$50</p>
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