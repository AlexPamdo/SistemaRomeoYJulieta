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
  var parentRow = $(this).closest("tr");
  var id = parentRow.find("td:first").text();
  var nombre = parentRow.find("td.nombreUsuario").text();
  var apellido = parentRow.find("td.apellidoUsuario").text();
  var email = parentRow.find("td.emailUsuario").text();
  var password = parentRow.find("td.passwordUsuario div input").val();
  var rol = parentRow.find("td.rolUsuario").text().trim() === "admin" ? 1 : 2;

  console.log({ id, nombre, apellido, password, rol });

  //Cambiamos el nombre y la funcion del modal
  $("#tituloModal").text("Editar Usuario");
  $("#formCreateUser").attr("action", "index.php?page=usuarios&function=edit");

  //Aplicamos los datos en los inputs
  $("nameUser").text(nombre);
  $("apellidoUser").text(apellido);
  $("gmail_usuario").text(email);
  $("password_create").text(password);
  (existe alguna manera para ponerle la propiedad "select" al option segun el rol que se tomo?)


});
