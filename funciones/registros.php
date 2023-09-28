<?php 

function traerTodosReportes(){
    require '../db_conexion/db_usuarios.php';
    $resultado = mysqli_query($conn,'SELECT * FROM registro_ingresos ORDER BY id_registro DESC');
    mysqli_close($conn);
    return $resultado;
}

?>