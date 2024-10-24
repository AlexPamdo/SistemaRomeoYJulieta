<?php

namespace src\Controllers;

use Interfaces\CrudController;

class EnviosController implements CrudController{
    public function show(){
        require_once("src/Views/Envios.php");
    }
    public function create(){

    }
    public function delete(){

    }
    public function edit(){

    }
}