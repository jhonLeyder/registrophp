<?php 
	require '../componentes/nav.php';
?>
<div class="p-5">
	<div class="row justify-content-center m-4">
		<div class="card p-5" style="width: 50rem; box-shadow: 0 50px 50px -3px rgba(0, 0, 100, 0.1), 0 4px 6px -2px rgba(184, 26, 26, 20)">
			<div>
				<div id="respuesta"></div>
			</div>
			<div class="text-center" style="margin: auto 0 20px 0;">
				<h1>Registro Producto</h1>
				<hr style="width: auto; background-color: #dc3545;">
			</div>
			<form id="formularioCrearProduct">
                <input type="text" hidden name="idUsuario" value="<?= $_SESSION['idUsuaLoguiado'] ?>">
				<div class="row">
					<div class="col-6">
						<div class="mb-3 m-1">
							<label for="stiba" class="form-label">Stiba</label>
							<input type="text" class="form-control" id="stiba" name="stiba" placeholder="Stiba">
						</div>
                        <div class="mb-3 m-1">
							<label for="caja" class="form-label">Caja</label>
							<input type="text" class="form-control" id="caja" name="caja" placeholder="Caja">
						</div>
                        <div class="mb-3 m-1">
							<label for="rack" class="form-label">Rack</label>
							<input type="text" class="form-control" id="rack" name="rack" placeholder="Rack">
						</div>						
                        <div class="mb-3 m-1">
							<label for="coloumna" class="form-label">Columna</label>
							<input type="text" class="form-control" id="columna" name="columna" placeholder="Columna">
						</div>
					</div>

					<div class="col-6">
						<div class="mb-3 m-1">
							<label for="sku" class="form-label">Sku</label>
							<input type="text" class="form-control" id="sku" name="sku" placeholder="Sku">
						</div>
                        <div class="mb-3">
							<label for="nivel" class="form-label">Nivel</label>
							<input type="text" class="form-control" id="nivel" name="nivel" placeholder="Nivel">
						</div>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
							<input type="text" class="form-control" id="cantidad" name="cantidad" placeholder="Cantidad Producto">
						</div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion o Nombre</label>
                            <textarea type="" class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion"></textarea>
                        </div>
					</div>
				</div>

				<div style="margin: 10px 0 0 0;">
					<button class="btn btn-danger" type="button" onclick="crearProducto()"><i class="fa fa-motorcycle"></i> Crear Producto</button>
				</div>
			</form>
		</div>
	</div>
</div>