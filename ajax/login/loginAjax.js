function registroLogin(){
    let url = 'logica/login.php'
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formularioLogin").serialize(),
        success: function(response){
            if(response == '1'){
                location.replace('modulos/formularioRegistrarUsuario.php');
            }else{
                $("#respuesta").html(response);
            }
        },
    });
}

