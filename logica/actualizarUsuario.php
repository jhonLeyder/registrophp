<?php 
    require '../funciones/consultarusuario.php' ;
    
    if(empty($_POST["idUsu"]) || empty($_POST["nombreUsu"]) || empty($_POST["cedulaUsu"])){
        echo "<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>ERROR</strong> Porfavor verificar los campos.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>";
    }else{
        $datos[] = $_POST["idUsu"];
        $datos[] = $_POST["nombreUsu"];
        $datos[] = $_POST["cedulaUsu"];
        $datos[] = $_POST["cargoUsu"];
        echo actualizarDatosU($datos);   
    }
    


?>
