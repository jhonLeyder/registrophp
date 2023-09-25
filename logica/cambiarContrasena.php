<?php 
    session_start();
    require '../funciones/consultarusuario.php' ;
    $contrasena = $_POST['nueva-contrasena'];
    $idUsuario = $_SESSION['idUsuaLoguiado'];
    $password = password_hash("$contrasena", PASSWORD_DEFAULT);
    $resultado = actualizarContrasena($password, $idUsuario);

    echo $resultado;

?>