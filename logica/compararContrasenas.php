<?php 
    require '../funciones/consultarusuario.php' ;
    session_start();
    $cedula = $_SESSION["cedula"];
    $resultado = usuarioPorCedula($cedula);
    $row = mysqli_fetch_row($resultado);
    $password = htmlentities(addslashes($_POST["contrasena"]));

    if ($row >= 1) {
        if (password_verify($password, $row[4])) {
            echo 1;
        }
    }else{
        echo 0;
    }

?>