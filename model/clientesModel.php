<?php

include_once("config/conexion.php");

class clientes
{
    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $email;
    private $contraseña;
    private $cedula;
    private $conn;
    private $tabla = "clientes";

    /**
     * Constructor de la clase `clientes`.
     * Establece la conexión a la base de datos.
     */
    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    /**
     * Obtiene todos los registros de la tabla `clientes`.
     * 
     * @return array|false Retorna un array asociativo con todos los registros si tiene éxito, o `false` en caso de error.
     */
    public function viewAll()
    {
        $query = "SELECT * FROM " . $this->tabla;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
     * Obtiene un registro específico de la tabla `clientes` por su ID.
     * 
     * @param int $id El ID del cliente que se desea obtener.
     * @return array|false Retorna un array asociativo con el registro si tiene éxito, o `false` en caso de error.
     */
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->tabla . " WHERE id_cliente = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
     * Obtiene el número total de registros en la tabla `clientes`.
     * 
     * @return int|false Retorna el total de registros si tiene éxito, o `false` en caso de error.
     */
    public function totalCount()
    {
        $query = "SELECT COUNT(*) as total FROM " . $this->tabla;
        $result = $this->conn->query($query);

        if ($result) {
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
            return $row[0]['total'];
        } else {
            return false;
        }
    }

    /**
     * Crea un nuevo registro en la tabla `clientes` con los datos actuales del objeto.
     * 
     * @return bool Retorna `true` si la operación fue exitosa, o `false` en caso de error.
     */
    public function create()
    {
        $query = "INSERT INTO " . $this->tabla . " (nombre,apellido,telefono,email,contraseña,cedula) VALUES('" . $this->nombre . "','" . $this->apellido . "','" . $this->telefono . "','" .  $this->email . "','" . $this->contraseña . "','" . $this->cedula . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Elimina un registro de la tabla `clientes` por su ID.
     * 
     * @param int $id El ID del cliente que se desea eliminar.
     * @return bool Retorna `true` si la operación fue exitosa, o `false` en caso de error.
     */
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->tabla . " WHERE id_cliente = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Actualiza un registro en la tabla `clientes` con los datos actuales del objeto.
     * 
     * @param int $id El ID del cliente que se desea actualizar.
     * @return bool Retorna `true` si la operación fue exitosa, o `false` en caso de error.
     */
    public function edit($id)
    {
        $query = "UPDATE " . $this->tabla . " SET nombre = '" . $this->nombre . "', apellido = '" . $this->apellido . "', telefono = '" . $this->telefono . "', email = '" . $this->email . "', contraseña = '" . $this->contraseña . "', cedula = '" . $this->cedula . "' WHERE id_cliente = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Establece el nombre del cliente.
     * 
     * @param string $nombre El nombre del cliente.
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el nombre del cliente.
     * 
     * @return string El nombre del cliente.
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Establece el apellido del cliente.
     * 
     * @param string $apellido El apellido del cliente.
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Obtiene el apellido del cliente.
     * 
     * @return string El apellido del cliente.
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Establece el teléfono del cliente.
     * 
     * @param string $telefono El teléfono del cliente.
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Obtiene el teléfono del cliente.
     * 
     * @return string El teléfono del cliente.
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Establece el email del cliente.
     * 
     * @param string $email El email del cliente.
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Obtiene el email del cliente.
     * 
     * @return string El email del cliente.
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Establece la contraseña del cliente.
     * 
     * @param string $contraseña La contraseña del cliente.
     */
    public function setContraseña($contraseña)
    {
        $this->contraseña = $contraseña;
    }

    /**
     * Obtiene la contraseña del cliente.
     * 
     * @return string La contraseña del cliente.
     */
    public function getContraseña()
    {
        return $this->contraseña;
    }

    /**
     * Establece la cédula del cliente.
     * 
     * @param string $cedula La cédula del cliente.
     */
    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
    }

    /**
     * Obtiene la cédula del cliente.
     * 
     * @return string La cédula del cliente.
     */
    public function getCedula()
    {
        return $this->cedula;
    }
}
