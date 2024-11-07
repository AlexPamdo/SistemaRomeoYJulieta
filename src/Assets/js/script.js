// Scrisp generales

function iniciarTour() {
    introJs().start();
  }


  // Scrip para el select2
  $(document).ready(function() {
    $('.custom-select').select2({
      width: '100%',
      dropdownParent: $('#CrearModal'), // Establecer el modal como contenedor del dropdown
      language: 'es', // Establecer el idioma a español
      dropdownAutoWidth: true, // Ajusta el ancho automáticamente
      theme: 'custom-theme', // Puedes usar temas personalizados como bootstrap-5
    });

    $('.custom-select-table').select2({
      width: '100%',
      dropdownParent: $('#CrearModal'), // Establecer el modal como contenedor del dropdown
      language: 'es', // Establecer el idioma a español
      dropdownAutoWidth: true, // Ajusta el ancho automáticamente
    });

    $('.custom-select-edit').select2({
      width: '100%',
      dropdownParent: $('#editar'), // Establecer el modal como contenedor del dropdown
      language: 'es', // Establecer el idioma a español
      dropdownAutoWidth: true, // Ajusta el ancho automáticamente
      theme: 'custom-theme', // Puedes usar temas personalizados como bootstrap-5
    });
});