<!-- Modal Principal -->
<div class="modal fade" id="patrones" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="exampleModalToggleLabel">Recetas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="m-0 modal-body bg-body-tertiary">

                <div class="row">

                    <?php

                    include_once("views/confecciones/patrones/crearPatrones.php");
                    include_once("model/patronesModel.php");
                    include_once("controllers/patronesController.php");

                    $patrones = new patrones();
                    $patronesData = $patrones->viewAll();

                    //funcion para crear
                    $patronesCrear = new crearPatron();
                    $patonesEditar = new editarPatron();
                    $patronesEliminar = new eliminarPatron();
                    $patonesEditar->edit();
                    $patronesCrear->create();
                    $patronesEliminar->delete();



                    ?>
                    <!-- -------------seccion de la tabla  --------------->
                    <!-- Navegador -->
                    <div class="col">

                        <nav class="navbar navbar-expand-lg d-flex justify-content-between p-3">
                            <form class="d-flex align-items-end" role="search">
                                <input class="form-control me-2" type="search" placeholder="Buscar Elemento"
                                    aria-label="Search" />
                                <button class="btn btn-outline-success" type="submit">Buscar</button>
                            </form>
                        </nav>

                        <div>
                            <div class="table-responsive bg-body-tertiary" id="containerNiños">
                                <table class="table my-table align-middle table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Codigo</th>
                                            <th scope="col">Prenda</th>
                                            <th scope="col">Material</th>
                                            <th scope="col">cantidad</th>
                                            <th scope="col">Costo Total</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($patronesData as $patron) :
                                        ?>
                                        <tr>
                                            <td><?php echo $patron["id_patron"] ?></td>
                                            <td><?php echo $patron["id_prenda"] ?></td>
                                            <td><?php echo $patron["id_material"] ?></td>
                                            <td><?php echo $patron["cantidad_material"] ?></td>
                                            <td><?php echo $patron["costo_unitario"] ?></td>
                                            <td class="d-flex">
                                                <!--Formulario donde estaran los botones de editar y eliminar -->
                                                <form class="d-flex" method="get">

                                                    <!--boton para abrir el modal para confirmar la eliminacion -->
                                                    <a href="#?id=<?php echo $patron["id_patron"] ?>"
                                                        class="btn btn-danger m-1" data-bs-toggle="modal"
                                                        data-bs-target="#eliminarPatron"><i class="fa-solid fa-trash"
                                                            style="color: #ffffff;"></i></a>

                                                    <!--boton para abrir el modal para confirmar la editacion -->
                                                    <button type="button" class="btn btn-success m-1"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#editarPatron<?php echo $patron["id_patron"] ?>"><i
                                                            class="fa-solid fa-pencil"
                                                            style="color: #ffffff;"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php

                                        endforeach;
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>