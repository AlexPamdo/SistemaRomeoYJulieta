$(document).ready(function() {
    // Mostrar formulario de fechas al hacer clic en el botón de reporte parametrizado
    $('#btn-reporte-confecciones-fechas').click(function() {
        $('#form-fechas-confecciones').show();
    });

    $('#btn-reporte-pedidos-prenda-fechas').click(function() {
        $('#form-fechas-pedidos-prenda').show();
    });

    $('#btn-reporte-pedidos-fechas').click(function() {
        $('#form-fechas-pedidos').show();
    });

    // Ocultar los formularios de fechas si el clic es fuera de ellos
    $(document).click(function(event) {
        const forms = $('#form-fechas-almacen, #form-fechas-confecciones, #form-fechas-pedidos, #form-fechas-pedidos-prenda');
        const buttons = $('#btn-reporte-almacen-fechas, #btn-reporte-confecciones-fechas, #btn-reporte-pedidos-fechas, #btn-reporte-pedidos-prenda-fechas');

        // Verifica si el clic no fue dentro de un formulario o el botón que lo muestra
        if (!$(event.target).closest(forms).length && !$(event.target).closest(buttons).length) {
            forms.hide();
        }
    });

    // Validación para los formularios antes de enviarlos
    $('form').submit(function(event) {
        const startDate = $(this).find('input[type="date"]:first').val();
        const endDate = $(this).find('input[type="date"]:last').val();

        if (new Date(startDate) > new Date(endDate)) {
            alert('La fecha de inicio no puede ser mayor que la fecha de fin');
            event.preventDefault(); // Previene el envío del formulario
        }
    });

    //CONFECCIONES

    $('#form-confecciones').on('submit', function (e) {
        e.preventDefault(); // Evitar que el formulario se envíe de manera convencional

        var fechaInicio = $('#fecha-inicio-confecciones').val();
        var fechaFin = $('#fecha-fin-confecciones').val();

        if (fechaInicio && fechaFin) {
            // Pasar las fechas al archivo PHP para generar el reporte
            window.open('index.php?page=confecciones&function=print&fecha_inicio=' + fechaInicio + '&fecha_fin=' + fechaFin, '_blank');
        } else {
            alert('Por favor, seleccione ambas fechas.');
        }
    });
    
    //PEDIDOS PROVEEDORES

    $('#form-pedidos').on('submit', function (e) {
        e.preventDefault(); // Evitar que el formulario se envíe de manera convencional

        var fechaInicio = $('#fecha-inicio-pedidos').val();
        var fechaFin = $('#fecha-fin-pedidos').val();

        if (fechaInicio && fechaFin) {
            // Pasar las fechas al archivo PHP para generar el reporte
            window.open('index.php?page=pedidosproveedores&function=print&fecha_inicio=' + fechaInicio + '&fecha_fin=' + fechaFin, '_blank');
        } else {
            alert('Por favor, seleccione ambas fechas.');
        }
    });

    //PEDIDOS PRENDAS

    $('#form-fechas-pedidos-prenda').on('submit', function (e) {
        e.preventDefault(); // Evitar que el formulario se envíe de manera convencional

        var fechaInicio = $('#fecha-inicio-pedidos-prenda').val();
        var fechaFin = $('#fecha-fin-pedidos-prenda').val();

        if (fechaInicio && fechaFin) {
            // Pasar las fechas al archivo PHP para generar el reporte
            window.open('index.php?page=pedidosprendas&function=print&fecha_inicio=' + fechaInicio + '&fecha_fin=' + fechaFin, '_blank');
        } else {
            alert('Por favor, seleccione ambas fechas.');
        }
    });
   
});
