<?php

namespace src\Model;

class ColeccionesModel extends ModeloBase{

    protected $tabla = "colecciones_prenda";
    public function viewCategorias($value = "",$condition = ""){
        $this->viewAll($value,$condition);
     }
 
     public function create(){}
     public function edit($id){}
}