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


