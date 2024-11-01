<?php

namespace src\Model;

class ColoresModel extends ModeloBase{

    private $table = "colores";
  
    public function viewCategorias($value = "",$condition = ""){
       $this->viewAll($value,$condition);
    }

    public function create(){}
    public function edit($id){}
}