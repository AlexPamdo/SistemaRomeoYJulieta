$(document).ready(function() {
    var validations = {

        //editar usuarios
        nameUserEdit: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
            info: "Nombre mínimo 3 letras, sin números",
            mensaje: ".nameUserEditError",
            complete: 1,
        },
        apellidoUserEdit: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
            info: "Apellido mínimo 3 letras, sin números",
            mensaje: ".apellidoUserEditError",
            complete: 1,
        },
        gmail_usuarioEdit: {
            regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
            info: "Correo electrónico inválido",
            mensaje: ".gmail_usuarioEditError",
            complete: 1,
        },
        password_createEdit: {
            regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/,
            info: "Mínimo 8 caracteres, al menos una mayúscula, minúscula, dígito",
            mensaje: ".password_createEditError",
            complete: 1,
        },


         //validaciones para crear confecciones

    cantidadConfeccionEdit: {
        regex: /^[1-9]\d*$/,
        info: "Tiene que ser un número entero",
        mensaje: "#cantidadConfeccionEditError",
        complete: 1,
      },

      //editar supervisores
            nameSupervisorEdit: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
            info: "Nombre mínimo 3 letras, sin números",
            mensaje: ".nameSupervisorEditError",
            complete: 1,
        },apellidoSupervisorEdit: {
             regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
             info: "Apellido mínimo 3 letras, sin números",
             mensaje: ".apellidoSupervisorEditError",
             complete: 1,
         },emailSupervisorEdit: {
             regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
             info: "Correo electrónico inválido",
             mensaje: ".emailSupervisorEditError",
             complete: 1,
         },telfSupervisorEdit: {
             regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
             info: "Número telefónico inválido",
             mensaje: ".telfSupervisorEditError",
             complete: 1,
         },cedulaSupervisorEdit: {
             regex: /^[A-Za-z0-9]{1,3}[-\s]?[0-9]{3,4}[-\s]?[0-9]{3,4}$/,
             info: "Documento inválido",
             mensaje: ".cedulaSupervisorEditError",
             complete: 1,
         },

         //editar clientes

        nameClienteEdit: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
            info: "Nombre mínimo 3 letras, sin números",
            mensaje: ".nameClienteEditError",
            complete: 1,
        },apellidoClienteEdit: {
             regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
             info: "Apellido mínimo 3 letras, sin números",
             mensaje: ".apellidoClienteEditError",
             complete: 1,
         },emailClienteEdit: {
             regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
             info: "Correo electrónico inválido",
             mensaje: ".emailClienteEditError",
             complete: 1,
         },telfClienteEdit: {
             regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
             info: "Número telefónico inválido",
             mensaje: ".telfClienteEditError",
             complete: 1,
         },password_createEdit: {
            regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/,
            info: "Mínimo 8 caracteres, al menos una mayúscula, minúscula, dígito",
            mensaje: ".password_createEditError",
            complete: 1,
        },

        
        //validaciones para proveedores
        nameProveedorEdit: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s.-]{3,}$/,
            info: "Nombre mínimo 3 letras, sin números",
            mensaje: ".nameProveedorEditError",
            complete: 1,
        },rifProveedorEdit: {
            regex: /^[VEJGPvejgp]\d{9}$/,
            info: "RIF debe comenzar con V, E, J, G o P y tener 9 dígitos.",
            mensaje: "#rifProveedorEditError",
            complete: 1,
        },telfProveedorEdit: {
             regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
             info: "Número telefónico inválido",
             mensaje: ".telfProveedorEditError",
             complete: 1,
         },emailProveedorEdit: {
             regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
             info: "Correo electrónico inválido",
             mensaje: ".emailProveedorEditError",
             complete: 1,
         },notasProveedorEdit:{
             regex: /^.{10,}$/,
            info: "Mínimo 10 caracteres",
            mensaje: ".notasProveedorEditError",
            complete: 1,
        },

        //validaciones para material en almacen
        descripcionMaterialEdit:{
             regex: /^.{5,}$/,
            info: "Descripcion minimo 5 caracteres",
            mensaje: ".descripcionMaterialEditError",
            complete: 1,
        },stockMaterialEdit:{
               regex: /^(0|[1-9]\d*)$/,
             info: "Tiene que ser un número entero",
             mensaje: ".stockMaterialEditError",
             complete: 1,
         },precioMaterialEdit:{
             regex: /^[1-9]\d*([.,]\d{1,2})?$/,
             info: "precio no válido",
             mensaje: ".precioMaterialEditError",
             complete: 1,
         },
        
        
    };

    $(".campoEdit").focus(function() {
        $(this).css("border", "solid 3px #aaaaaa");
        var idClass = $(this).attr("class").split(" ").find(cls => validations[cls]);
        var regexObjet = validations[idClass];
        $(regexObjet.mensaje).text("");

        console.log(`Campo en foco: ${idClass}`);
    }).blur(function() {
        $(this).css("border", "");
        var idClass = $(this).attr("class").split(" ").find(cls => validations[cls]);
        var value = $(this).val();
        var regexObjet = validations[idClass];

        console.log(`Validando campo: ${idClass}, Valor: "${value}"`);

        if (value !== "") {
            if (!regexObjet.regex.test(value)) {
                $(regexObjet.mensaje).text(regexObjet.info);
                regexObjet.complete = 0;
                console.log(`Error: ${regexObjet.info}`);
            } else {
                $(regexObjet.mensaje).text("");
                regexObjet.complete = 1;
                console.log(`Validación correcta para el campo: ${idClass}`);
            }
        } else {
            regexObjet.complete = 0;
            console.log(`Campo vacío: ${idClass}, complete = 0`);
        }
    });

    $('.formEdit').submit(function(event) {
        var allComplete = true;

        for (const key in validations) {
            var input = $("." + key);
            var value = input.val();

            if (validations[key].complete === 0) {
                if (value === "") {
                    $(validations[key].mensaje).text('Rellene este campo');
                }
                allComplete = false;
                console.log(`Campo incompleto: ${key}`);
            }
        }

        if (!allComplete) {
            event.preventDefault();
            console.log("Formulario no enviado. Existen campos incompletos.");
        } else {
            console.log("Formulario enviado exitosamente.");
        }
    });
});
