 function actualizarUsuario(idUser, nombreUser, cedulaUser , cargoUser){
    $("#idUsu").val(idUser);
    $("#nombreUsu").val(nombreUser);
    $("#cedulaUsu").val(cedulaUser);
    $("#cargoUsu").val(cargoUser);
    $("#cedulaLog").val(cedulaUser);
 }


 function actualizarContrasena(){
   let url = '../logica/cambiarContrasena.php';
   let validar = $("#validarContrasena").val();
   if(validar){
      $.ajax({
         type:"POST",
         url: url,
         data: $("#formularioCambiarContrasena").serialize(),
         success: function(response){
            //console.log(response);
            $("#respuesta").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>EXITOSO</strong> Cambio de contrasena exitoso.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            document.getElementById("formularioCambiarContrasena").reset()
         }
      })
   }else{
      $("#respuesta").html("<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'><strong>ERROR</strong> Error No se pudo hacer el registro.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>")
   }
}
