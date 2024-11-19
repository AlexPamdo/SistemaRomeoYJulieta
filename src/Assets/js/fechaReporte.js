$(document).ready(function () {
  console.log("Script de reportes cargados");

  $(".btnReporte").click(function () {
    // Mostrar u ocultar el formulario de filtros
    let form = $(this).closest(".card-body").find(".formFiltros");
    $(form).toggle();
  });

  // Manejar el envío de formularios de reportes
  $("form[id^='form-']").on("submit", function (event) {
    event.preventDefault();

    // Obtener los valores de las fechas de inicio y fin
    let fechaInicio = $(this).find("input[name='fecha_inicio']").val();
    let fechaFin = $(this).find("input[name='fecha_fin']").val();

    // Si no se seleccionan fechas, asignar valores predeterminados
    if (!fechaInicio) fechaInicio = "1900-01-01"; // Fecha mínima predeterminada
    if (!fechaFin) fechaFin = "2100-12-31"; // Fecha máxima predeterminada

    // Obtener la unidad de medida seleccionada
    const unidadMedida = $(this).find("select[name='unidad_medida']").val();

    // Verificar que al menos la unidad de medida esté seleccionada
    if (unidadMedida) {
      // Obtener el tipo de reporte (del ID del formulario)
      const formId = $(this).attr("id").split('-')[1]; // Extraer el tipo del reporte

      // Construir la URL con los parámetros necesarios
      window.open(
        `index.php?page=${formId}&function=print&fecha_inicio=${fechaInicio}&fecha_fin=${fechaFin}&unidad_medida=${unidadMedida}`,
        "_blank"
      );
    } else {
      alert("Por favor, selecciona la unidad de medida.");
    }
  });
});
