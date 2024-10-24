function añadirMaterial() {
    // Obtenemos la lista de materiales agregados
    var materiales = document.getElementsByClassName("tablaMateriales")[0];
  
    // Obtenemos la plantilla de la fila de materiales
    var filaMaterial = document.getElementById("filaMaterial").cloneNode(true);
  
    // Contamos el número de filas existentes en la tabla
    var numeroFila = materiales.getElementsByTagName('tr').length;
  
    // Verificamos si no se ha llegado al limite
    if(numeroFila !== 10){

    // Cambiamos el valor del número de material en la fila
    filaMaterial.querySelector("#numberMaterial").textContent = numeroFila + 1;
  
    // Modificamos el atributo name del select y el input para reflejar el nuevo número
    filaMaterial.querySelector("#material").name = `material[${numeroFila}][id_Material]`;
    filaMaterial.querySelector("#cantidadMaterial").name = `material[${numeroFila}][cantidad]`;
  
    // Añadimos la fila de materiales al final de la lista
    materiales.appendChild(filaMaterial);
  
    // Limpiamos los campos de la fila de materiales
    filaMaterial.querySelector("#material").value = "none";
    filaMaterial.querySelector("#cantidadMaterial").value = "";
  
    // Aseguramos que el id del botón eliminar siga funcionando
    filaMaterial.querySelector("button").addEventListener("click", () => {
      filaMaterial.remove();
    });
}
  }
  