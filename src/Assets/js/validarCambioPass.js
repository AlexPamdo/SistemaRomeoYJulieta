$(document).ready(function(){
      var respuestaSeguridad = $('#res');

     var validations = {
           password: {
            regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/,
            info: "Mínimo 6 caracteres, al menos una mayúscula, minúscula, dígito",
            mensaje: "#passwordError",
            complete: 0,
        },
        c_password: {
            regex:  null,
            info: "Las contraseñas no coinciden",
            mensaje: "#c_passwordError",
            complete: 0,
        }
     }

      $(".campoPass").focus(function() {
        $(this).css("border", "solid 3px #aaaaaa");
        var id = $(this).attr("id");
        var regexObjet = validations[id];
        $(regexObjet.mensaje).text("");
    }).blur(function() {
        $(this).css("border", "");
        var id = $(this).attr("id");
        var value = $(this).val();
        var regexObjet = validations[id];
        if (value !== "") {
            if (id === "c_password") {
                var passValue = $("#password").val();
                if (value !== passValue) {
                    $(regexObjet.mensaje).text(regexObjet.info);
                    regexObjet.complete = 0;
                } else {
                    $(regexObjet.mensaje).text("");
                    regexObjet.complete = 1;
                }
            }else {
                if (!regexObjet.regex.test(value)) {
                    $(regexObjet.mensaje).text(regexObjet.info);
                    regexObjet.complete = 0;
                } else {
                    $(regexObjet.mensaje).text("");
                    regexObjet.complete = 1;
                }
            }
        }
    });

     $('#formPass').submit(function(event) {
        var allComplete = true;
        for (const key in validations) {
            var value = $("#" + key).val();
            if (validations[key].complete === 0) {
                if (value === "") {
                    $(validations[key].mensaje).text('Rellene este campo');
                }

                allComplete = false;
            }
        }

        if (respuestaSeguridad.val() === "") {
            allComplete = false;
            $("#resError").text("Rellene este campo");
        }
        
        if (!allComplete) {
            event.preventDefault();
        }
    });
});