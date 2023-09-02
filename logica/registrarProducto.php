<?php 
    require '../funciones/consultarProducto.php';

    $idusuario = $_POST['idUsuario'];
    $stiba = $_POST['stiba'];
    $caja = $_POST['caja'];
    $rack = $_POST['rack'];
    $columna = $_POST['columna'];
    $sku = $_POST['sku'];
    $nivel = $_POST['nivel'];
    $cantidad = $_POST['cantidad'];
    $descripcion = $_POST['descripcion'];

    if(empty($stiba) || empty($caja) || empty($rack) || empty($columna) || empty($sku) || empty($nivel)){
        echo "<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'>
                    <strong>ERROR</strong> debes de llenar los datos.
                    <button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
    }else{
        $datos = [$stiba, $caja, $rack, $columna, $sku, $nivel, $descripcion, $cantidad, $idusuario ];
        $resultado = agregarProducto($datos);
        if($resultado == 1){
            echo 1;
        }else{
            echo $resultado;
        }
    }
?>