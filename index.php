<?php require 'componentes/header.php' ?>

<div class="d-flex justify-content-center  align-content-center" style="margin-top: 12%;">
    <form class="form" id="formularioLogin">
        <div>
            <div id="respuesta"></div>
        </div>
        <p class="form-title"><img style="width: 12rem;" src="imagen/UMA-Rojo-Maria-Paula-Hernandez-Rubio.png" alt=""></p>
        <div class="input-container">
            <input type="text" placeholder="Usuario" name="nombreUsuario">
        </div>
        <div class="input-container">
            <input type="password" placeholder="Contraseña" name="contrasena">
        </div>
        <button type="button" class="submit btn" onclick="registroLogin()">INGRESAR</button>
    </form>
</div>
