$(document).ready(function () {
  // Selecciona todos los inputs de clase .form-control-input
  $(".form-control-input").on("focus", function () {
    $(this).prev("label").css("color", "#03937b"); // Cambiar el color del label cuando el input tiene foco
  });

  $(".form-control-input").on("blur", function () {
    $(this).prev("label").css("color", ""); // Restaurar el color del label cuando el input pierde el foco
  });

  var validations = {
    name: {
      regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{3,}$/,
      info: "mínimo 3 letras, sin números",
      complete: 0,
    },
    email: {
      regex: /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/,
      info: "Correo electrónico inválido",
      complete: 0,
    },
    pass: {
      regex: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/,
      info: "Mínimo 8 caracteres, al menos una mayúscula, minúscula, dígito",
      complete: 0,
    },
    cedula: {
      regex: /^[A-Za-z0-9]{1,3}[-\s]?[0-9]{3,4}[-\s]?[0-9]{3,4}$/,
      info: "Documento inválido",
      complete: 0,
    },
    telf: {
      regex: /^\+?(\d{1,3})?[-.\s]?\(?\d{1,4}\)?[-.\s]?(\d{4,})[-.\s]?\d{1,9}$/,
      info: "Número telefónico inválido",
      complete: 0,
    },
    descripcion: {
      regex: /^.{5,}$/,
      info: "Minimo 5 caracteres",
      complete: 0,
    },
    stock: {
      regex: /^(0|[1-9]\d*)$/,
      info: "Tiene que ser un número entero",
      complete: 0,
    },
    precio: {
      regex: /^[1-9]\d*([.,]\d{1,2})?$/,
      info: "precio no válido",
      complete: 0,
    },
    rif: {
      regex: /^[VEJGPvejgp]-\d{9}$/,
      info: "RIF debe comenzar con V, E, J, G o P , seguido de un - y tener 9 dígitos.",
      complete: 0,
    },
    notas: {
      regex: /^.{10,}$/,
      info: "Mínimo 10 caracteres",
      complete: 0,
    },
    cant: {
      regex: /^[1-9]\d*$/,
      info: "Número mayor de 0",
      complete: 0,
    },
  };

  $(".form").submit(function (event) {
    var allComplete = true;

    // Iterar sobre todos los inputs del formulario
    $(this)
      .find(".campo")
      .each(function () {
        var $this = $(this);
        var value = $this.val();

        // Buscar qué clase del input está en el objeto validations
        $.each(validations, function (key, validation) {
          if ($this.hasClass(key)) {
            var $errorSpan;

            // Si el input tiene la clase 'pass', el mensaje aparece debajo del botón con la clase 'after'
            if ($this.hasClass("pass")) {
              var $afterButton = $(".after");
              $errorSpan = $afterButton.next(".error");

              if (!$errorSpan.length) {
                $errorSpan = $('<span class="error"></span>').insertAfter(
                  $afterButton
                );
              }
            } else {
              // Para los demás inputs, el mensaje aparece justo debajo del input
              $errorSpan = $this.next(".error");

              if (!$errorSpan.length) {
                $errorSpan = $('<span class="error"></span>').insertAfter(
                  $this
                );
              }
            }

            if (value === "") {
              $errorSpan.text("Rellene este campo").show();
              validation.complete = 0;
            } else if (!value.match(validation.regex)) {
              $errorSpan.text(validation.info).show();
              validation.complete = 0;
            } else {
              $errorSpan.text("").hide();
              validation.complete = 1;
            }

            if (validation.complete === 0) {
              allComplete = false;
            }

            return false; // Terminar el bucle cuando se encuentra la clase
          }
        });
      });

    if (!allComplete) {
      event.preventDefault();
    }
  });

  $(".campo")
    .blur(function () {
      $(this).css("border", "");
      var $this = $(this);

      $.each(validations, function (key, value) {
        if ($this.hasClass(key)) {
          var inputVal = $this.val();
          var $errorSpan;

          if (inputVal !== "") {
            if ($this.hasClass("pass")) {
              // Si el input tiene la clase 'pass', el mensaje aparece debajo del botón con la clase 'after'
              var $afterButton = $(".after");
              $errorSpan = $afterButton.next(".error");

              if (!$errorSpan.length) {
                $errorSpan = $('<span class="error"></span>').insertAfter(
                  $afterButton
                );
              }
            } else {
              // Para los demás inputs, el mensaje aparece justo debajo del input
              $errorSpan = $this.next(".error");

              if (!$errorSpan.length) {
                $errorSpan = $('<span class="error"></span>').insertAfter(
                  $this
                );
              }
            }

            if (!inputVal.match(value.regex)) {
              $errorSpan.text(value.info).show();
              validations[key].complete = 0;
            } else {
              $errorSpan.text("").hide();
              validations[key].complete = 1;
            }
          }

          return false; // Terminar el bucle cuando se encuentra la clase
        }
      });
    })
    .focus(function () {
      var $this = $(this);

      var $errorSpan;
      if ($this.hasClass("pass")) {
        $errorSpan = $(".after").next(".error");
      } else {
        $errorSpan = $this.next(".error");
      }

      if ($errorSpan.length) {
        $errorSpan.text("").hide();
      }
    });

  let clickCant = 0; // Asegúrate de usar let para declarar el contador.

  $(".btn-registrar").click(function () {
    clickCant++; // Incrementa el contador.
    if (clickCant == 2) {
      $(this).prop("disabled", true); // Deshabilitar el botón.
    }
    setTimeout(() => {
        $(this).prop("disabled", false); // Habilitar el botón después de 1 segundo.
        clickCant = 0; // Reiniciar el contador después de 1 segundo.
      }, 2000);

  });
});
