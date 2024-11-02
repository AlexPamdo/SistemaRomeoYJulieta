<?php

namespace src\Model;

class TiposMaterialModel extends ModeloBase{

    protected $tabla = "tipos_materiales";
    public function viewCategorias($value = "",$condition = ""){
        $this->viewAll($value,$condition);
     }

     public function create(){}
     public function edit($id){}
}