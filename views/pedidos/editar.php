<!-- Modal Para Crear -->
<div class="modal fade" id="editar<?php echo ($pedido['id_pedido']) ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar pedido
                </h1>
            </div>
            <div class="modal-body">
                <div class="">
                    <form class="needs-validation bg-body-secondary " method="post">

                        <div class="container container-form d-flex flex-column p-3">

                            <input type="hidden" name="id" value="<?php echo ($pedido['id_pedido']) ?>">
                            <input type="hidden" name="page" value="pedidos">

                            <label class="fw-bold" for="validationCustom01">Nombres</label>
                            <div class="form-label input-group flex-nowrap m-2">
                                <input type="text" name="nombre_pedido_edit" class="form-control" id="validationCustom01" placeholder="Introduzca el Nombre" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $pedido['nombre_pedido'] ?>" required />
                                <div class="valid-feedback"></div>
                            </div>
                            <label class="fw-bold" for="">Apellidos</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="text" name="apellido_pedido_edit" class="form-control" placeholder="Introduzca el Apellido" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $pedido['apellido_pedido'] ?>" required />
                            </div>
                            <label class="fw-bold" for="">Cedula</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="number" name="cedula_pedido_edit" class="form-control" placeholder="Introduzca la cedula" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $pedido['cedula_pedido'] ?>" pattern="\d{8}" minlength="8" maxlength="8" required />
                            </div>
                            <label class="fw-bold" for="">Correo electrónico</label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="text" name="gmail_pedido_edit" class="form-control" placeholder="Introduzca el email" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $pedido['gmail_pedido'] ?>" required />
                            </div>

                            <label class="fw-bold" for="password_create">Contraseña </label>
                            <div class="input-group flex-nowrap m-2">
                                <input type="password" name="password_pedido_edit" class="form-control" id="password_create" placeholder="Introduzca la Contraseña" aria-label="Username" aria-describedby="addon-wrapping" value="<?php echo $pedido['contraseña_pedido'] ?>" required />

                            </div>

                            <label class="fw-bold" for="">Rol</label>
                            <div class="input-group pt-3 pb-3 ">
                                <select class="form-select" name="id_roles_edit" id="inputGroupSelect02" required>
                                    <option selected value="2">User</option>
                                    <option value="1">Admin</option>


                                </select>
                            </div>


                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cerrar
                            </button>
                            <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">
                                Editar
                            </button>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>