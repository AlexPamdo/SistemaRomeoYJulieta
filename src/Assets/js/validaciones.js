$(document).ready(function () {
  var respuestaSeguridad = $("#respuesta"); //respuesta de seguridad del user
  var validations = {
    //Validaciones para el loginb

    //validaciones de crear usuarios
    nameUser: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "Nombre mínimo 3 letras, sin números",
      mensaje: "#nameUserError",
      complete: 0,
    },
    apellidoUser: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "Apellido mínimo 3 letras, sin números",
      mensaje: "#apellidoUserError",
      complete: 0,
    },
    gmail_usuario: {
      regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
      info: "Correo electrónico inválido",
      mensaje: "#gmail_usuarioError",
      complete: 0,
    },
    password_create: {
      regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/,
      info: "Mínimo 8 caracteres, al menos una mayúscula, minúscula, dígito",
      mensaje: "#password_createError",
      complete: 0,
    },

    //validaiones de crear Empleados
    nameEmpleado: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "Nombre mínimo 3 letras, sin números",
      mensaje: "#nameEmpleadoError",
      complete: 0,
    },
    apellidoEmpleado: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "Apellido mínimo 3 letras, sin números",
      mensaje: "#apellidoEmpleadoError",
      complete: 0,
    },
    emailEmpleado: {
      regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
      info: "Correo electrónico inválido",
      mensaje: "#emailEmpleadoError",
      complete: 0,
    },
    telfEmpleado: {
      regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
      info: "Número telefónico inválido",
      mensaje: "#telfEmpleadoError",
      complete: 0,
    },
    cedulaEmpleado: {
      regex: /^[A-Za-z0-9]{1,3}[-\s]?[0-9]{3,4}[-\s]?[0-9]{3,4}$/,
      info: "Documento inválido",
      mensaje: "#cedulaEmpleadoError",
      complete: 0,
    },

    //validaciones para crear material en almacen
    descripcionMaterial: {
      regex: /^.{5,}$/,
      info: "Descripcion minimo 5 caracteres",
      mensaje: "#descripcionMaterialError",
      complete: 0,
    },tipoMaterial:{
        mensaje: "#tipoMaterialError",
        complete: 0,
    },colorMaterial:{
        mensaje: "#colorMaterialError",
        complete: 0,
    },
    stockMaterial: {
      regex: /^(0|[1-9]\d*)$/,
      info: "Tiene que ser un número entero",
      mensaje: "#stockMaterialError",
      complete: 0,
    },
    precioMaterial: {
      regex: /^[1-9]\d*([.,]\d{1,2})?$/,
      info: "precio no válido",
      mensaje: "#precioMaterialError",
      complete: 0,
    },

    //validaciones para crear clientes
    nameCliente: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "Nombre mínimo 3 letras, sin números",
      mensaje: "#nameClienteError",
      complete: 0,
    },
    apellidoCliente: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "Apellido mínimo 3 letras, sin números",
      mensaje: "#apellidoClienteError",
      complete: 0,
    },
    telfCliente: {
      regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
      info: "Número telefónico inválido",
      mensaje: "#telfClienteError",
      complete: 0,
    },
    emailCliente: {
      regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
      info: "Correo electrónico inválido",
      mensaje: "#emailClienteError",
      complete: 0,
    },
    passCliente: {
      regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/,
      info: "Mínimo 8 caracteres, al menos una mayúscula, minúscula, dígito",
      mensaje: "#passClienteError",
      complete: 0,
    },
    cedulaCliente: {
      regex: /^[A-Za-z0-9]{1,3}[-\s]?[0-9]{3,4}[-\s]?[0-9]{3,4}$/,
      info: "Documento inválido",
      mensaje: "#cedulaClienteError",
      complete: 0,
    },

    //validaciones para crear proveedores

    nameProveedor: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.-]{3,}$/,
      info: "Nombre mínimo 3 letras, sin números",
      mensaje: "#nameProveedorError",
      complete: 0,
    },
    rifProveedor: {
      regex: /^[VEJGPvejgp]\d{9}$/,
      info: "RIF debe comenzar con V, E, J, G o P y tener 9 dígitos.",
      mensaje: "#rifProveedorError",
      complete: 0,
    },
    telfProveedor: {
      regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
      info: "Número telefónico inválido",
      mensaje: "#telfProveedorError",
      complete: 0,
    },
    emailProveedor: {
      regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
      info: "Correo electrónico inválido",
      mensaje: "#emailProveedorError",
      complete: 0,
    },
    notasProveedor: {
      regex: /^.{10,}$/,
      info: "Mínimo 10 caracteres",
      mensaje: "#notasProveedorError",
      complete: 0,
    },

    //validaciones para crear confecciones

    cantidadConfeccion: {
      regex: /^[1-9]\d*$/,
      info: "Tiene que ser un número entero",
      mensaje: "#cantidadConfeccionError",
      complete: 0,
    },

    //validaciones para crear catalogo
    precioCatalogo: {
      regex: /^\d+([.,]\d{1,2})?$/,
      info: "precio no válido",
      mensaje: "#precioCatagoloError",
      complete: 0,
    },
    detallesCatalogo: {
      regex: /^.{50,200}$/,
      info: "Minimo 50 caracteres, máximo 200",
      mensaje: "#detallesCatalogoError",
      complete: 0,
    },

    //patrones
    descripcion: {
      regex: /^.{5,}$/,
      info: "Descripcion minimo 5 caracteres",
      mensaje: "#descripcionError",
      complete: 0,
    },
    stock: {
      regex: /^(0|[1-9]\d*)$/,
      info: "debe ser un número entero",
      mensaje: "#stockError",
      complete: 0,
    },
  };

  $(".campo")
    .focus(function () {
      $(this).css("border", "solid 3px #aaaaaa");
      var id = $(this).attr("id");
      var regexObjet = validations[id];
      $(regexObjet.mensaje).text("");
    })
    .blur(function () {
      $(this).css("border", "");
      var id = $(this).attr("id");
      var value = $(this).val();
      var regexObjet = validations[id];
      if (value !== "") {
        if (!regexObjet.regex.test(value)) {
          $(regexObjet.mensaje).text(regexObjet.info);
          console.log("no se actualizo el complete: " + regexObjet.mensaje);
          regexObjet.complete = 0;
        } else {
          $(regexObjet.mensaje).text("");
          console.log("se actualizo el complete " + regexObjet.mensaje);
          regexObjet.complete = 1;
        }
      }
    });

  $(".form").submit(function (event) {
    var form = $(this);
    var allComplete = true;

    form.find(".campo").each(function () {
      var id = $(this).attr("id");
      var value = $(this).val();
      var regexObjet = validations[id];

      if (regexObjet) {
        if (value === "" || !regexObjet.regex.test(value)) {
          $(regexObjet.mensaje).text(
            value === "" ? "Rellene este campo" : regexObjet.info
          );
          allComplete = false;
          regexObjet.complete = 0;
        } else {
          $(regexObjet.mensaje).text("");
          regexObjet.complete = 1;
        }
      }
    });

    var respuestaSeguridad = form.find("#respuesta");
    if (respuestaSeguridad.length && respuestaSeguridad.val() === "") {
      allComplete = false;
      form.find("#respuestaError").text("Rellene este campo");
    }

    if (!allComplete) {
      event.preventDefault();
    }
  });
});
