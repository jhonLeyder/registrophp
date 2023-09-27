function registrarUsuario(){
    let url = '../logica/registroUsuario.php';
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formularioRegistroUsuario").serialize(),
        success: function(response){
            if(response == "1"){
                $("#respuesta").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>EXITOSO</strong> Registro Exitoso.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                document.getElementById("formularioRegistroUsuario").reset();
            }else{
                $("#respuesta").html(response);
            }
        },
    });
}


function actualizarDatosUsuario(){
    let url = '../logica/actualizarUsuario.php';
    $.ajax({
        url: url,
        type:'POST',
        data: $("#actualizarDatosU").serialize(),
        success: function(response){
            console.log(response);
            if(response == '1'){
                $("#respuesta1").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>EXITOSO</strong> Registro Exitoso.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            }else{
                $("#respuesta1").html(response);
            }
        },
    });
}
