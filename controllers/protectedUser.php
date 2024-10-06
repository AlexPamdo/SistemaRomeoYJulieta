<?php

// Determinamos si el Rol es "2" (usuario normal), y si es el caso 
// redirigir al Dahsborad ya que la pagina que cuente con este 
// condigo estara protegida

if ($_SESSION['rol'] == 2 ) {
    header('Location: index.php?page=dashboard');
    exit;
}