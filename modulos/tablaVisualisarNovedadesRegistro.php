<?php
require '../componentes/nav.php';
require '../funciones/registros.php';
require '../funciones/consultarusuario.php';

?>
<div class="border border-danger border-1 m-5">
    <div class="row justify-content-center m-4">
        <div class="text-center">
            <h1>Registro de Novedades</h1>
        </div>
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
                ?>
                <tr>
                    <th><?= $value['id_registro'] ?></th>
                    <td><?= usuarioPorId($value['id_usuario']); ?></td>
                    <td>Otto</td>
                    <td><?= $value['fecha'] ?></td>
                    <td><?= $value['hora'] ?></td>
                    <td><?= $value['ingreso'] ?></td>
                    <td><?= $value['salida'] ?></td>
                </tr>
                <?php endforeach; ?>    
            </tbody>
        </table>
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