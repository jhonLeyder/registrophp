<?php 

    //consulta un usuario por el nombre y devuelve todos los datos.
    function usuarioPorNombre($nombre){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE nombreUsuario ='$nombre'");
        mysqli_close($conn);
        return $resultado;
    }

    //consulta usuario por cedula
    function usuarioPorCedula($cedula){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM usuarios WHERE cedula = '$cedula'");
        mysqli_close($conn);
        return $resultado;
    }

    //registra al usuario
    function registrarUsuario($datos){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "INSERT INTO usuarios(id, nombreUsuario, cargo, cedula, contrasena) VALUES ( NULL, '$datos[0]', '$datos[2]', '$datos[1]', '$datos[3]')");
        mysqli_close($conn);
        return $resultado;
    }

    //consulta usuario por id
    function usuarioPorId($id){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT nombreUsuario FROM usuarios WHERE id = '$id'");
        $nombre = mysqli_fetch_row($resultado);
        mysqli_close($conn);
        return $nombre[0];
    }

    //TRAE TODOS LOS USUARIOS
    function consultarUsuarios(){
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "SELECT * FROM usuarios");
        $usuarios = mysqli_fetch_all($resultado);
        mysqli_close($conn);
        return $usuarios;
    }

    //TRAE TODOS LOS USUARIOS
    function actualizarDatosU($datos){
        require '../db_conexion/db_usuarios.php';
        if($datos[2] == $datos[4]){
            $res = false;
        }else {
            $res = mysqli_fetch_row(usuarioPorCedula($datos[2]));  
        }
        if(!$res){
            $resultado = mysqli_query($conn, "UPDATE usuarios SET nombreUsuario='$datos[1]', cargo='$datos[3]', cedula='$datos[2]' WHERE id= '$datos[0]'");
            mysqli_close($conn);
            return $resultado;
        }else{
            return "<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'><strong>ERROR</strong> El usuario ya esta creado.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        }
    }

    //actualiozarcontrasena del usuario con id.
    function actualizarContrasena($password, $idUsuario){
        echo $password, $idUsuario;
        require '../db_conexion/db_usuarios.php';
        $resultado = mysqli_query($conn, "UPDATE usuarios SET  contrasena='$password' WHERE id= '$idUsuario'");
        mysqli_close($conn);
        return $resultado;
    }


?>