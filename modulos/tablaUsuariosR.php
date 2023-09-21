<?php
require '../componentes/nav.php';
require '../funciones/registros.php';
require '../funciones/consultarusuario.php';
?>
<div class=" p-4 m-5" style="border-radius: 0.5rem;
    box-shadow: 0 50px 50px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);">
    <div class="row justify-content-center m-4">
        <div class="text-center">
            <h1>Usuarios Registrados</h1>
            <hr class="border border-danger">
        </div>
        <div style="width: 90%;">
            <table class="table table-bordered text-center" id="tablaUsuarios">
                <thead class="table-dark text-center">
                    <tr >
                        <th>ID</th>
                        <th>Nombre Usuario</th>
                        <th>Cedula</th>
                        <th>Cargo</th>
                        <th>Actualizar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $datos = consultarUsuarios(); 
                    foreach($datos as $key => $value): 
                    ?>
                    <tr>
                        <th><?= $value[0] ?></th>
                        <td><?= $value[1]  ?></td>
                        <td><?= $value[3] ?></td>
                        <td> 
                        <?php if($value[2] == 0):?> 
                            <span>super admin</span>
                        <?php elseif($value[2] == 1): ?>
                            <span>administrador</span>
                        <?php elseif($value[2] == 2): ?>
                            <span>Colaborador</span>
                        <?php  endif;?>
                        </td>
                        <td><button type="button" class="border border-0 bg-white" 
                        onclick="actualizarUsuario('<?= $value[0] ?>', '<?= $value[1] ?>', '<?= $value[3] ?>', '<?=$value[2]?>')"
                        data-bs-toggle="modal" data-bs-target="#modalActualizarUsuario"><i class="fa fa-wrench fa-lg"></i></button></td>
                    </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
    require '../modales/actualizarUsuario.php';  
?>

<script>
    $('#tablaUsuarios').DataTable( {
        dom: 'lBfrtip',
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "buttons": [ 'excel' ],
    } );
</script>