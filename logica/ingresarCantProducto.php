<?php
    session_start();
    $idUsuaLoguiado = $_SESSION['idUsuaLoguiado'];
    require '../funciones/consultarProducto.php';

    //bandera es una variable para identificar el proceso. 1 para ingresar cantidad al inventario y 0 para sacar del inventario.
    $idProducto = $_POST['idProducto'];
    $cantidadP = $_POST['cantidadP'];
    $cantidadActual = $_POST['cantidadActual'];

    if($_POST['bandera'] == 1){
        $totalCantidad = $cantidadP + $cantidadActual;
        $resultado = agregarCantidadProducto($idProducto, $totalCantidad, $cantidadP, $idUsuaLoguiado, 0);
        echo $resultado[0][8];
    }else{

    }

?>