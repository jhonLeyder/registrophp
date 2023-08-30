<?php 
    require '../funciones/consultarusuario.php';

    $primerNombre = $_POST['primerNombre'];
    $primerApellido = $_POST['primerApellido'];
    $cedulaU = $_POST['cedulaUsuario'];
    $tipousuario = $_POST['tipoUsuario'];

    if(empty($primerNombre) || empty($primerApellido) || empty($cedulaU) || empty($tipousuario)){
        echo "<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'>
                    <strong>ERROR</strong> debes de llenar los datos.
                    <button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else{
        $usuario = usuarioPorCedula($cedulaU);
        $nombre = usuarioPorNombre("$primerNombre $primerApellido");
        if(mysqli_fetch_row($usuario) || mysqli_fetch_row($nombre)){
            echo "<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'>
                    <strong>Usuario</strong> El usuario ya se encuentra registrado.
                    <button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
        }else{
            $nombreCompleto = strtoupper("$primerNombre $primerApellido");
            $password = password_hash("$cedulaU", PASSWORD_DEFAULT);
            $datos = [$nombreCompleto, $cedulaU, $tipousuario, $password];
            echo registrarUsuario($datos);
        }
    }
?>