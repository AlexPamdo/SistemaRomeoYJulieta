<?php

namespace src\Model;


class GenerosModel extends ModeloBase{

    protected $tabla = "generos_prenda";
    public function viewCategorias($value = "",$condition = ""){
        $this->viewAll($value,$condition);
     }
 
     public function create(){}
     public function edit($id){}
}