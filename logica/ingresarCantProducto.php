<?php
    session_start();
    $idUsuaLoguiado = $_SESSION['idUsuaLoguiado'];
    require '../funciones/consultarProducto.php';

    //bandera es una variable para identificar el proceso. 1 para ingresar cantidad al inventario y 0 para sacar del inventario.
    $idProducto = $_POST['idProducto'];
    $cantidadP = $_POST['cantidadP'];
    $cantidadActual = $_POST['cantidadActual'];
    $opcion = $_POST['opcion'];
    $totalCantidadMax = 0;
    $totalCantidadMin = 0;

    if($opcion == 'Ingreso'){
        $totalCantidadMax = $cantidadP;
        $totalCantidad = $cantidadP + $cantidadActual;
    }elseif($opcion == 'Salida'){
        $totalCantidadMin = $cantidadP;
        $totalCantidad = $cantidadActual - $cantidadP;
    }
    $resultado = agregarCantidadProducto($idProducto, $totalCantidad, $cantidadP, $idUsuaLoguiado, $totalCantidadMin, $totalCantidadMax );
    echo $resultado[0][8];

?>