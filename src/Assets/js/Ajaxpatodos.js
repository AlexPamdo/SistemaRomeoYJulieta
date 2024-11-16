var urlParams = new URLSearchParams(window.location.search);
var page = urlParams.get("page"); // Obtienes el valor de "page"

console.log(page); // Si estás en la URL "http://localhost/proyectosPhp/Dashboard10.6/SistemaRomeoYJulieta/index.php?page=proveedores", esto imprimirá "proveedores"
