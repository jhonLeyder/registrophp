<?php 

    //consulta un usuario por el nombre y devuelve todos los datos.
    function usuarioPorNombre($nombre){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE nombreUsuario ='$nombre'");
        return $resultado;
    }

    //consulta usuario por cedula
    function usuarioPorCedula($cedula){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE cedula = '$cedula'");
        return $resultado;
    }

    //registra al usuario
    function registrarUsuario($datos){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "INSERT INTO usuarios(id, nombreUsuario, cargo, cedula, contrasena) VALUES ( NULL, '$datos[0]', '$datos[2]', '$datos[1]', '$datos[3]')");
        return $resultado;
    }



?>