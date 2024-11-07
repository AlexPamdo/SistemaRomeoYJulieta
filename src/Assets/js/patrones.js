function añadirMaterial() {
  // Obtenemos la lista de materiales agregados
  var materiales = document.getElementsByClassName("tablaMateriales")[0];

  // Obtenemos la plantilla de la fila de materiales
  var filaMaterial = document.getElementById("filaMaterial").cloneNode(true);

  // Contamos el número de filas existentes en la tabla
  var numeroFila = materiales.getElementsByTagName("tr").length;

  // Verificamos si no se ha llegado al limite
  if (numeroFila !== 10) {
    // Cambiamos el valor del número de material en la fila
    filaMaterial.querySelector("#numberMaterial").textContent = numeroFila + 1;

    // Modificamos el atributo name del select y el input para reflejar el nuevo número
    filaMaterial.querySelector(
      "#material"
    ).name = `material[${numeroFila}][id_Material]`;
    filaMaterial.querySelector(
      "#cantidadMaterial"
    ).name = `material[${numeroFila}][cantidad]`;

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

function añadirMaterialEdit(id) {
  // Obtenemos la lista de materiales agregados
  const materiales = document.querySelector(`.tablaMateriales[data-patron="${id}"]`);

  // Contamos el número de filas existentes en la tabla
  const numeroFila = materiales.getElementsByTagName("tr").length;

  // Verificamos si no se ha llegado al límite
  if (numeroFila >= 10) {
      alert("Se ha alcanzado el límite de materiales.");
      return;
  }

  // Creamos una nueva fila de material
  const filaMaterial = document.createElement("tr");

  // Definimos el contenido HTML de la nueva fila, insertando las opciones de PHP
  filaMaterial.innerHTML = `
      <td>${numeroFila + 1}</td>
      <td>
          <select name="material[${numeroFila}][id_Material]" class="form-select materialSelect">
              <?php echo $materialesOptions; ?>
          </select>
      </td>
      <td>
          <input type="text" name="material[${numeroFila}][cantidad]" class="cantidadInput form-control campo cant" min="1" placeholder="Cantidad">
      </td>
      <td>
          <button type="button" class="btn btn-danger btn-sm eliminarBtn"><i class="fa-solid fa-xmark"></i></button>
      </td>
  `;

  // Añadimos la fila de materiales al final de la lista
  materiales.appendChild(filaMaterial);

  // Aseguramos que el botón eliminar funcione
  filaMaterial.querySelector(".eliminarBtn").addEventListener("click", () => {
      filaMaterial.remove();

      // Actualizamos el número de material en cada fila después de una eliminación
      const filas = materiales.getElementsByTagName("tr");
      for (let i = 0; i < filas.length; i++) {
          filas[i].querySelector("td").textContent = i + 1;
          filas[i].querySelector(".materialSelect").name = `material[${i}][id_Material]`;
          filas[i].querySelector(".cantidadInput").name = `material[${i}][cantidad]`;
      }
  });
}
