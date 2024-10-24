<?php


namespace src\Controllers;

use src\Model\UsuariosModel;


class perfilController{
    public function show(){
        $users = new UsuariosModel();
        require_once("src/Views/Perfil.php");
    }
}