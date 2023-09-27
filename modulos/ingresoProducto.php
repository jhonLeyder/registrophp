<?php
require '../funciones/consultarProducto.php';
require '../componentes/nav.php';

$opcion = $_GET['opcion'];
?>
<div class="p-5">
    <div class="row justify-content-center m-4">
        <div class="card p-5" style="width: 100rem; box-shadow: 0 50px 50px -3px rgba(0, 0, 100, 0.1), 0 4px 6px -2px rgba(184, 26, 26, 20)">
            <div>
                <div id="respuesta"></div>
            </div>
            <div class="text-center" style="margin: auto 0 20px 0;">
                <?php if($opcion == 'Ingreso'): ?>
                    <h1><?= $opcion ?> Mercancia</h1>
                <?php elseif($opcion == 'Salida'): ?>
                    <h1><?= $opcion ?> Mercancia</h1>
                <?php endif; ?>
                <hr style="width: auto; background-color: #dc3545;">
            </div>
            <div style="width: 100%;">
                <table class="table table-bordered text-center" id="tablaProductos">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Sku</th>
                            <th>Descripcion</th>
                            <th>Nivel</th>
                            <th>Stiba</th>
                            <th>Caja</th>
                            <th>Rack</th>
                            <th>Columna</th>
                            <th style="width: 5px;">total&nbsp;pruducto</th>
                            <th> <?= $opcion == 'Ingreso'? 'Ingreso': 'Salida'?></th>
                            <th><i class="fa fa-motorcycle"></i></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $datos = getProductos();
                        foreach($datos as $key): ?>
                        <tr>
                            <input hidden type="text" value="<?= $key[0] ?>" id="idProducto">
                            <td><?= $key[5] ?></td>
                            <td><?= $key[7] ?></td>
                            <td><?= $key[6] ?></td>
                            <td><?= $key[1] ?></td>
                            <td><?= $key[2] ?></td>
                            <td><?= $key[3] ?></td>
                            <td><?= $key[4] ?></td>
                            <td>
                                <input readonly class="border-0 text-center me-0" style="outline: none; width: 100px;" type="number"
                                name="cantidaActual<?= $key[0] ?>" id="cantidaActual<?= $key[0] ?>" value="<?= $key[8] ?>">   
                            </td>
                            <td style="width: 5px;">                                
                                <input class="border-0 border-bottom border-danger text-center me-0" style="outline: none; width: 100px;" type="number"
                                name="cantidaIngresar<?= $key[0] ?>" id="cantidaIngresar<?= $key[0] ?>">                                
                            </td>

                            <?php if($opcion == 'Ingreso'): ?>
                                <td>  
                                    <button class="btn btn-danger btn-sm" type="button" onclick="guardarCantidadProducto(<?=$key[0]?>,'Ingreso')">Guardar</button>
                                </td>
                            <?php elseif($opcion == 'Salida'): ?>
                                <td>  
                                    <button class="btn btn-danger btn-sm" type="button" onclick="guardarCantidadProducto(<?=$key[0]?>,'Salida')">Guardar</button>
                                </td>
                            <?php endif; ?>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    $('#tablaProductos').DataTable( {
        dom: 'lBfrtip',
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        },
        "buttons": [ 'excel' ],
    } );
</script>