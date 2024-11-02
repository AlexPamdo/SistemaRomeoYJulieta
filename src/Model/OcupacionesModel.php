<?php

namespace src\Model;

class OcupacionesModel extends ModeloBase{

    protected $tabla = "ocupaciones";
    public function viewCategorias($value = "",$condition = ""){
        $this->viewAll($value,$condition);
     }

     public function create(){}
     public function edit($id){}
}