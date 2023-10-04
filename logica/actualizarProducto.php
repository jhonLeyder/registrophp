<?php 

    require '../funciones/consultarProducto.php';

    if(empty($_POST["columna"]) || empty($_POST["sku"]) || empty($_POST["descripcion"]) || empty($_POST["nivel"]) || empty($_POST["stiba"]) 
    || empty($_POST["caja"]) || empty($_POST["rack"])){

        echo 0;

    }else{
        $datos[0] = $_POST["idProductoActualizar"];
        $datos[1] = $_POST["sku"];
        $datos[2] = $_POST["descripcion"];
        $datos[3] = $_POST["nivel"];
        $datos[4] = $_POST["stiba"];
        $datos[5] = $_POST["caja"];
        $datos[6] = $_POST["rack"];
        $datos[7] = $_POST["columna"];  
        $resultado = actualizarProducto($datos);
        $dato = json_encode($resultado);
        echo $dato ;
    }



?>