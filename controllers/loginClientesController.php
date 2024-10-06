<?php

// Incluir la función render si es necesaria
function render()
{
    include_once("views/Login_clientes.php");
}

// Incluir el model de clientes
include_once("model/loginClientesModel.php");

// Clase para manejar la creación de clientes
class crearCliente
{
    public function create()
    {
        // Crear una instancia del model de clientes
        $cliente = new loginClientes();

        // Verificar si se ha enviado el formulario
        if (!empty($_POST["btnCrear"])) {
            // Verificar que todos los campos del formulario están completos
            if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["telefono"]) && !empty($_POST["email"]) && !empty($_POST["contraseña"]) && !empty($_POST["cedula"])) {

                // Establecer los valores del cliente
                $cliente->setNombre($_POST["nombre"]);
                $cliente->setApellido($_POST["apellido"]);
                $cliente->setTelefono($_POST["telefono"]);
                $cliente->setEmail($_POST["email"]);
                $cliente->setContraseña($_POST["contraseña"]);
                $cliente->setCedula($_POST["cedula"]);

                // Intentar crear el cliente en la base de datos
                if ($cliente->create()) {
                    header("Location: index.php?page=loginClientes&success=1");
                    exit; // Importante: detener la ejecución después de redireccionar
                } else {
                    header("Location: index.php?page=loginClientes&error=1");
                    exit; // Detener la ejecución después de redireccionar
                }
            } else {
                echo "<div class='alert alert-warning'> Complete todos los campos </div> ";
            }
        }
        // Incluir la vista de registro
        include_once("views/loginClientes/registrar.php");
    }
}
