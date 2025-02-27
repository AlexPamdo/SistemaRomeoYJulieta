<!--Modal de eliminar -->
<div class="modal fade" id="eliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <!--Contenido del modal -->

                <div class="container d-flex text-center flex-column">

                    <h1><i class="fa-solid fa-circle-exclamation fs-1 " style="color: #da1010;"></i></h1>
                    <h3>¿Esta seguro?</h3>
                    <h5>Podrás recuperarlo luego en "Elementos deshabilitados"</h5>
                    <div class="modal-footer">
                        <form class="needs-validation" action="" id="deleteForm" method="post" novalidate>
                        <input type="text" name="id" id="eliminarId" value="">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button class="btn btn-danger" type="submit">eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>