$(document).ready(function () {
  console.log("Script de reportes cargados");

  $(".btnReporte").click(function () {
    // Mostrar u ocultar el formulario de filtros
    let form = $(this).closest(".card-body").find(".formFiltros");
    $(form).toggle();
  });

  // Manejar el envío de formularios de reportes

});
