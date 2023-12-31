<?php 
    //crear producto.
    function agregarProducto($datos){
        require '../db_conexion/db_usuarios.php';
        date_default_timezone_set("America/Bogota");
        $fecha = date('Y-m-d');
        $hora = date('h:i:s');
        $resultado = mysqli_query($conn, "SELECT * FROM productos where stiba = '$datos[0]' and caja ='$datos[1]' and rack = '$datos[2]' 
        and columna = '$datos[3]' and sku ='$datos[4]' and nivel='$datos[5]' and descripcion='$datos[6]' and cantidad ='$datos[7]';");
        if(mysqli_fetch_row($resultado) > 0){
            return 0;
        }else{
            $resultado = mysqli_query($conn, "INSERT INTO productos(id, stiba, caja, rack, columna, sku, nivel, descripcion, cantidad) 
            VALUES (NULL,'$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')");
            if($resultado){
                $resultado = mysqli_query($conn,'SELECT * FROM productos ORDER by ID DESC LIMIT 1');
                $row = mysqli_fetch_row($resultado);
                if($row > 0){
                    $idProducto = $row[0];
                    $resultado = registroIngresos($datos[8], $idProducto, $datos[7], '', $fecha, $hora);
                }
                return 1;
            }else{
                return 0;
            }
        }
    }

    //Trae todos los productos.
    function getProductos(){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM productos ");
        $resultado = mysqli_fetch_all($resultado);
        mysqli_close($conn);
        return $resultado;
    }

    //Trae un unico producto.
    function getProducto($id){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM productos WHERE  id = '$id'");
        $resultado = mysqli_fetch_all($resultado);
        mysqli_close($conn);
        return $resultado;
    }

    function agregarCantidadProducto($idProducto, $totalCantidad, $cantidadPtotal, $idUsuario, $cantidadPNegativo, $totalCantidadMin){
        require '../db_conexion/db_usuarios.php';
        date_default_timezone_set("America/Bogota");
        $fecha = date('Y-m-d');
        $hora = date('h:i:s');
        $resultado = mysqli_query($conn, "UPDATE productos SET cantidad = '$totalCantidad' WHERE id='$idProducto'");
        
        if($resultado){
            registroIngresos($idUsuario, $idProducto, $totalCantidadMin, $cantidadPNegativo, $fecha, $hora);
            return getProducto($idProducto);
        }
        mysqli_close($conn);
    }

    //actualiza producto
    function actualizarProducto($datos){
        require '../db_conexion/db_usuarios.php';
        $resul = mysqli_query($conn, "UPDATE productos SET stiba = '$datos[4]', caja = '$datos[5]', rack = '$datos[6]', columna = '$datos[7]', sku = '$datos[1]',
        nivel = '$datos[3]', descripcion = '$datos[2]' WHERE id='$datos[0]'");
        mysqli_close($conn);
        if($resul){
            $resultado = getProducto($datos[0]);
            return $resultado;
        }else{
            echo 0;
        }
    }

    
    //registra novedad del proseso.
    function registroIngresos($id_usuario, $id_producto, $ingreso, $salida, $fecha, $hora){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "INSERT INTO registro_ingresos(id_registro, id_usuario, id_producto, ingreso, salida, fecha, hora) 
        VALUES (NULL,'$id_usuario', '$id_producto','$ingreso', '$salida', '$fecha','$hora')");
        mysqli_close($conn);
    }
?>