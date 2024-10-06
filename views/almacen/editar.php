<!-- Modal Para Editar Material -->
<div class="modal fade" id="editarM<?php echo $material['id_material']; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="bg-rj-blue modal-header">
                <h1 class="modal-title text-white fs-5" id="staticBackdropLabel">
                    Editar Material
                </h1>
            </div>
            <div class="modal-body">
                <form class="needs-validation bg-body-secondary" action="index.php?page=almacen&function=edit" method="post">
                    <div class="container container-form d-flex flex-column p-3">
                        <!-- Campo oculto para el ID del material -->
                        <input type="hidden" name="id" value="<?php echo $material['id_material']; ?>">
                        <input type="hidden" name="page" value="materiales">

                        <!-- Nombre del Material -->
                        <label for="validationCustom01" class="fw-bold" class="form-label">Nombre del Material</label>
                        <div class="form-label input-group flex-nowrap m-2">
                            <input type="text" name="nombre_material" class="form-control" id="validationCustom01"
                                placeholder="Nombre del Material" aria-label="Nombre"
                                value="<?php echo $material['nombre_material']; ?>" required>
                            <div class="valid-feedback"></div>
                        </div>

                        <!-- Tipo de Material -->
                        <label for="tipo_material" class="fw-bold" class="form-label">Tipo de material</label>
                        <div class="input-group pt-3 pb-3">
                            <select class="form-select" name="tipo_material" id="tipo_material" required>
                                <!-- Aquí puedes generar dinámicamente las opciones desde la base de datos -->
                                <option value="1" <?php echo ($material['tipo_material'] == 1) ? 'selected' : ''; ?>>
                                    Tela
                                </option>
                                <option value="2" <?php echo ($material['tipo_material'] == 2) ? 'selected' : ''; ?>>
                                    Botones
                                </option>
                            </select>
                        </div>

                        <!-- Color del Material -->
                        <label for="color_material" class="fw-bold" class="form-label">Color</label>
                        <div class="input-group pt-3 pb-3">
                            <select class="form-select" name="color_material" id="color_material" required>
                                <!-- Aquí puedes generar dinámicamente las opciones desde la base de datos -->
                                <option value="1" <?php echo ($material['color_material'] == 1) ? 'selected' : ''; ?>>
                                    Rojo
                                </option>
                                <option value="2" <?php echo ($material['color_material'] == 2) ? 'selected' : ''; ?>>
                                    Azul
                                </option>
                            </select>
                        </div>

                        <!-- Stock del Material -->
                        <label for="stock" class="fw-bold" class="form-label">Stock</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="number" name="stock" class="form-control" placeholder="Stock"
                                aria-label="Stock" value="<?php echo $material['stock']; ?>" required>
                        </div>

                        <!-- Precio del Material -->
                        <label for="precio" class="fw-bold" class="form-label">Precio</label>
                        <div class="input-group flex-nowrap m-2">
                            <input type="number" name="precio" class="form-control" placeholder="Precio"
                                aria-label="Precio" value="<?php echo $material['precio']; ?>" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="btnUpdate" value="edit" class="btn btn-rj-blue">Guardar Cambios
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
