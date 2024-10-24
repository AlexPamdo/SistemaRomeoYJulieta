<?php
namespace src\Model;

use src\Config\Connection;
use PDO;

class PrendasModel
{
    private $id;

    private $img;
    private $nombre;
    private $patron;
    private $categoria;
    private $talla;
    private $coleccion;
    private $color;
    private $cant;
    private $genero;

    private $precio;


    private $conn;
    private $table = "prendas";



    public function __construct()
    {
        $database = new connection;
        $this->conn = $database->getConnection();
    }

    public function viewAll($stock)
    {
        if($stock === "noStock"){
            $if = "= 0";
        }
        else{
            $if = "> 0";
        }

        $query = "SELECT 
        u.*, 
        p.nombre AS id_categoria, 
        c.color AS id_color,
        l.coleccion AS id_coleccion,
        t.cm AS id_talla,
        g.genero AS id_genero
    FROM 
        " . $this->table . " u
    INNER JOIN 
        categorias_prenda p ON u.id_categoria = p.id_categoria
    INNER JOIN 
        colores_prendas c ON u.id_color = c.id_color
    INNER JOIN 
        colecciones_prenda l ON u.id_coleccion = l.id_coleccion
    INNER JOIN 
        tallas t ON u.id_talla = t.id_talla
    INNER JOIN
        generos_prenda g on u.id_genero = g.id_genero
        WHERE stock $if;";


        $result = $this->conn->query($query);

        if ($result) {
            return $result->fetchALL(PDO::FETCH_ASSOC);
        }
    }
    public function viewOne($id)
{
    $query = "SELECT * FROM " . $this->table . " WHERE id_prenda = :id";
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else{
        return false;
    }
}
public function create()
{
    $query = "INSERT INTO " . $this->table . " (id_prenda, img_prenda, nombre_prenda, patron_prenda, id_categoria, id_color, stock, id_coleccion, id_talla, id_genero, precio_unitario) VALUES (:id, :img, :nombre, :patron, :categoria, :color, :stock, :coleccion, :talla, :genero, :precio)";

    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':img', $this->img);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':patron', $this->patron);
    $stmt->bindParam(':categoria', $this->categoria);
    $stmt->bindParam(':color', $this->color);
    $stmt->bindParam(':stock', $this->cant);
    $stmt->bindParam(':coleccion', $this->coleccion);
    $stmt->bindParam(':talla', $this->talla);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':precio', $this->precio);
    
   if($stmt->execute()){
    return true;
   }else{
    return false;
   }
}


     

public function edit($id)
{
    $query = "UPDATE " . $this->table . " SET nombre_prenda = :nombre, id_categoria = :categoria, id_color = :color, stock = :stock, id_coleccion = :coleccion, id_talla = :talla, id_genero = :genero, precio_unitario = :precio WHERE id_prenda = :id";

    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':categoria', $this->categoria);
    $stmt->bindParam(':color', $this->color);
    $stmt->bindParam(':stock', $this->cant);
    $stmt->bindParam(':coleccion', $this->coleccion);
    $stmt->bindParam(':talla', $this->talla);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':id', $id);
    
    if($stmt->execute()){
        return true;
    }else{
        return false;
    }
}


public function updateStockPrendas($id, $stock)
{
    $query = "UPDATE " . $this->table . " SET stock = stock + :stock WHERE id_prenda = :id";

    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':stock', $stock);
    $stmt->bindParam(':id', $id);
    
    if( $stmt->execute()){
        return true;
    }else{
        return false;
    }
}


    public function delete($id)
    {
        $query = "UPDATE $this->table SET eliminado = 1 WHERE id_prenda = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);

        if ( $stmt->execute() ) {
            return true;
        } else {
            return false;
        }
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setImg($img){
        $this->img = $img;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->nombre;
    }

    public function setPatron($patron){
        $this->patron = $patron;
    }
    public function setcategoria($categoria)
    {
        $this->categoria = $categoria;
    }
    public function getcategoria()
    {
        return $this->categoria;
    }
    public function setcolor($color)
    {
        $this->color = $color;
    }
    public function getcolor()
    {
        return $this->color;
    }
    public function setcant($cant)
    {
        $this->cant = $cant;
    }
    public function getcant()
    {
        return $this->cant;
    }
    public function setcoleccion($coleccion)
    {
        $this->coleccion = $coleccion;
    }
    public function getcoleccion()
    {
        return $this->coleccion;
    }

    public function settalla($talla)
    {
        $this->talla = $talla;
    }
    public function gettalla()
    {
        return $this->talla;
    }

    public function setgenero($genero)
    {
        $this->genero = $genero;
    }
    public function getgenero()
    {
        return $this->genero;
    }

    public function setprecio($precio)
    {
        $this->precio = $precio;
    }
    public function getprecio()
    {
        return $this->precio;
    }
}
