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
      "supervisores",
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

  function estadoPedidoProveedor($estado) {
    switch ($estado) {
      case 0:
        return "<span class='en_curso' > En Curso </span>";
      case 1:
        return "<span class='completado' > Finalizado </span>";
      default:
        return "<span class='anulado' > Anulado </span>";
    }
  }
  function estadoPedidoPrenda($estado) {
    switch ($estado) {
      case 0:
        return "<span class='no_iniciado' > No Iniciada </span>";
      case 1:
        return "<span class='en_curso' > En curso </span>";
      case 2:
        return "<span class='terminado' > Terminado </span>";
      case 3:
        return "<span class='completado' > Entregado </span>";
      default:
        return "<span class='anulado' > Anulado </span>";
    }
  }
  function estadoConfeccion($estado) {
    switch ($estado) {
      case 0:
        return "<span class='en_curso' > En Curso </span>";
      case 1:
        return "<span class='completado' > Finalizado </span>";
      default:
        return "<span class='anulado' > Anulado </span>";
    }
  }

  const columnasPorPagina = {
    almacen: [
      { data: "id_material" },
      { data: "nombre_material" },
      { data: "tipo" },
      { data: "color_name" },
      { data: "stock" },
      { data: "unidad_medida" },
      { data: null, render: () => buttons },
    ],
    confecciones: [
      { data: "id_confeccion" },
      { data: "desc_pedido" },
      { data: "fecha_fabricacion" },
      { data: "id_supervisor" },
      {
        data: null,
        render: (data, type, row) => estadoConfeccion(row.proceso),
      },
      { data: null, render: () => buttons },
    ],
    supervisores: [
      { data: "id_supervisor" },
      { data: "cedula_supervisor" },
      { data: "nombre_supervisor" },
      { data: "apellido_supervisor" },
      { data: "telefono_supervisor" },
      { data: "email_supervisor" },
      { data: "trabajando" },
      { data: null, render: () => buttons },
    ],
    pedidosPrendas: [
      { data: "id_pedido_prenda" },
      { data: "desc_pedido_prenda" },
      { data: "fecha_pedido_prenda" },
      { data: "fecha_estimada" },
      {
        data: null,
        render: (data, type, row) => estadoPedidoPrenda(row.proceso),
      },
      { data: null, render: () => buttons },
    ],
    pedidosProveedores: [
      { data: "id_pedido" },
      { data: "id_proveedor" },
      { data: "fecha_pedido" },
      { data: "id_usuario" },
      {
        data: null,
        render: (data, type, row) => estadoPedidoProveedor(row.proceso),
      },

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
    usuarios: [
      { data: "id_usuario" },
      {
        data: null,
        render: (data, type, row) =>
          `<img class="img-prenda" src="${row.img_usuario}" alt="" height="40px" width="40px">`,
      },
      { data: "nombre_usuario" },
      { data: "apellido_usuario" },
      { data: "gmail_usuario" },
      { data: "contrasena_usuario" },
      { data: "rol" },
      { data: null, render: () => buttons },
    ],
  };

  const columnasDetailsName = {
    prendas: ["Material", "Tipo", "Color", "Cantidad"],
    pedidosPrendas: ["Prenda", "Coleccion", "Talla", "Cantidad"],
    pedidosProveedores: ["Material", "Tipo", "Color", "Cantidad"],
    confecciones: ["Prenda", "Coleccion", "Talla", "Cantidad"], // Si no tiene columnas, asegúrate de no dejarlo vacío o añade columnas válidas
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
      { data: "prenda" },
      { data: "coleccion" },
      { data: "talla" },
      { data: "cantidad" },
    ],
  };

  const actionsByPage = {
    create: `index.php?page=${page}&function=create`,
    edit: `index.php?page=${page}&function=edit`,
    delete: `index.php?page=${page}&function=delete`,
    update: `index.php?page=${page}&function=update`,
    restore: `index.php?page=${page}&function=restore`,
    remove: `index.php?page=${page}&function=remove`,
    viewDetails: (id) => `index.php?page=${page}&function=viewDetails&id=${id}`,
    viewElement: (id) => `index.php?page=${page}&function=viewElement&id=${id}`,
  };

  const buttonDisabled = {
    confecciones: 1,
    pedidosPrendas: 0,
    pedidosProveedores: 1,
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
      dataSrc: "data",
      beforeSend: () =>
        console.log("Realizando petición AJAX para la tabla principal..."),
      complete: () =>
        console.log("Petición AJAX para la tabla principal completada."),
      error: (jqXHR, textStatus, errorThrown) =>
        console.error("Error en AJAX:", textStatus, errorThrown),
    },
    columns: columnas,
    responsive: true,
    drawCallback: function (settings) {
      const api = this.api();
      api.rows().every(function () {
        const row = this.node();
        const data = this.data();

        if (page === "pedidosPrendas") {
          if (data.proceso !== buttonDisabled[page]) {
            if (data.proceso == 2) {
              $(row).find(".anular").prop("disabled", true); // Deshabilitar botones
            } else {
              $(row).find(".actualizar, .anular").prop("disabled", true); // Deshabilitar botones
            }
          } else {
            $(row).find(".actualizar, .anular").prop("disabled", false); // Deshabilitar botones
          }
        } else {
          // Aquí puedes habilitar o deshabilitar los botones según el estado de los datos
          if (data.proceso === buttonDisabled[page]) {
            $(row).find(".actualizar, .anular").prop("disabled", true); // Deshabilitar botones
          } else {
            $(row).find(".actualizar, .anular").prop("disabled", false); // Deshabilitar botones
          }
        }
      });
    },
  });

  //Cabeceras de detalles
  if (pagesConfig.viewOrder.includes(page)) {
    let orderRows = columnasDetailsName[page];
    console.log("Columnas para los detalles generados");
    for (let i = 0; i < orderRows.length; i++) {
      let th = `<th scope="col">${orderRows[i]}</th>`;
      $("#orderTable thead tr").append(th);
    }
  } else {
    console.log("Esta página no necesita mostrar pedidos de tablas");
  }

  // Poner las cabeceras en la tabla de la papelera
  var spans = $("#myTable thead tr span");
  spans.each(function (index, span) {
    if ($(span).text() !== "") {
      let column = `<th scope="col">${$(span).text()}</th>`;
      $("#trashTable thead tr").append(column);
    }
  });
  console.log("Se renombraron las cabeceras de la papelera"); // Mostrar el texto de cada <span>

  const trashTable = $("#trashTable").DataTable({
    ajax: {
      url: `index.php?page=${page}&function=viewDelete`,
      type: "GET",
      dataSrc: "data",
      beforeSend: () =>
        console.log("Realizando petición AJAX para la tabla de la papelera..."),
      complete: () => console.log("Petición AJAX para la papelera completada."),
      error: (jqXHR, textStatus, errorThrown) =>
        console.error("Error en AJAX:", textStatus, errorThrown),
    },
    columns: columnas,
    responsive: true,
    createdRow: function (row, data, dataIndex) {
      let buttoms =
        '<button class="btn btn-custom-success m-1 restaurar " data-bs-toggle="modal" data-bs-target="#restaurar"><i class="fa-solid fa-sync"></i></button><button class="btn btn-custom-danger m-1 remover" data-bs-toggle="modal" data-bs-target="#remover">X</button> ';
      // Cambiar el contenido de la última columna después de que la fila se haya creado
      $("td", row).eq(-1).html(buttoms);
    },
  });

  console.log("DataTable inicializado correctamente.");

  // -------------------------------- OBJETO DE VALIDACIONES --------------------------------
  const validaciones = {
    almacen: {
      //pagina de almacen
      nombreMaterial: {
        required: true,
        regex: /^.{5,}$/,
        mensaje: "Minimo 5 caracteres",
      },
      stockMaterial: {
        required: true,
        regex: /^\d+$/,
        mensaje: "El stock debe ser un número entero válido.",
      },
      tipoMaterial: {
        required: true,
        regex: /^(?!\s*$).+/, // Asegura que se seleccione una opción distinta a la primera (vacía)
        mensaje: "Por favor, seleccione una opción",
      },
      medidaMaterial: {
        required: true,
        regex: /^(?!\s*$).+/, // Asegura que se seleccione una opción distinta a la primera (vacía)
        mensaje: "Por favor, seleccione una opción.",
      },
      colorMaterial: {
        required: true,
        regex: /^(?!\s*$).+/, // Asegura que se seleccione una opción distinta a la primera (vacía)
        mensaje: "Por favor, seleccione una opción.",
      },
    },
    supervisores: {
      //supervisores
      nameSupervisor: {
        required: true,
        regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]{3,}$/,
        mensaje: "El nombre debe tener minimo 3 caracteres y solo letras.",
      },
      apellidoSupervisor: {
        required: true,
        regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑüÜ\s]{3,}$/,
        mensaje: "El apellido debe tener minimo 3 caracteres y solo letras.",
      },
      cedulaSupervisor: {
        required: true,
        regex: /^[A-Za-z0-9]{1,3}[-\s]?[0-9]{3,4}[-\s]?[0-9]{3,4}$/,
        mensaje: "Documento inválido",
      },
      emailSupervisor: {
        required: true,
        regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        mensaje:
          "Correo electrónico debe tener NombreUsuario@(gmail,hotmail u otros).(com,net u otros)",
      },
      telefonoSupervisor: {
        required: true,
        regex:
          /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
        mensaje:
          "Número telefónico solo numeros separado opcionalmente por guiones o espacios (con o sin codigo de pais)",
      },
    },
    proveedores: {
      //proveedores
      nombreProveedor: {
        required: true,
        regex: /^.{5,}$/,
        mensaje: "Minimo 5 caracteres",
      },
      telefonoProveedor: {
        required: true,
        regex:
          /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
        mensaje:
          "Número telefónico solo numeros separado opcionalmente por guiones o espacios (con o sin codigo de pais)",
      },
      rifProveedor: {
        required: true,
        regex: /^[VEJGPvejgp]-\d{9}$/,
        mensaje:
          "RIF debe comenzar con V, E, J, G o P , seguido de un - y tener 9 dígitos.",
      },
      emailProveedor: {
        required: true,
        regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        mensaje:
          "Correo electrónico debe tener NombreUsuario@(gmail,hotmail u otros).(com,net u otros)",
      },
    },
    usuarios: {
      //usuarios
      nombreUsuario: {
        required: true,
        regex: /^[a-zA-Z\s]{3,}$/,
        mensaje: "El nombre debe tener minimo 3 caracteres y solo letras.",
      },
      apellidoUsuario: {
        required: true,
        regex: /^[a-zA-Z\s]{3,}$/,
        mensaje: "El apellido debe tener minimo 3 caracteres y solo letras.",
      },
      passwordUsuario: {
        required: true,
        regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/,
        mensaje:
          "La contraseña debe tener al menos 8 caracteres, incluir mayúsculas, minúsculas y números.",
      },
      emailUsuario: {
        required: true,
        regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
        mensaje:
          "Correo electrónico debe tener NombreUsuario@(gmail,hotmail u otros).(com,net u otros)",
      },
      rolUsuario: {
        required: true,
        mensaje: "Por favor, seleccione un rol.",
      },
    },
    confecciones: {
      pedidos: {
        required: true,
        regex: /^(?!\s*$).+$/, // Asegura que se seleccione una opción distinta a la primera (vacía)
        mensaje: "Por favor, seleccione una opción.",
      },
    },
  };

  // Función de validación general
  function validarFormulario(page, formSelector) {
    const campos = validaciones[page]; //busca las validaciones segun la pagina actual
    if (!campos) return true; // Si no hay validaciones para la página, pasar automáticamente

    let esValido = true;

    // Recorrer cada campo y validar
    for (const [campo, reglas] of Object.entries(campos)) {
      //buscamos dentro del objeto con el nombre de la pagina actual
      const input = $(formSelector).find("." + campo); //busacamos el name del campo
      const valor = input.val(); //verificamos el valor del campo
      const errorSpan = input.next(".error-span"); //span de error

      // Crear el span de error si no existe
      if (
        errorSpan.length === 0 &&
        campo !== "rolUsuario" &&
        campo !== "TipoMaterial" &&
        campo !== "medidaMaterial" &&
        campo !== "colorMaterial" &&
        campo !== "pedidos"
      ) {
        input.after(`<span class="error-span text-danger"></span>`);
      }

      // Validación para campos requeridos
      if (reglas.required) {
        if (campo === "rolUsuario") {
          // Si el campo es del tipo radio
          // Verifica si al menos uno de los radios con el nombre 'rol_usuario' está seleccionado
          if (!$(`.${campo}:checked`).length) {
            // Mostrar el mensaje de error en el span adecuado
            $(".errorRol").text(reglas.mensaje);
            esValido = false;
          } else {
            $(".errorRol").text("");
          }
        } else if (campo === "pedidos") {
          if (valor === "") {
            // Mostrar el mensaje de error en el span adecuado
            $(".errorPedidos").text(reglas.mensaje);
            esValido = false;
          } else {
            $(".errorPedidos").text("");
          }
        } else if (campo === "tipoMaterial") {
          if (valor === "") {
            // Mostrar el mensaje de error en el span adecuado
            $(".errorTipoMaterial").text(reglas.mensaje);
            esValido = false;
          } else {
            $(".errorTipoMaterial").text("");
          }
        } else if (campo === "colorMaterial") {
          if (valor === "") {
            // Mostrar el mensaje de error en el span adecuado
            $(".errorColorMaterial").text(reglas.mensaje);
            esValido = false;
          } else {
            $(".errorColorMaterial").text("");
          }
        } else if (campo === "medidaMaterial") {
          if (valor === "") {
            // Mostrar el mensaje de error en el span adecuado
            $(".errorMedidaMaterial").text(reglas.mensaje);
            esValido = false;
          } else {
            $(".errorMedidaMaterial").text("");
          }
        } else if (valor === "" || valor === null) {
          // Para otros campos
          input.next(".error-span").text(`Rellene este campo.`);
          esValido = false;
          console.log(campo);
        }
        // Validación para el regex (si existe)
        else if (reglas.regex && !reglas.regex.test(valor)) {
          input.next(".error-span").text(reglas.mensaje);
          esValido = false;
        }
        // Si es válido, limpiar el mensaje de error
        else {
          input.next(".error-span").text("");
        }
      }
    }

    return esValido;
  }

  // -------------------------------- FUNCIONES REUTILIZABLES --------------------------------
  function handleAction(action, formSelector, modalSelector, successMessage) {
    $(formSelector).submit(function (e) {
      e.preventDefault();

      if (action === "create") {
        //sola mente valida el action es create
        // Validar formulario antes de enviar
        if (!validarFormulario(page, formSelector)) {
          console.warn("El formulario contiene errores, no se enviará.");
          return;
        }
      }

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
              $(this)[0].reset();
              $(modalSelector).modal("hide");
              table.ajax.reload(null, false);
              trashTable.ajax.reload(null, false);
            } else {
              console.warn(
                "Error en la respuesta:",
                data.message || "Mensaje no definido"
              );
              alertify.error(data.message || "Error desconocido");
            }
          } catch (err) {
            console.error("Error procesando respuesta JSON:", err);
            alertify.error("Ocurrió un error al procesar la respuesta.");
          }
        },
        error: (jqXHR, textStatus, errorThrown) => {
          console.error("Error en AJAX:", textStatus, errorThrown);
          alertify.error("Ocurrió un error al enviar la solicitud.");
        },
      });
    });
  }

  // -------------------------------- CREAR --------------------------------
  $(document).on("click", ".crear", function () {
    console.log(`Preparando para crear un nuevo elemento`);
  });
  handleAction("create", "#createForm", "#crear", "Elemento Creado");

  // -------------------------------- EDITAR --------------------------------
  handleAction("edit", "#editForm", "#editar", "Elemento Editado");  

  // -------------------------------- ELIMINAR --------------------------------
  $(document).on("click", ".eliminar", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para eliminar el elemento con ID: ${id}`);
    $("#eliminarId").val(id);
  });
  handleAction("delete", "#deleteForm", "#eliminar", "Elemento Eliminado");

  // -------------------------------- ANULAR --------------------------------
  $(document).on("click", ".anular", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para anular el elemento con ID: ${id}`);
    $("#idAnular").val(id);
  });
  handleAction("delete", "#anuleForm", "#anular", "Elemento Anulado");

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
        dataSrc: "data",
      },
      columns: columnasDetail[page],
      responsive: true,
    });
  });

  // -------------------------------- RESTAURAR --------------------------------
  $(document).on("click", ".restaurar", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para restaurar el elemento con ID: ${id}`);
    $("#idRestaurar").val(id);
  });
  handleAction("restore", "#restoreForm", "#restaurar", "Elemento Restaurado");

  // -------------------------------- REMOVER --------------------------------
  $(document).on("click", ".remover", function () {
    const id = $(this).closest("tr").find("td:first").text();
    console.log(`Preparando para restaurar el elemento con ID: ${id}`);
    $("#idRemover").val(id);
  });
  handleAction("remove", "#removeForm", "#remover", "Elemento Removido");

  // -------------------------------- VISUALIZAR ElEMENTO --------------------------------
  $(document).on("click", ".editar", function () {
    const id = $(this).closest("tr").find("td:first").text();
    const modalSelector = "#editar";
  
    console.log(`ID del elemento a editar: ${id}`);
  
    $.ajax({
      url: actionsByPage.viewElement(id),
      method: "GET",
      success: (respuesta) => {
        try {
          console.log(`Respuesta recibida del servidor: ${respuesta}`);
  
          const data = JSON.parse(respuesta);
          if (data.success) {
            console.log(`Datos procesados correctamente:`, data);
  
            // Extraemos el primer elemento del array `data`
            const item = data.data[0];
  
            // Iterar por cada campo del formulario con `data-field`
            $(modalSelector).find("[data-field]").each(function () {
              const field = $(this).data("field");
              if (item[field] !== undefined) {
                if ($(this).is(":radio")) {
                  // Manejo especial para radios
                  if ($(this).val() == item[field]) {
                    $(this).prop("checked", true);
                  }
                } else {
                  // Campos normales y ocultos
                  console.log(`Rellenando campo [data-field="${field}"] con valor: ${item[field]}`);
                  $(this).val(item[field]);
                }
              } else {
                console.warn(`No se encontró el campo "${field}" en los datos recibidos.`);
              }
            });
  
          } else {
            console.warn(`Error en la respuesta del servidor: ${data.message || "Mensaje no definido"}`);
            alertify.error(data.message || "Error desconocido");
          }
        } catch (err) {
          console.error(`Error al procesar la respuesta JSON:`, err);
          alertify.error("Ocurrió un error al procesar la respuesta.");
        }
      },
      error: (jqXHR, textStatus, errorThrown) => {
        console.error(`Error en AJAX:`, {
          textStatus: textStatus,
          errorThrown: errorThrown,
          responseText: jqXHR.responseText,
        });
        alertify.error("Ocurrió un error al enviar la solicitud.");
      },
    });
  });

  console.log("Configuración completada.");
  
});
