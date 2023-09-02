<?php
require '../componentes/nav.php';
require '../funciones/registros.php';
?>
<div class="border border-danger border-1 m-5">
    <div class="row justify-content-center m-4">
        <table class="table table-bordered table-sm">
            <thead class="table-dark">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col">Salio</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>

                <?php 
                $datos = traerTodosReportes(); 
                foreach($datos as $key => $value): ?>
                <tr>
                    <th><?= $value['id_registro'] ?></th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td><button class="btn "><i class="fa fa-eye fa-lg link" style="color: #e00000;"></i></button> </td>
                <?php endforeach; ?>    
                </tr>
            </tbody>
        </table>
    </div>
</div>