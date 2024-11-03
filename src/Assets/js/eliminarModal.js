// ----------------------- Enviar Datos al modal de eliminar -----------------------
console.log("eliminar js cargado");
$(".eliminar").click(function () {
  var parentRow = $(this).closest("tr");
  var id = parentRow.find("td:first").text(); // Obtén el texto del primer <td> en la fila

  // Verifica si el ID se obtiene correctamente
  console.log("ID obtenido:", id);
  $("#eliminarId").val(id); // Asigna ese id al atributo value de #eliminarId

  // Obtiene la URL actual
  const url = new URL(window.location.href);

  // Extrae parámetros de la URL
  var page = url.searchParams.get("page"); // Cambia 'nombreDelParametro' por el nombre que buscas

  // Verifica si el parámetro 'page' se obtiene correctamente
  console.log("Página obtenida:", page);

  // Asegúrate de que page no sea null
  if (page !== null) {
    var action = "index.php?page=" + page + "&function=delete";
    $("#deleteForm").attr("action", action); // Cambia 'deleteForm' a '#deleteForm' si es un ID
  } else {
    console.error("El parámetro 'page' no se encontró en la URL.");
  }

  console.log("Action del formulario:", $("#deleteForm").attr("action")); // Muestra la acción final del formulario
});

// ----------------------- Enviar Datos al modal de editar -----------------------
$(".editar").click(function () {

  // Identificamos en que pagina estamos para saber que parametros tomar
  const url = new URL(window.location.href);
  var page = url.searchParams.get("page");
  console.log("La pagina actual es " + page)

  var parentRow = $(this).closest("tr");
  var id = parentRow.find("td:first").text();

  switch(page){
    case "usuarios":
      var nombre = parentRow.find("td.nombreUsuario").text();
      var apellido = parentRow.find("td.apellidoUsuario").text();
      var email = parentRow.find("td.emailUsuario").text();
      var password = parentRow.find("td.passwordUsuario div input").val();
      var rol = parentRow.find("td.rolUsuario").text().trim() === "admin" ? 1 : 2;
    
      //Depuracion para saber los datos
      console.log({ id, nombre, apellido, password, rol });
    
      //Aplicamos los datos en los inputs
      $("#id_edit").val(id);
      $("#nameUser_edit").val(nombre);
      $("#apellidoUser_edit").val(apellido);
      $("#gmail_usuario_edit").val(email);
      $("#password_create_edit").val(password);
      $("#id_roles_edit").val(rol);
    break;

    case "almacen":
      var desc = parentRow.find("td.desc").text();
      var tipo = parentRow.find("input.tipo").val();
      var color = parentRow.find("input.color").val();
      var stock = parentRow.find("td.stock").text();
      var precio = parentRow.find("td.precio").text();
    
      //Depuracion para saber los datos
      console.log({ desc, tipo, color, stock, precio });
    
      //Aplicamos los datos en los inputs
      $("#id_edit").val(id);
      $("#desc_edit").val(desc);
      $("#tipo_edit").val(tipo);
      $("#color_edit").val(color);
      $("#stock_edit").val(stock);
      $("#precio_edit").val(precio);
    break;

  }

  
 

});
