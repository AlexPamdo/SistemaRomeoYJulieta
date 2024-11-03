<?php


namespace src\Controllers;

use src\Model\UsuariosModel;


class PerfilController{
    public function show(){
        $users = new UsuariosModel();
        require_once("src/Views/Perfil.php");
    }

    
}