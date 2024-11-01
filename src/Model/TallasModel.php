<?php

namespace src\Model;


use PDO;

class TallasModel extends ModeloBase{

    private $table = "tallas";
 
    public function viewCategorias($value = "",$condition = ""){
        $this->viewAll($value,$condition);
     }

     public function create(){}
     public function edit($id){}
}