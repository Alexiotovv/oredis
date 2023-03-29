    <div id="seleccion">
        <div class="modal fade" id="modalListarSocios" aria-hidden="true" style="z-index: 1049">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="etiquetaListarSocio">-</h5>
                        <button class="btn btn-primary btn-sm" id="btnImprimir"><i class="lni lni-printer"></i> Imprimir</button>
                        {{-- <a class="btn btn-primary" id="btnImprimir"><i class='fadeIn animated bx bx-printer'></i></a> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="">Provincia</label>
                                <input type="text" class="form-control form-control-sm" id="mdProvincia" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Distrito</label>
                                <input type="text" class="form-control form-control-sm" id="mdDistrito" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Nombre</label>
                                <input type="text" class="form-control form-control-sm" id="mdNombre" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Siglas</label>
                                <input type="text" class="form-control form-control-sm" id="mdSiglas" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">N° Partida</label>
                                <input type="text" class="form-control form-control-sm" id="mdNPartida" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Direccion</label>
                                <input type="text" class="form-control form-control-sm" id="mdDireccion" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Celular</label>
                                <input type="text" class="form-control form-control-sm" id="mdCelular" readonly>
                            </div>
                            <div class="col-sm-3">
                                <label for="">Correo</label>
                                <input type="text" class="form-control form-control-sm" id="mdCorreo" readonly>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="DTListaSocios">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>Acciones</th>
                                        <th>nombre_socio</th>
                                        <th>apellido_socio</th>
                                        <th>tipo_socio</th>
                                        <th>celular_socio</th>
                                        <th>correo_socio</th>
                                        <th>tipo_discapacidad</th>    
                                    </tr>
                                </thead>
                                <tbody>
                    
                                </tbody>
                            </table>
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
