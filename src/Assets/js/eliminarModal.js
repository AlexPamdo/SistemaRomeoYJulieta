$(document).ready(function () {
  // ------------------------------------------ACTUALIZAR TABLAS MEDIANTE AJAX Y DATATABLE --------------------------------
  // Obtener el parámetro 'page' de la URL
  const urlParams = new URLSearchParams(window.location.search);
  const page = urlParams.get("page");

  if (!page) {
    console.error("No se encontró el parámetro 'page' en la URL.");
    return;
  }

  console.log("Página actual:", page);

  // Generación de botones
  const pages = {
    // Páginas con botones de editar y eliminar
    editAndDelete: [
      "almacen",
      "empleados",
      "prendas",
      "proveedores",
      "usuarios",
    ],
    // Páginas con botones de actualizar y anular
    anuleAndUpdate: ["confecciones", "pedidosPrendas", "pedidosProveedores"],
    // Páginas con botón para visualizar
    viewOrder: [
      "confecciones",
      "pedidosPrendas",
      "pedidosProveedores",
      "prendas",
    ],
  };

  let buttons = `<div class="d-flex">`; // Variable para almacenar los botones generados
  let infoButton = ""; // Variable para almacenar que botones se generaron

  $.each(pages, function (key, tipoBotones) {
    // Verificamos si la página actual está incluida en el array de la categoría
    if (tipoBotones.includes(page)) {
      switch (key) {
        case "editAndDelete":
          buttons += `
          <button class="btn btn-custom-danger m-1 eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
            </svg>
          </button>
          <button class="btn btn-custom-success m-1 editar" data-bs-toggle="modal" data-bs-target="#editar">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
              <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.5.5 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11z"/>
            </svg>
          </button>
       `;
          infoButton += "-Editar y eliminar-";
          break;

        case "anuleAndUpdate":
          buttons += `
          <button type="button" class="btn btn-custom-danger m-1 anular"
              data-bs-toggle="modal" data-bs-target="#anular">
             <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
  <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
</svg>
          </button>

          <button type="button" class="btn btn-custom-success m-1 actualizar"
              data-bs-toggle="modal" data-bs-target="#actualizar">
              <i class="fa-solid fa-sync"></i>
          </button>
       `;
          infoButton += "-Anular y actualizar-";

          break;

        case "viewOrder":
          buttons += `<button type="button" class="btn btn-warning m-1 verOrden" data-bs-toggle="modal"
                        data-bs-target="#orden">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
</svg>
                       </button>`;
          infoButton += "-Ver orden-";

          break;
      }
    }
  });

  buttons += `</div>`;

  console.log("Botones generados:", infoButton);

  // Configuración de columnas por página
  const columnasPorPagina = {
    almacen: [
      { data: "id_material" },
      { data: "nombre_material" },
      { data: "tipo_material" },
      { data: "color_material" },
      { data: "stock" },
      { data: "unidad_medida" },
      { data: null, render: () => buttons },
    ],
    confecciones: [
      { data: "id_confeccion" },
      { data: "id_prenda" },
      { data: "cantidad" },
      { data: "fecha_fabricacion" },
      { data: "id_empleado" },
      { data: "proceso" },
      { data: null, render: () => buttons },
    ],
    empleados: [
      { data: "id_empleado" },
      { data: "cedula_empleado" },
      { data: "nombre_empleado" },
      { data: "apellido_empleado" },
      { data: "telefono_empleado" },
      { data: "email_empleado" },
      { data: "id_ocupacion" },
      { data: "ocupado" },
      { data: null, render: () => buttons },
    ],
    pedidosPrendas: [
      { data: "id_pedido_prenda" },
      { data: "desc_pedido_prenda" },
      { data: "fecha_pedido_prenda" },
      { data: "fecha_estimada" },
      { data: "proceso" },
      { data: null, render: () => buttons },
    ],
    pedidosProveedores: [
      { data: "id_pedido" },
      { data: "id_proveedor" },
      { data: "fecha_pedido" },
      { data: "id_usuario" },
      { data: "estado_pedido" },
      { data: null, render: () => buttons },
    ],
    prendas: [
      { data: "id_prenda" },
      {
        data: null,
        render: (data, type, row) =>
          `<img class="img-prenda" src="${row.img_prenda}" alt="" height="40px" width="40px">`,
      },
      { data: "nombre_prenda" },
      { data: "categoria" },
      { data: "stock" },
      { data: "coleccion" },
      { data: "talla" },
      { data: "genero" },

      { data: null, render: () => buttons },
    ],
    proveedores: [
      { data: "id_proveedor" },
      { data: "nombre_proveedor" },
      { data: "rif_proveedor" },
      { data: "telefono_proveedor" },
      { data: "gmail_proveedor" },
      { data: "notas_proveedor" },
      { data: null, render: () => buttons },
    ],
    usuario: [
      { data: "id_usuario" },
      { data: "nombre_usuario" },
      { data: "apellido_usuario" },
      { data: "gmail_usuario" },
      { data: "contraseña_usuario" },
      { data: "rol" },
      { data: "img_usuario" },
      { data: null, render: () => buttons },
    ],
  };

  // Verificar si la página tiene columnas configuradas
  const columnas = columnasPorPagina[page];
  if (!columnas) {
    console.warn("Página no reconocida:", page);
    return;
  }

  // Inicializar DataTable
  const table = $("#myTable").DataTable({
    ajax: {
      url: `index.php?page=${page}&function=viewAll`,
      type: "GET",
      dataSrc: "",
      beforeSend: () => console.log("Haciendo petición AJAX..."),
      complete: (jqXHR, textStatus) =>
        console.log("AJAX completado:", textStatus),
      error: (jqXHR, textStatus, errorThrown) =>
        console.error("Error en AJAX:", textStatus, errorThrown),
    },
    columns: columnas,
    responsive: true,
  });

  // ------------------------------------------ELIMINAR MEDIANTE AJAX --------------------------------
  // ----------------------- Enviar Datos al modal de eliminar -----------------------
  $(document).on("click", ".eliminar", function () {
    var parentRow = $(this).closest("tr");
    var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

    // Verifica si el ID se obtiene correctamente
    console.log("------------------- FUNCION ELIMINAR --------------------");
    console.log("ID obtenido:", id);
    $("#eliminarId").val(id); // Asigna ese id al atributo value de #eliminarId
  });

  //---------------Funcion para obtener info de pagina para generar el action
  function deleteActionPage() {
    // Obtiene la URL actual
    const url = new URL(window.location.href);

    // Extrae el parámetro 'page' de la URL
    var page = url.searchParams.get("page"); // Cambia 'nombreDelParametro' por el nombre que buscas

    // Verifica si el parámetro 'page' se obtiene correctamente
    console.log("Página obtenida:", page);

    // Asegúrate de que 'page' no sea null y retornar la URL correctamente
    if (page !== null) {
      return "index.php?page=" + page + "&function=delete";
    } else {
      console.error("El parámetro 'page' no se encontró en la URL.");
      return null;
    }
  }

  // Verificación adicional para asegurar que la URL de acción se obtiene correctamente
  if (deleteActionPage() !== null) {
    console.log("Action a usar: " + deleteActionPage());
  } else {
    console.error("No se pudo generar la URL de acción.");
  }

  $("#deleteForm").submit(function (e) {
    e.preventDefault(); // evitamos que el formulario se mande

    console.log(
      "------------------- SOLICITUD AJAX PARA ELIMINAR --------------------"
    );
    console.log("Action a usar: " + deleteActionPage());

    const formData = $(this).serialize(); // Serializa los datos del formulario

    // Verificación antes de realizar la solicitud AJAX
    if (deleteActionPage() === null) {
      alertify.error("No se pudo generar la URL de acción.");
      return; // Detener la ejecución si no se pudo obtener la URL de acción
    }

    $.ajax({
      //hacemos la petición AJAX
      url: deleteActionPage(), // usamos la URL generada
      method: "POST",
      data: formData, // aplicamos la variable formData donde están los datos del formulario
      success: function (respuesta) {
        try {
          console.log("Respuesta obtenida:", respuesta);
          const data = JSON.parse(respuesta); // parseamos lo que sea que devolvió la petición, en este caso un mensaje de éxito o error

          if (data && data.success) {
            // Verificación adicional para asegurar que `data` tenga la propiedad `success`
            alertify.success("Elemento Eliminado"); // mostramos la notificación con alertify
            $("#eliminar").modal("hide"); // cerramos el modal

            table.ajax.reload(null, false); // Recargamos la tabla sin resetear la paginación
          } else {
            alertify.error("Error: " + (data.message || "Mensaje no definido"));
          }
        } catch (error) {
          // en caso de que la petición falle
          console.error("Error en la respuesta JSON:", error);
          alertify.error("Hubo un error al procesar la solicitud.");
        }
      },
      error: function (xhr, status, error) {
        // Esto es en caso de que la solicitud no se pueda hacer
        console.error("Error: ", error);
        alertify.error("Hubo un error al procesar la solicitud.");
      },
    });
  });


   // ------------------------------------------ACTUALIZAR MEDIANTE AJAX --------------------------------
  // ----------------------- Enviar Datos al modal de actualizar -----------------------
  $(document).on("click", ".actualizar", function () {
    var parentRow = $(this).closest("tr");
    var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

    // Verifica si el ID se obtiene correctamente
    console.log("------------------- FUNCION ELIMINAR --------------------");
    console.log("ID obtenido:", id);
    $("#idActualizar").val(id);
  });

  //---------------Funcion para obtener info de pagina para generar el action
  function updateActionPage() {
    // Asegúrate de que 'page' no sea null y retornar la URL correctamente
    if (page !== null) {
      return "index.php?page=" + page + "&function=update";
    } else {
      console.error("El parámetro 'page' no se encontró en la URL.");
      return null;
    }
  }

  // Verificación adicional para asegurar que la URL de acción se obtiene correctamente
  if (deleteActionPage() !== null) {
    console.log("Action a usar: " + deleteActionPage());
  } else {
    console.error("No se pudo generar la URL de acción.");
  }

  $("#updateForm").submit(function (e) {
    e.preventDefault(); // evitamos que el formulario se mande

    console.log(
      "------------------- SOLICITUD AJAX PARA ACTUALIZAR --------------------"
    );
    console.log("Action a usar: " + updateActionPage());

    const formData = $(this).serialize(); // Serializa los datos del formulario

    // Verificación antes de realizar la solicitud AJAX
    if (updateActionPage() === null) {
      alertify.error("No se pudo generar la URL de acción.");
      return; // Detener la ejecución si no se pudo obtener la URL de acción
    }

    $.ajax({
      //hacemos la petición AJAX
      url: updateActionPage(), // usamos la URL generada
      method: "POST",
      data: formData, // aplicamos la variable formData donde están los datos del formulario
      success: function (respuesta) {
        try {
          console.log("Respuesta obtenida:", respuesta);
          const data = JSON.parse(respuesta); // parseamos lo que sea que devolvió la petición, en este caso un mensaje de éxito o error

          if (data && data.success) {
            // Verificación adicional para asegurar que `data` tenga la propiedad `success`
            alertify.success("Elemento Actualizado"); // mostramos la notificación con alertify
            $("#actualizar").modal("hide"); // cerramos el modal

            table.ajax.reload(null, false); // Recargamos la tabla sin resetear la paginación
          } else {
            alertify.error("Error: " + (data.message || "Mensaje no definido"));
          }
        } catch (error) {
          // en caso de que la petición falle
          console.error("Error en la respuesta JSON:", error);
          alertify.error("Hubo un error al procesar la solicitud.");
        }
      },
      error: function (xhr, status, error) {
        // Esto es en caso de que la solicitud no se pueda hacer
        console.error("Error: ", error);
        alertify.error("Hubo un error al procesar la solicitud.");
      },
    });
  });


  // ----------------------- Enviar Datos al modal de editar -----------------------
  $(".editar").click(function () {
    // Identificamos en qué página estamos para saber qué parámetros tomar
    const url = new URL(window.location.href);
    const page = url.searchParams.get("page");
    console.log("La página actual es " + page);

    const parentRow = $(this).closest("tr");
    const id = parentRow.find("td:first").text();

    // Configuración de mapeo de campos para cada página
    const config = {
      usuarios: {
        fields: {
          nombre: "td.nombreUsuario",
          apellido: "td.apellidoUsuario",
          email: "td.emailUsuario",
          password: "td.passwordUsuario div input",
          rol: () =>
            parentRow.find("td.rolUsuario").text().trim() === "admin" ? 1 : 2,
        },
        inputs: {
          nombre: "#nameUser_edit",
          apellido: "#apellidoUser_edit",
          email: "#gmail_usuario_edit",
          password: "#password_create_edit",
        },
      },
      almacen: {
        fields: {
          desc: "td.desc",
          tipo: "input.tipo",
          color: "input.color",
          stock: "td.stock",
          precio: function () {
            return parentRow
              .find("td.precio")
              .clone()
              .children()
              .remove()
              .end()
              .text()
              .trim();
          },
        },
        inputs: {
          desc: "#desc_edit",
          tipo: "#tipo_edit",
          color: "#color_edit",
          stock: "#stock_edit",
          precio: "#precio_edit",
        },
      },
      proveedores: {
        fields: {
          nombre: "td.nombre",
          rif: "td.rif",
          telefono: "td.telefono",
          correo: "td.correo",
          notas: "td.notas",
        },
        inputs: {
          nombre: "#nombre_edit",
          rif: "#rif_edit",
          telefono: "#telefono_edit",
          correo: "#correo_edit",
          notas: "#notas_edit",
        },
      },
      empleados: {
        fields: {
          nombre: "td.nombre",
          apellido: "td.apellido",
          email: "td.email",
          telefono: "td.telefono",
          ocupacion: "input.ocupacion",
          cedula: "td.cedula",
        },
        inputs: {
          nombre: "#nombre_edit",
          apellido: "#apellido_edit",
          email: "#email_edit",
          telefono: "#telefono_edit",
          ocupacion: "#ocupacion_edit",
          cedula: "#cedula_edit",
        },
      },
      prendas: {
        fields: {
          desc: "input.img",
          desc: "td.desc",
          categoria: "input.categoria",
          talla: "input.talla",
          coleccion: "input.coleccion",
          cantidad: "td.cantidad",
          genero: "input.genero",
        },
        inputs: {
          desc: "#img_edit",
          desc: "#desc_edit",
          categoria: "#categoria_edit",
          talla: "#talla_edit",
          coleccion: "#coleccion_edit",
          cantidad: "#cantidad_edit",
          genero: "#genero_edit",
        },
      },
    };

    const pageConfig = config[page];
    if (!pageConfig) return;

    const data = {};
    for (const [key, selectorOrFn] of Object.entries(pageConfig.fields)) {
      data[key] =
        typeof selectorOrFn === "function"
          ? selectorOrFn()
          : parentRow.find(selectorOrFn).text() ||
            parentRow.find(selectorOrFn).val();
    }

    console.log(data);

    // Aplica los valores a los inputs
    $("#id_edit").val(id);
    for (const [key, selector] of Object.entries(pageConfig.inputs)) {
      $(selector).val(data[key] || "");
    }

    // Seleccionar el radio button basado en el rol
    $("input[name='rol_usuario'][value='" + data.rol + "']").prop(
      "checked",
      true
    );
    $("input[name='id_genero_edit'][value='" + data.genero + "']").prop(
      "checked",
      true
    );
  });

  // ----------------------------------------- VISUALIZAR UNA ORDEN MEDIANTE AJAX --------------------------------
  console.log(
    "------------------- FUNCION PARA CAMBIAR LAS CABECERAS DE LA ORDEN --------------------"
  );

  //Estos son los TH para las tablas de las vistas
  const theads = {
    prendas: ["Descripcion", "Tipo", "Color", "Cantidad"],
    pedidosPrendas: ["Prenda", "Coleccion", "Talla", "Cantidad"],
    pedidosProveedores: ["Descripcion", "Tipo", "Cantidad", "Stock"],
    confecciones: [], // Si no tiene columnas, asegúrate de no dejarlo vacío o añade columnas válidas
  };

  //Esto es para las columnas de dataTable
  const columnsOrderName = {
    prendas: ["material", "tipo", "color", "cantidad"],
    pedidosPrendas: ["id_prenda", "coleccion", "talla", "cantidad_prenda"],
    pedidosProveedores: ["material", "tipo", "color", "cantidad_material"],
    confecciones: [], // Si no tiene columnas, asegúrate de no dejarlo vacío o añade columnas válidas
  }

  let columnOrder = []; // Declaramos la variable de manera global fuera de la función

  if (page && theads[page]) {
    // Limpiar las cabeceras previas de #orderTable antes de agregar nuevas
    $("#orderTable thead tr").empty();

    console.log("Cabeceras añadidas para la página:", page);

    // Agregar las nuevas cabeceras y preparar el arreglo de columnas
    theads[page].forEach(function (columnName) {
      let th = `<th scope="col">${columnName}</th>`;
      $("#orderTable thead tr").append(th); // Añadir a la fila del <thead>
    });

    // Añadir los nombres de las columnas al arreglo de columnas  
    columnsOrderName[page].forEach(function (columnName) {
      columnOrder.push({ data: columnName }); // Añadir la columna al arreglo de columnas
    })

  } else {
    console.warn("No se encontraron cabeceras para esta página:", page);
  }

  $(document).on("click", ".verOrden", function () {
    console.log(
      "------------------- FUNCION VISUALIZAR ORDEN --------------------"
    );

    var parentRow = $(this).closest("tr");
    var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila
    console.log("ID obtenido:", id);

    // Inicializar o reiniciar DataTable con las nuevas cabeceras
    $("#orderTable").DataTable().destroy(); // Destruir el DataTable previo para reiniciarlo

    $("#orderTable").DataTable({
      ajax: {
        url: `index.php?page=${page}&function=viewDetails&id=${id}`,
        type: "GET",
        dataSrc: "",
        beforeSend: () => console.log("Haciendo petición AJAX..."),
        complete: (jqXHR, textStatus) =>
          console.log("AJAX completado:", textStatus),
        error: (jqXHR, textStatus, errorThrown) =>
          console.error("Error en AJAX:", textStatus, errorThrown),
      },
      columns: columnOrder, // Pasamos el arreglo de columnas al DataTable
      responsive: true,
    });
  });
  /* // ----------------------------------------- VISUALIZAR UNA ORDEN MEDIANTE AJAX --------------------------------
   $(document).on("click", ".verOrden", function () {
    var parentRow = $(this).closest("tr");
    var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

    // Verifica si el ID se obtiene correctamente
    console.log(
      "------------------- FUNCION VISUALIZAR ORDEN --------------------"
    );
    console.log("ID obtenido:", id);

    // Seleccionar todos los <span> dentro de las filas del thead
    var spans = $("#myTable thead tr span");

    // Mostrar los <span> obtenidos
    spans.each(function (index, span) {
      if ($(span).text() !== "") {
        let column = `<th scope="col">${$(span).text()}</th>`;

        console.log("Span en la fila " + index + ": ", $(span).text()); // Mostrar el texto de cada <span>
        $("#orderTable thead tr").append(column);
      }
    });
  }); */
});
