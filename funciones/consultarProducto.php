<?php 

    //crear producto.
    function usuarioPorNombre($datos){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "INSERT INTO productos(id, stiba, caja, rack, columna, sku, nivel, descripcion, cantidad) 
        VALUES (NULL,'$datos[0]','$datos[1]','$datos[2]','$datos[3]','$datos[4]','$datos[5]','$datos[6]','$datos[7]')");
        return $resultado;
    }
?>