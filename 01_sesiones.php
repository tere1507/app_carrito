<?php
session_start();

if(!isset($_SESSION['cesta'])) {// si la sesion cesta no existe
    $_SESSION['cesta'] = [];//se crea la sesion cesta con un aray vacio
}
?>