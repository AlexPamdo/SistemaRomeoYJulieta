<?php

namespace src\Model;

use PDO;

class CategoriasPrendaModel extends ModeloBase{

    private $table = "categorias_prenda";
  
    public function viewCategorias($value = "",$condition = ""){
       $this->viewAll($value,$condition);
    }

    public function create(){}
    public function edit($id){}
}