<!--Modal de eliminar -->
<div class="modal fade" id="eliminar<?php echo ($empleado['id_empleado']) ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body">
                <!--Contenido del modal -->

                <div class="container d-flex text-center flex-column">

                    <h1><i class="fa-solid fa-circle-exclamation fs-1 " style="color: #da1010;"></i></h1>
                    <h3>¿Esta seguro?</h3>
                    <h5>no podras recuperarlo luego</h5>
                    <div class="modal-footer">
                        <form class="needs-validation" action="index.php" method="get" novalidate>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <input type="hidden" name="page" value="empleados">
                            <input type="hidden" name="id" value="<?php echo ($empleado['id_empleado']) ?>">
                            <button class="btn btn-danger" name="btnDelete" value="delete">eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>