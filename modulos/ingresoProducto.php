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
                            <?php if ($_SESSION['cargo'] == 0):?>
                            <th>Eliminar Pro.</th>
                            <?php endif?>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                        $datos = getProductos();
                        $contador = 0;
                        foreach($datos as $key):
                            $contador = $key[8] + $contador;
                            $id = $key[0] 
                        ?>
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
                                <input readonly class="border-0 text-center me-0 monto" style="outline: none; width: 100px;" type="number"
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

                            <?php if ($_SESSION['cargo'] == 0):?>
                                <td>
                                    <button class="btn btn-danger btn-sm" type="button" 
                                    onclick="enviarDatosModalActualizar('<?=$key[0]?>', '<?=$key[5]?>','<?=$key[7]?>','<?=$key[6]?>','<?=$key[1]?>', '<?=$key[2]?>', '<?=$key[3]?>', '<?=$key[4]?>')"
                                    data-bs-toggle="modal" data-bs-target="#modalActualizarProducto">Actualizar</button>
                                </td>
                            <?php endif?>

                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div>
                <label style="font-weight: 800; font-size:large;">Total de Inventario:</label>
                <input readonly type="text" style="font-weight: 500; outline: none;" class="text-center border-0 border-bottom" id="total" value="<?=  $contador ?>">
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

<!-- Modal actualizar Producto -->
<div class="modal fade" id="modalActualizarProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Producto</h5>
            </div>
            <div id="respuestaActualizar"></div>
            <div class="modal-body">
            <form id="formActualizarProducto">
                <input type="text" hidden name="idUsuario" value="<?= $_SESSION['idUsuaLoguiado'] ?>">
                <input type="text" hidden name="idProductoActualizar" id="idProductoActualizar">
				<div class="row">
					<div class="col-6">
						<div class="mb-3 m-1">
							<label for="stiba" class="form-label">Stiba</label>
							<input type="text" class="form-control" id="stiba" name="stiba">
						</div>
                        <div class="mb-3 m-1">
							<label for="caja" class="form-label">Caja</label>
							<input type="text" class="form-control" id="caja" name="caja">
						</div>
                        <div class="mb-3 m-1">
							<label for="rack" class="form-label">Rack</label>
							<input type="text" class="form-control" id="rack" name="rack" >
						</div>						
                        <div class="mb-3 m-1">
							<label for="coloumna" class="form-label">Columna</label>
							<input type="text" class="form-control" id="columna" name="columna">
						</div>
					</div>

					<div class="col-6">
						<div class="mb-3 m-1">
							<label for="sku" class="form-label">Sku</label>
							<input type="text" class="form-control" id="sku" name="sku">
						</div>
                        <div class="mb-3">
							<label for="nivel" class="form-label">Nivel</label>
							<input type="text" class="form-control" id="nivel" name="nivel">
						</div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion o Nombre</label>
                            <textarea type="" class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>
					</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cerrar</button>
                    <div style="margin: 10px 0 0 0;">
                        <button class="btn btn-danger" type="button" onclick="actualizarProducto()"><i class="fa fa-motorcycle"></i> Actualizar Producto</button>
                    </div>
                </div>
			</form>
                <div id="respuesta1"></div>
            </div>
        </div>
    </div>
</div>
