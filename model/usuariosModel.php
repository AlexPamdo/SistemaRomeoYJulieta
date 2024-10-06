<?php

include_once("config/conexion.php");

class usuarios
{
    private $id;

    private $nombre;
    private $apellido;

    private $gmail;
    private $password;
    private $permisos;

    private $pregunta;

    private $res;

    private $img;

    private $conn;
    private $table = "usuarios";

    /**
     * Constructor de la clase usuarios.
     * Establece una conexión con la base de datos.
     */
    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    /**
     * Obtiene todos los usuarios junto con el nombre del rol.
     *
     * @param bool $delete La opción para mostrar los usuarios eliminados (true) o los no eliminados (false).
     * @return array|false Un array asociativo con los datos de los usuarios y sus roles si la consulta es exitosa, false en caso contrario.
     */
    public function viewAll($delete)
    {
        // Validar que $delete sea un booleano
        if (!is_bool($delete)) {
            return false; // O manejar el error de manera adecuada
        }

        // Preparar la consulta
        $query = "SELECT u.*, r.rol AS nombre_rol 
              FROM usuarios u 
              INNER JOIN roles r ON u.id_roles = r.id_roles
              WHERE u.usuario_eliminado = :delete";

        // Preparar la declaración
        $stmt = $this->conn->prepare($query);

        // Asignar el valor booleano de $delete a un parámetro
        $stmt->bindValue(':delete', $delete, PDO::PARAM_BOOL);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }


    /**
     * Busca usuarios por nombre de usuario.
     *
     * @param string $busqueda El término de búsqueda para filtrar los usuarios.
     * @return array|false Un array asociativo con los datos de los usuarios y sus roles que coinciden con la búsqueda, false en caso contrario.
     */
    public function viewSearch($busqueda)
    {
        $query = "SELECT u.*, r.rol AS nombre_rol 
    FROM usuarios u 
    INNER JOIN roles r ON u.id_roles = r.id_roles
    WHERE nombre_usuario LIKE :busqueda' ";

        $stmt = $this->conn->prepare($query);
        $busqueda = $busqueda . '%';
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_STMT);

        if ($stmt->execute()) {
            return $stmt->fetchALL(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
     * Obtiene los detalles de un usuario específico por su ID.
     *
     * @param int $id El ID del usuario a obtener.
     * @return array|false Un array asociativo con los datos del usuario si la consulta es exitosa, false en caso contrario.
     */
    public function viewOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_usuario = " . $id;
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
     * Obtiene los detalles de un usuario específico por Email.
     *
     * @param int $id El Email del usuario a obtener.
     * @return array|false Un array asociativo con los datos del usuario si la consulta es exitosa, false en caso contrario.
     */
    public function searchEmail($email)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE gmail_usuario = '" . $email . "'";
        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }

    /**
     * Crea un nuevo usuario con los datos proporcionados.
     *
     * @return bool True si el usuario se creó exitosamente, false en caso contrario.
     */
    public function create()
    {
        $query = "INSERT INTO " . $this->table . " (nombre_usuario,apellido_usuario,gmail_usuario,contraseña_usuario,id_roles,pregunta,respuesta,img_usuario) VALUES('" . $this->nombre . "','" . $this->apellido . "','" .  $this->gmail . "','" . $this->password . "','" . $this->permisos . "','" . $this->pregunta . "','" . $this->res . "','" . $this->img . "');";

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Elimina (lógicamente) un usuario específico por su ID.
     *
     * @param int $id El ID del usuario a eliminar.
     * @return bool True si el usuario se eliminó exitosamente, false en caso contrario.
     */
    public function delete($id)
    {
        $query = "UPDATE " . $this->table . " SET usuario_eliminado = TRUE WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->rowCount() > 0; // Verifica si alguna fila fue afectada
        } else {
            return false;
        }
    }

    /**
     * Restaura (lógicamente) un usuario específico por su ID.
     *
     * @param int $id El ID del usuario a restaurar
     * @return bool True si el usuario se restauro exitosamente, false en caso contrario.
     */
    public function active($id)
    {
        $query = "UPDATE " . $this->table . " SET usuario_eliminado = FALSE WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return $stmt->rowCount() > 0; // Verifica si alguna fila fue afectada
        } else {
            return false;
        }
    }



    /**
     * Actualiza los datos de un usuario específico por su ID.
     *
     * @param int $id El ID del usuario a actualizar.
     * @return bool True si el usuario se actualizó exitosamente, false en caso contrario.
     */
    public function edit($id)
    {
        $query = "UPDATE " . $this->table . " SET nombre_usuario = '" . $this->nombre . "', apellido_usuario = '" . $this->apellido . "', gmail_usuario = '" . $this->gmail . "', contraseña_usuario = '" . $this->password . "', id_roles = '" . $this->permisos . "' WHERE id_usuario = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Actualiza la contraseña de un usuario específico por su ID.
     *
     * @param int $id El ID del usuario cuya contraseña se actualizará.
     * @return bool True si la contraseña se actualizó exitosamente, false en caso contrario.
     */
    public function updatePassword($id)
    {
        $sql = "UPDATE " . $this->table . " SET contraseña_usuario = '" . $this->password . "' WHERE id_usuario = " . $id;

        if ($this->conn->exec($sql)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $nombre El nombre del usuario.
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string El nombre del usuario.
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Establece el apellido del usuario.
     *
     * @param string $apellido El apellido del usuario.
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    }

    /**
     * Obtiene el apellido del usuario.
     *
     * @return string El apellido del usuario.
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Establece el correo electrónico del usuario.
     *
     * @param string $gmail El correo electrónico del usuario.
     */
    public function setGmail($gmail)
    {
        $this->gmail = $gmail;
    }

    /**
     * Obtiene el correo electrónico del usuario.
     *
     * @return string El correo electrónico del usuario.
     */
    public function getGmail()
    {
        return $this->gmail;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $password La contraseña del usuario.
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Obtiene la contraseña del usuario.
     *
     * @return string La contraseña del usuario.
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Establece los permisos del usuario.
     *
     * @param int $permisos Los permisos del usuario.
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;
    }

    /**
     * Obtiene los permisos del usuario.
     *
     * @return int Los permisos del usuario.
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Establece la pregunta secreta del usuario.
     *
     * @param string $pregunta La pregunta secreta del usuario.
     */
    public function setpregunta($pregunta)
    {
        $this->pregunta = $pregunta;
    }

    /**
     * Obtiene la pregunta secreta del usuario.
     *
     * @return string La pregunta secreta del usuario.
     */
    public function getpregunta()
    {
        return $this->pregunta;
    }

    /**
     * Establece la respuesta a la pregunta secreta del usuario.
     *
     * @param string $res La respuesta a la pregunta secreta del usuario.
     */
    public function setres($res)
    {
        $this->res = $res;
    }

    /**
     * Obtiene la respuesta a la pregunta secreta del usuario.
     *
     * @return string La respuesta a la pregunta secreta del usuario.
     */
    public function getres()
    {
        return $this->res;
    }

    /**
     * Establece la imagen del usuario.
     *
     * @param string $img La imagen del usuario.
     */
    public function setImg($img)
    {
        $this->img = $img;
    }

    /**
     * Actualiza la imagen del usuario en la base de datos.
     *
     * @param int $id El ID del usuario cuya imagen se actualizará.
     * @return bool True si la imagen se actualizó exitosamente, false en caso contrario.
     */
    public function subirImg($id)
    {
        $query = "UPDATE " . $this->table . " SET img_usuario = '" . $this->img . "' WHERE id_usuario = " . $id;

        if ($this->conn->exec($query)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Revisa si un correo electrónico ya está registrado en la base de datos.
     *
     * @param string $correo El correo electrónico a revisar.
     * @return array|false Un array asociativo con los datos del usuario si el correo electrónico ya está registrado, false en caso contrario.
     */
    public function revisarCorreo($correo)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE gmail_usuario = '$correo'";
        $res = $this->conn->query($sql);

        if ($res) {
            return $res->fetch(PDO::FETCH_ASSOC);
        } else {
            return false;
        }
    }
}
