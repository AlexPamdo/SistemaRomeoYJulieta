$("#añadirPrenda").click(function () {
    console.log("Botón 'añadirPrenda' presionado.");

    // Obtenemos la lista de prendas
    var $prendas = $(".tablaPrendas");
    console.log("Lista de Prendas obtenida:", $prendas);

    // Obtenemos la plantilla de la fila de prendas y la clonamos
    var $filaPrenda = $("#filaPrenda").clone(true, true);
    console.log("Fila de Prenda clonada:", $filaPrenda);

    // Contamos el número de filas existentes en la tabla
    var numeroFila = $prendas.find("tr").length;
    console.log("Número de filas actual en la tabla:", numeroFila);

    // Verificamos si no se ha llegado al límite
    if (numeroFila < 10) {
        console.log("Límite de 10 filas no alcanzado. Añadiendo nueva fila.");

        // Configuramos el número y el atributo name de la fila clonada
        $filaPrenda.find("#numberPrenda").text(numeroFila + 1);
        $filaPrenda.find("#prenda").attr("name", `prenda[${numeroFila}][id_prenda]`);
        $filaPrenda.find("#cantidadPrenda").attr("name", `prenda[${numeroFila}][cantidad]`);
        console.log("Atributos 'name' actualizados.");

        // Removemos el ID para evitar duplicados y limpiamos campos
        $filaPrenda.removeAttr("id");
        $filaPrenda.find("#prenda").val("none");
        $filaPrenda.find("#cantidadPrenda").val("");
        
        // Añadimos la fila de prendas al final de la lista
        $prendas.append($filaPrenda);
        console.log("Fila añadida a la tabla.");

        // Agregamos evento de eliminación a la nueva fila
        $filaPrenda.find("button").click(function () {
            console.log("Botón eliminar presionado para fila:", $filaPrenda);
            $filaPrenda.remove();
            console.log("Fila eliminada.");
        });
    } else {
        console.log("Límite de 10 filas alcanzado. No se añadió una nueva fila.");
    }
});