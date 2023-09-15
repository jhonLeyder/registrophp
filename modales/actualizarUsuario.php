<!-- Modalactualizar usuarios -->

<div class="modal fade" id="modalActualizarUsuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div id="respuesta"></div>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Actualizar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="actualizarDatosU">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div>
                                <label for="recipient-name" class="col-form-label">ID:</label>
                                <input readonly class="form-control form-control-sm" type="text" id="idUsu" name="idUsu" placeholder=".form-control-lg" aria-label=".form-control-lg example">
                            </div>
                            <div>
                                <label for="recipient-name" class="col-form-label">Cargo:</label>
                                <select class="form-select form-select-sm" aria-label="Default select " id="cargoUsu" name="cargoUsu">
                                    <option value="0">administrador</option>
                                    <option value="1">Colaborador</option>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="actualizarDatosUsuario()">Actualizar</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>