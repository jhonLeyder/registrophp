<?php
require 'header.php';
session_start();
$nombreUsuario = $_SESSION['nombreUsuario'];
if (empty($_SESSION['idUsuaLoguiado'])) { ?>
    <script>
        location.replace('../');
    </script>
<?php } ?>
<div id="resultado"></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark m-2 ">
    <div class="container" style="margin: 0 0 0 25px;">
        <a class="navbar" href="#" style="margin: 0;">
            <img class="p-0" src="../imagen/UMA-Rojo-Maria-Paula-Hernandez-Rubio.png" alt="..." height="50">
        </a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto position-absolute top-40 start-30">
                <?php if ($_SESSION['cargo'] == 0) : ?>
                    <li class="nav-item border-end">
                        <a class="nav-link" href="../modulos/formularioRegistrarUsuario.php">Registrar Usuario</a>
                    </li>
                <?php endif; ?>

                <?php if ($_SESSION['cargo'] == 1 || $_SESSION['cargo'] == 0) : ?>
                    <li class="nav-item border-end">
                        <a class="nav-link" href="../modulos/tablaUsuariosR.php">Usuarios Registrados</a>
                    </li>
                    <li class="nav-item border-end">
                        <a class="nav-link" href="../modulos/tablaVisualisarNovedadesRegistro.php">Novedad de Registros</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item border-end">
                    <a class="nav-link" id="linkP" href="../modulos/formularioCrearProducto.php">Crear Producto</a>
                </li>
                <li class="nav-item border-end">
                    <a class="nav-link" href="../modulos/ingresoProducto.php?opcion=Ingreso">Ingresar Producto</a>
                </li>
                <li class="nav-item border-end">
                    <a class="nav-link" href="../modulos/ingresoProducto.php?opcion=Salida">salida Producto</a>
                </li>
            </ul>
        </div>
        <div class="position-absolute top-10 end-0" style="margin: 0 50px 0 0;">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span style="font-size: 1.3rem;"><?= strtoupper($nombreUsuario) ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" onclick="borrarSession()" href="#">Salir</a></li>
                                <li><a class="dropdown-item" type="botton" data-bs-toggle="modal" data-bs-target="#cambiarContrasena">cambiar contraseña</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>


<!-- Modalactualizar usuarios -->
<div class="modal fade" id="cambiarContrasena" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div id="respuesta"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formularioCambiarContrasena">
                    <input type="boolval" hidden name="validarContrasena" id="validarContrasena">
                    <div class="form-group">
                        <label for="anterior-contrasena" class="col-form-label">Contraseña Actual:</label>
                        <input type="text" class="form-control" id="anterior-contrasena" onkeyup="compararContrasena()" >
                    </div>
                    <div class="form-group">
                        <label for="nueva-contrasena" class="col-form-label">Nueva Contraseña:</label>
                        <input type="text" class="form-control" id="nueva-contrasena" name="nueva-contrasena">
                    </div>
                    <div class="modal-footer">
                        <button id="" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" onclick="actualizarContrasena()">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>