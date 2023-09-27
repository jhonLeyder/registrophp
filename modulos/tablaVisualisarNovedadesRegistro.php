<?php
require '../componentes/nav.php';
require '../funciones/registros.php';
require '../funciones/consultarProducto.php';
require '../funciones/consultarusuario.php';

?>
<div class="m-5 p-4" class=" p-4 m-5" style="border-radius: 0.5rem;
    box-shadow: 0 50px 50px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);">
    <div class="row justify-content-center m-4">
        <div class="text-center">
            <h1>Registro de Novedades</h1>
            <hr class="border border-danger">
        </div>
        <div style="width: 90%;">
            <table class="table table-hover table-bordered text-center" id="tablaNovedades">
                <thead class="table-dark text-center">
                    <tr >
                        <th>N°</th>
                        <th>Usuario</th>
                        <th>Producto</th>
                        <th>Fecha Registro</th>
                        <th>Hora Registro</th>
                        <th>Ingreso</th>
                        <th>Salio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $datos = traerTodosReportes(); 
                    foreach($datos as $key => $value): 
                      $nombreProducto =  getProducto($value['id_producto']);
                    ?>
                    <tr>
                        <th><?= $value['id_registro'] ?></th>
                        <td><?= usuarioPorId($value['id_usuario']); ?></td>
                        <td><?=  $nombreProducto[0][7] ?></td>
                        <td><?= $value['fecha'] ?></td>
                        <td><?= $value['hora'] ?></td>
                        <td><?=  $value['ingreso'] == 0 ? ' ': $value['ingreso']; ?></td>
                        <td><?= $value['salida'] == 0 ? ' ': $value['salida']; ?></td>
                    </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#tablaNovedades').DataTable( {
        dom: 'lBfrtip',
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "buttons": [ 'excel' ],
    } );
} );
</script>