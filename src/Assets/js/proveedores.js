$(document).ready(function () {
  //Actualizar tabla
  const table = $("#myTable").DataTable({
    ajax: {
      url: "index.php?page=Proveedores&function=viewAll",
      type: "GET",
      dataSrc: "",
    },
    columns: [
      {
        data: "id_proveedor",
      },
      {
        data: "nombre_proveedor",
      },
      {
        data: "rif_proveedor",
      },
      {
        data: "telefono_proveedor",
      },
      {
        data: "gmail_proveedor",
      },
      {
        data: "notas_proveedor",
      },
      {
        data: null,
        render: function (data, type, row) {
          return `<div class="d-flex">
                <button type="button" class="btn btn-custom-danger m-1 eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">
                   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
</svg>
                </button>
                <button type="button" class="btn btn-custom-success m-1 editar" data-bs-toggle="modal" data-bs-target="#editar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
</svg>
                </button>
            </div>`;
        },
      },
    ],
    responsive: true,
  });

  // AJAX
  //para crear
    // Crear nuevo proveedor
    $("#createProveedorForm").submit(function (e) {
        e.preventDefault();

        const formData = $(this).serialize();

        $.ajax({
            url: "index.php?page=proveedores&function=create",
            method: "POST",
            data: formData,
            success: function (respuesta) {
                try {
                    const data = JSON.parse(respuesta);
                    if (data.success) {
                        alertify.success('¡Proveedor registrado correctamente!');
                        $("#createProveedorForm")[0].reset();
                        $("#CrearModal").modal("hide");

                        table.ajax.reload(null, false); // Recargar la tabla
                    } else {
                        alertify.error('Error: ' + data.message);
                    }
                } catch (error) {
                    console.error("Error en la respuesta JSON:", error);
                    alertify.error("Hubo un error al procesar la solicitud.");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error: ", error);
                alertify.error("Hubo un error al procesar la solicitud.");
            },
        });
    });
});
