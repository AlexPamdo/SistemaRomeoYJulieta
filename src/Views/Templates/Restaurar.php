 <!-- Modal Para Crear -->
 <div class="modal fade" id="restaurar" data-bs-backdrop="static"
     data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">

             <div class="modal-body">
                 <!--Contenido del modal -->

                 <div class="container d-flex text-center flex-column">

                     <h1><i class="fa-solid fa-sync fs-1" style="color: #28a745;"></i></h1>

                     <h3>¿Restaurar el elemento?</h3>
                     <div class="d-flex justify-content-center modal-footer">
                         <form class="needs-validation" id="restoreForm" method="post" novalidate>
                             <input type="hidden" name="id" id="idRestaurar" value="">
                             <button type="submit" class="btn btn-custom-success">Confirmar</button>
                         </form>
                         <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#papelera">
                             Cerrar
                         </button>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>