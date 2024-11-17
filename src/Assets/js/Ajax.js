$(document).ready(function () {
  // -------------------------------- CONFIGURACIÓN INICIAL --------------------------------
  console.log("Iniciando configuración inicial...");
  const urlParams = new URLSearchParams(window.location.search);
  const page = urlParams.get("page");

  if (!page) {
    console.error("ERROR: No se encontró el parámetro 'page' en la URL.");
    return;
  }
  console.log(`Página actual detectada: ${page}`);

  const pagesConfig = {
    editAndDelete: [
      "almacen",
      "empleados",
      "prendas",
      "proveedores",
      "usuarios",
    ],
    anuleAndUpdate: ["confecciones", "pedidosPrendas", "pedidosProveedores"],
    viewOrder: [
      "confecciones",
      "pedidosPrendas",
      "pedidosProveedores",
      "prendas",
    ],
  };

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

  const columnasDetail = {
    prendas: [
      { data: "material" },
      { data: "tipo" },
      { data: "color" },
      { data: "cantidad" },
    ],
    pedidosPrendas: [
      { data: "id_prenda" },
      { data: "coleccion" },
      { data: "talla" },
      { data: "cantidad_prenda" },
    ],
    pedidosProveedores: [
      { data: "material" },
      { data: "tipo" },
      { data: "color" },
      { data: "cantidad_material" },
    ],
    confecciones: [
      // Ejemplo de columnas válidas (si se conocen)
      { data: "id_confeccion" },
      { data: "nombre_proceso" },
      { data: "estado" },
      { data: "fecha_inicio" },
      { data: "fecha_fin" },
    ],
  };

  const actionsByPage = {
    delete: `index.php?page=${page}&function=delete`,
    update: `index.php?page=${page}&function=update`,
    viewDetails: (id) => `index.php?page=${page}&function=viewDetails&id=${id}`,
  };

  // -------------------------------- GENERACIÓN DE BOTONES --------------------------------
  console.log("Generando botones para la página...");
  const buttonsHTML = {
    editAndDelete: `
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
      `,
    anuleAndUpdate: `
        <button class="btn btn-custom-danger m-1 anular" data-bs-toggle="modal" data-bs-target="#anular">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-ban" viewBox="0 0 16 16">
            <path d="M15 8a6.97 6.97 0 0 0-1.71-4.584l-9.874 9.875A7 7 0 0 0 15 8M2.71 12.584l9.874-9.875a7 7 0 0 0-9.874 9.874ZM16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0"/>
        </svg>
        </button>
        <button class="btn btn-custom-success m-1 actualizar" data-bs-toggle="modal" data-bs-target="#actualizar">
          <i class="fa-solid fa-sync"></i>
        </button>
      `,
    viewOrder: `
        <button class="btn btn-warning m-1 verOrden" data-bs-toggle="modal" data-bs-target="#orden">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
            </svg>
        </button>
      `,
  };

  function generateButtons(page) {
    let buttons = `<div class="d-flex">`;
    for (const [key, pages] of Object.entries(pagesConfig)) {
      if (pages.includes(page)) {
        console.log(`Añadiendo botones para la categoría: ${key}`);
        buttons += buttonsHTML[key];
      }
    }
    buttons += `</div>`;
    return buttons;
  }

  const buttons = generateButtons(page);
  console.log("Botones generados correctamente.");

  // -------------------------------- INICIALIZAR DATATABLE --------------------------------
  console.log("Inicializando DataTable...");
  const columnas = columnasPorPagina[page];
  if (!columnas) {
    console.error(
      `ERROR: Configuración de columnas no encontrada para la página '${page}'.`
    );
    return;
  }

  const table = $("#myTable").DataTable({
    ajax: {
      url: `index.php?page=${page}&function=viewAll`,
      type: "GET",
      dataSrc: "",
      beforeSend: () => console.log("Realizando petición AJAX..."),
      complete: () => console.log("Petición AJAX completada."),
      error: (jqXHR, textStatus, errorThrown) =>
        console.error("Error en AJAX:", textStatus, errorThrown),
    },
    columns: columnas,
    responsive: true,
  });
  console.log("DataTable inicializado correctamente.");

  // -------------------------------- FUNCIONES REUTILIZABLES --------------------------------
  function handleAction(action, formSelector, modalSelector, successMessage) {
    $(formSelector).submit(function (e) {
      e.preventDefault();
      console.log(`Enviando solicitud AJAX para acción: ${action}`);
      $.ajax({
        url: actionsByPage[action],
        method: "POST",
        data: $(this).serialize(),
        success: (respuesta) => {
          try {
            const data = JSON.parse(respuesta);
            if (data.success) {
              console.log("Solicitud completada con éxito:", data);
              alertify.success(successMessage);
              $(modalSelector).modal("hide");
              table.ajax.reload(null, false);
            } else {
              console.warn(
                "Error en la respuesta:",
                data.message || "Mensaje no definido"
              );
              alertify.error(data.message || "Error desconocido");
            }
          } catch (err) {
            console.error("Error procesando respuesta JSON:", err);
            alertify.error("Hubo un error al procesar la solicitud.");
          }
        },
        error: (xhr, status, error) => {
          console.error("Error en la solicitud AJAX:", error);
          alertify.error("Hubo un error al procesar la solicitud.");
        },
      });
    });
  }

  // -------------------------------- ELIMINAR --------------------------------
  $(document).on("click", ".eliminar", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para eliminar el elemento con ID: ${id}`);
    $("#eliminarId").val(id);
  });
  handleAction("delete", "#deleteForm", "#eliminar", "Elemento Eliminado");

  // -------------------------------- ACTUALIZAR --------------------------------
  $(document).on("click", ".actualizar", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para actualizar el elemento con ID: ${id}`);
    $("#idActualizar").val(id);
  });
  handleAction("update", "#updateForm", "#actualizar", "Elemento Actualizado");

  // -------------------------------- VISUALIZAR ORDEN --------------------------------
  $(document).on("click", ".verOrden", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para visualizar la orden con ID: ${id}`);
    $("#orderTable").DataTable().destroy();
    $("#orderTable").DataTable({
      ajax: {
        url: actionsByPage.viewDetails(id),
        type: "GET",
        dataSrc: "",
      },
      columns: columnasDetail[page],
      responsive: true,
    });
  });

  console.log("Configuración completada.");
});
