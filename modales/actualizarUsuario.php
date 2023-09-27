<!-- Modal actualizar usuarios -->
<div class="modal fade" id="modalActualizarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Usuario</h5>
            </div>
            <div class="modal-body">
                <form id="actualizarDatosU">
                    <input type="text" hidden name="cedulaLog" id="cedulaLog">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div>
                                <label for="recipient-name" class="col-form-label">ID:</label>
                                <input readonly class="form-control form-control-sm" type="text" id="idUsu" name="idUsu" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                            </div>
                            <div>
                                <label for="recipient-name" class="col-form-label">Cargo:</label>
                                <select class="form-select form-select-sm" aria-label="Default select " id="cargoUsu" name="cargoUsu">
                                    <option value="1">administrador</option>
                                    <option value="2">Colaborador</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div>
                                <label for="recipient-name" class="col-form-label">Nombre Usuario:</label>
                                <input class="form-control form-control-sm" type="text" placeholder=".form-control-lg" id="nombreUsu" name="nombreUsu" aria-label=".form-control-lg example">
                            </div>
                            <div>
                                <label for="recipient-name" class="col-form-label">Cedula:</label>
                                <input class="form-control form-control-sm" type="text" placeholder=".form-control-lg" id="cedulaUsu" name="cedulaUsu" aria-label=".form-control-lg example">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" onclick="actualizarDatosUsuario()">Actualizar</button>
                        </div>
                </form>
                <div id="respuesta1"></div>
            </div>
        </div>
    </div>
</div>
