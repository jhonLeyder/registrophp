<?php

require '../funciones/consultarusuario.php' ;

$nombre = $_POST["nombreUsuario"];
$password = htmlentities(addslashes($_POST["contrasena"]));
$resultado = usuarioPorNombre(strtoupper($nombre));

$row = mysqli_fetch_row($resultado);
if ($row >= 1) {
    if (password_verify($password, $row[4])) {
        session_start();
        $_SESSION["idUsuaLoguiado"] = $row[0];
        $_SESSION["nombreUsuario"] = $row[1];
        $_SESSION["cargo"] = $row[2];
        $_SESSION["cedula"] = $row[3];
        echo 1;
    }else {
        echo "<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'>
                <strong>ERROR</strong> Contrasena Incorrecta.
                <button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }
} else {
    echo "<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'>
                <strong>ERROR</strong> Ingrese usuario y contrasena.
                <button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
}
?>