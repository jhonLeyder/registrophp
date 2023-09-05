
<?php
require 'header.php';
session_start();
$nombreUsuario = $_SESSION['nombreUsuario'];
if(empty($_SESSION['idUsuaLoguiado'])){ ?>
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
            <?php if($_SESSION['cargo'] == 0): ?>
                <li class="nav-item">
                    <a class="nav-link" href="../modulos/formularioRegistrarUsuario.php">Registrar Usuario</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../modulos/tablaVisualisarNovedadesRegistro.php">Novedad de registros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../modulos/tablaUsuariosR.php">Novedad de registros</a>
                </li>
            <?php endif; ?>  
                <li class="nav-item">
                    <a class="nav-link" id="linkP" href="../modulos/formularioCrearProducto.php">Crear producto</a>
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
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
