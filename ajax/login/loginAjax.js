function registroLogin(){
    let url = 'logica/login.php'
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formularioLogin").serialize(),
        success: function(response){
            if(response == '1'){
                location.replace('modulos/formularioCrearProducto.php');
            }else{
                $("#respuesta").html(response);
            }
        },
    });
}

function borrarSession(){
    let url = '../componentes/cerrarsesion.php';
    $.ajax({
        url: url,
        type:'POST',
        data: '',
        success: function(response){
            $("#resultado").html(response)
        },
    });
}

function compararContrasena(){
    let url = '../logica/compararContrasenas.php'
    let contrasena = $("#anterior-contrasena").val();
    console.log(contrasena);
    $.ajax({
        url: url,
        type:'POST',
        data: {contrasena},
        success: function(response){
            if(response == 1){
                $("#anterior-contrasena").css("border", "solid  #2e5e2a")
            }else if(response == 0)
                $("#anterior-contrasena").css("border", "solid red");
            else{
                $("#anterior-contrasena").css("border", "solid none");
            }
        },
    });
}


