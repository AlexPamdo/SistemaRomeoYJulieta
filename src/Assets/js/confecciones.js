$(document).ready(function () {
  // Función para añadir filas a la tabla de prendas
  function añadirFilas(data) {
    var tablaPrendas = $(".tablaPrendas");

    // Recorremos los datos recibidos y agregamos filas a la tabla
    for (let i = 0; i < data.length; i++) {
      //Estructura de las filas
      var filaPrenda = `<tr class="filaPrenda">
                                        <td id="numberPrenda">${i + 1}</td>
                                        <td>
                                            <div class="input-group">
                                                <select class="form-select prenda" name="prenda[${i}][id_prenda]" required >
                                                    <option value="${data[i].id_prenda}">${data[i].prenda}</option> 
                                                </select>
                                                <div class="invalid-feedback">Por favor, selecciona un material.</div>
                                            </div>
                                        </td>
                                        <td>
                                            <input type="number" class="form-control cantidadPrenda" name="prenda[${i}][cantidad]" placeholder="Cantidad de Prendas"
                                            value="${data[i].cantidad_prenda}" >
                                            <div class="invalid-feedback">Por favor, introduce la cantidad.</div>
                                        </td>
                                      
                                    </tr>`;

      // Añadimos la fila clonada al final de la tabla
      tablaPrendas.append(filaPrenda);
    }
  }

  // Evento que se dispara cuando se cambia la opción del select
  $("#selectPedido").change(function () {
    // Limpiamos la tabla de prendas
    $(".tablaPrendas").empty();

    var valorSeleccionado = $(this).val();
    console.log("Se seleccionó la opción con el valor: " + valorSeleccionado);

    // Hacemos una solicitud AJAX para obtener los detalles del pedido
    $.ajax({
      url: `index.php?page=pedidosPrendas&function=viewDetails&id=${valorSeleccionado}`,
      method: "GET",
      success: function (respuesta) {
        try {
          const data = JSON.parse(respuesta);
          if (data.success) {
            console.log("Solicitud completada con éxito:", data);

            // Llamamos a la función para añadir las filas
            añadirFilas(data.data);
          } else {
            console.warn(
              "Error en la respuesta:",
              data.message || "Mensaje no definido"
            );
          }
        } catch (err) {
          console.error("Error procesando respuesta JSON:", err);
          alertify.error("Hubo un error al procesar la solicitud.");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error en la solicitud AJAX:", error);
        alertify.error("Hubo un error al procesar la solicitud.");
      },
    });
  });
});


