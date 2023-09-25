function crearProducto(){
    let url = '../logica/registrarProducto.php';
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formularioCrearProduct").serialize(),
        success: function(response){
            if(response == "1"){
                console.log(response);
                $("#respuesta").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>EXITOSO</strong>Producto Registrado Exitosamente.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                document.getElementById("formularioCrearProduct").reset();
            }else{
                console.log(response);
                $("#respuesta").html("<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'><strong>ERROR</strong> Error No se pudo hacer el registro.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            }
        },
    });
}

function guardarCantidadProducto(idProducto){
    let cantida = parseInt(document.getElementById(`cantidaIngresar${idProducto}`).value);
    let cantidadActual = parseInt(document.getElementById(`cantidaActual${idProducto}`).value);
    if(cantida > 0){
        let url = '../logica/ingresarCantProducto.php';
        $.ajax({
            url: url,
            type:'POST',
            data: {'idProducto':idProducto,'cantidadP':cantida, 'bandera':1, 'cantidadActual':cantidadActual},
            success: function(response){
                document.getElementById(`cantidaActual${idProducto}`).value = response;
                document.getElementById(`cantidaIngresar${idProducto}`).value = '';
            },
        });
    }else{
        alert("POR FAVOR VERIFIQUE LA CANTIDAD INGRESADA");
        document.getElementById(`cantidaIngresar${idProducto}`).value = '';
    }
    
}