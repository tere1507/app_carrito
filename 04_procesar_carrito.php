<?php
require_once '01_sesiones.php';
iF($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['cesta'])) {
        $producto = $_POST['cesta'];
        $clave = key($producto);
        $precio = floatval($producto[$clave]);

        if(isset($_SESSION['cesta'][$clave])) {//acccede a la variable de sesion llamada cesta y $clave accedea al valor dentro de la sesion
            $_SESSION['cesta'][$clave]['cantidad']++;
        } else {
            $_SESSION['cesta'][$clave] = [
                'nombre' => $clave,
                'precio' => $precio,
                'cantidad' => 1
            ];
        }
    }

    //borrar la sesion 
    if(isset($_POST['borrar'])) {
        $_SESSION['cesta'] = [];
    }
}

header('Location: index.php');
exit;