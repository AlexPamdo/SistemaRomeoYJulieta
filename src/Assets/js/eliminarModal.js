// ----------------------- Enviar Datos al modal de eliminar -----------------------
console.log("eliminar js cargado");
$(".eliminar").click(function () {
  var parentRow = $(this).closest("tr");
  var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

  // Verifica si el ID se obtiene correctamente
  console.log("ID obtenido:", id);
  $("#eliminarId").val(id); // Asigna ese id al atributo value de #eliminarId

  // Obtiene la URL actual
  const url = new URL(window.location.href);

  // Extrae parámetros de la URL
  var page = url.searchParams.get("page"); // Cambia 'nombreDelParametro' por el nombre que buscas

  // Verifica si el parámetro 'page' se obtiene correctamente
  console.log("Página obtenida:", page);

  // Asegúrate de que page no sea null
  if (page !== null) {
    var action = "index.php?page=" + page + "&function=delete";
    $("#deleteForm").attr("action", action); // Cambia 'deleteForm' a '#deleteForm' si es un ID
  } else {
    console.error("El parámetro 'page' no se encontró en la URL.");
  }

  console.log("Action del formulario:", $("#deleteForm").attr("action")); // Muestra la acción final del formulario
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
            precio: function() {
      return parentRow.find("td.precio").clone().children().remove().end().text().trim();
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
  $("input[name='rol_usuario'][value='" + data.rol + "']").prop("checked", true);
  $("input[name='id_genero_edit'][value='" + data.genero + "']").prop("checked", true);
});
