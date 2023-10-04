function crearProducto(){
    let url = '../logica/registrarProducto.php';
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formularioCrearProduct").serialize(),
        success: function(response){
            if(response == "1"){
                //console.log(response);
                $("#respuesta").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'><strong>EXITOSO</strong>Producto Registrado Exitosamente.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                document.getElementById("formularioCrearProduct").reset();
            }else{
                //console.log(response);
                $("#respuesta").html("<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'><strong>ERROR</strong> Error No se pudo hacer el registro.<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            }
        },
    });
}

function guardarCantidadProducto(idProducto, opcion){
    let cantida = parseInt(document.getElementById(`cantidaIngresar${idProducto}`).value);
    let cantidadActual = parseInt(document.getElementById(`cantidaActual${idProducto}`).value);
    if(opcion == 'Salida' && cantida > cantidadActual){
        alert('NO HAY INVENTARIO SUFICINTE')
        return
    }

    if(cantida > 0){
        let url = '../logica/ingresarCantProducto.php';
        $.ajax({
            url: url,
            type:'POST',
            data: {'idProducto':idProducto,'cantidadP':cantida, 'cantidadActual':cantidadActual, 'opcion': opcion},
            success: function(response){
                document.getElementById(`cantidaActual${idProducto}`).value = response;
                document.getElementById(`cantidaIngresar${idProducto}`).value = '';

                var total = 0;
                $('[id*="cantidaActual"]').each(function(){
                    total += parseFloat($(this).val());
                });
                $('#total').val(total);
            },
        });
    }else{
        alert("POR FAVOR VERIFIQUE LA CANTIDAD INGRESADA");
        document.getElementById(`cantidaIngresar${idProducto}`).value = '';
    }
    
}

function enviarDatosModalActualizar(idProducto, sku, descripcion, nivel, stiba, caja, rack, columna){
    $("#idProductoActualizar").val(idProducto);
    $("#sku").val(sku);
    $("#descripcion").val(descripcion);
    $("#nivel").val(nivel);
    $("#stiba").val(stiba);
    $("#caja").val(caja);
    $("#rack").val(rack);
    $("#columna").val(columna);
}

function actualizarProducto(){
    let url = '../logica/actualizarProducto.php';
    $.ajax({
        url: url,
        type:'POST',
        data: $("#formActualizarProducto").serialize(),
        success: function(response){
            let datos = JSON.parse(response)
            console.log(datos[0]);
            if(response == 0){                
                $("#respuestaActualizar").html("<div class='alert alert-dismissible fade show border-danger' role='alert' style='background-color: white;'>"+
                "<strong>ERROR</strong> debes de llenar los datos."+
                "<button type='button' class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
            }else{
                $("#respuestaActualizar").html("<div class='alert alert-dismissible fade show border-success' role='alert' style='background-color: white;'>"+
                "<strong>EXITOSO</strong> Datos actualizados."+
                "<button class='btn-close border-0 p-1' data-bs-dismiss='alert' aria-label='Close'></button></div>");
                location.reload();
            }
     
        },
    });
}