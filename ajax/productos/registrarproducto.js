function crearProducto(){
    let url = '../logica/registrarProducto.php';
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formularioCrearProduct").serialize(),
        success: function(response){
            // if(response == "1"){
                console.log(response);
                // $("#respuesta").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>EXITOSO</strong> Registro Exitoso.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                // document.getElementById("formularioCrearProduct").reset();
            // }else{
                console.log(response);
                // $("#respuesta").html(response);
            // }
        },
    });
}