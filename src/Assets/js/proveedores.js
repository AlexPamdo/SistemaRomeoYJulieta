$(document).ready(function () {
  //Actualizar tabla
  //Este codigo es para que la tabla se actualize mediante dataTable
  const table = $("#myTable").DataTable({ //seleccionamos la tabla
    ajax: { //realizamos la peticion ajax
      url: "index.php?page=Proveedores&function=viewAll", //esto es practicamente como el action, solo cambia el nombre de "page"
      type: "GET",
      dataSrc: "",
    },
    columns: [ //estas sera las columnas, toma las mismas que las de las base de dates
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
        data: null, //esto es para que la ultima columna tenga los botones
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
    e.preventDefault(); //evitamos que el formulario se mande

    const formData = $(this).serialize(); //serializar sirve para tomar todos los elementos del formulario (inputs, selects, textareas, etc.) y los convierte en una cadena de texto en el formato key=value (similar a cómo se verían los parámetros en una URL, como nombre=Juan&edad=30).

    $.ajax({ //hacemos la peticion ajax
      url: "index.php?page=proveedores&function=create", //usamos la funcion de crear
      method: "POST",
      data: formData, //aplicamos la variable formData donde estan los datos del formulario
      success: function (respuesta) {
        try {
          const data = JSON.parse(respuesta); //parseamos lo que sea que devolvio la peticion, en este caso un mensaje de exito o error
          if (data.success) { //si debolvio "succes"
            alertify.success("¡Proveedor registrado correctamente!"); //mostramos la notification con alertify
            $("#createProveedorForm")[0].reset(); //resetamos el formulario
            $("#CrearModal").modal("hide"); //cerramos el modal

            table.ajax.reload(null, false); // Recargar la tabla
          } else {
            alertify.error("Error: " + data.message);
          }
        } catch (error) { //en caso de que la peticion falle
          console.error("Error en la respuesta JSON:", error);
          alertify.error("Hubo un error al procesar la solicitud.");
        }
      },
      error: function (xhr, status, error) { //esto es en caso de que la solicidtud no se pueda hacer
        console.error("Error: ", error);
        alertify.error("Hubo un error al procesar la solicitud.");
      },
    });
  });
});
