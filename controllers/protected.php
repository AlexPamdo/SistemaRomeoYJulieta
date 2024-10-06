<?php

// Con este codigo evitamos que un usuario entre al sistema si este no se
// a loggeado 

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}