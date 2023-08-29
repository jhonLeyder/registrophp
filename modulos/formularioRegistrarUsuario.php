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
				<h1>REGISTRO USUARIO</h1>
				<hr style="width: auto;">
			</div>
			<form id="formularioRegistroUsuario">
				<div class="row">
					<div class="col-6">
						<div class="mb-3 m-1">
							<label for="primerNombre" class="form-label">Primer Nombre</label>
							<input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Nombre">
						</div>

						<div class="mb-3">
							<label for="cedulaUsuario" class="form-label">Cedula</label>
							<input type="text" class="form-control" id="cedulaUsuario" name="cedulaUsuario" placeholder="Cedula">
						</div>
					</div>

					<div class="col-6">
						<div class="mb-3 m-1">
							<label for="primerApellido" class="form-label">Primer Apellido</label>
							<input type="text" class="form-control" id="primerApellido" name="primerApellido" placeholder="Apellido">
						</div>
						<div class="mb-3">
							<label for="tipoUsuario" class="form-label">Tipo usuario</label>
							<select class="form-select" id="tipoUsuario" name="tipoUsuario">
								<option selected value=""></option>
								<option value="1">Administrador</option>
								<option value="2">Operario</option>
							</select>
						</div>
					</div>
				</div>

				<div style="margin: 10px 0 0 0;">
					<button class="btn btn-danger" type="button" onclick="registrarUsuario()"> <i class="fa fa-user"></i> Guardar Usuario</button>
				</div>
			</form>
		</div>
	</div>
</div>