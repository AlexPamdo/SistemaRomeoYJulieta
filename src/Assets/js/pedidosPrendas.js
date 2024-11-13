$(document).ready(function() {

  //________________________________________________________________
    //script para enviar el id de la confeccion a actualizar al modal de actualizar
    $('.actualizarPedidoPrenda').click(function () {
        var parentRow = $(this).closest("tr");
        var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

        // Verifica si el ID se obtiene correctamente
        console.log("ID obtenido:", id);

        // Pasar el id obetenido al valor del input del modal
        $('#idPedidoPrenda').val(id);
    })

      //________________________________________________________________
    //script para enviar el id de la confeccion a anular a su dicho modal
    $('.anularPedidoPrenda').click(function () {
        var parentRow = $(this).closest("tr");
        var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

        // Verifica si el ID se obtiene correctamente
        console.log("ID obtenido:", id);

        // Pasar el id obetenido al valor del input del modal
        $('#idAnularPedidoPrenda').val(id);
    })

})

  