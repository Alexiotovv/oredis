    <div id="seleccion">
        <div class="modal fade" id="modalListarSocios" aria-hidden="true" style="z-index: 1049">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="etiquetaListarSocio">-</h5>
                        {{-- <a class="btn btn-primary" id="btnImprimir"><i class='fadeIn animated bx bx-printer'></i></a> --}}
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for=""></label>
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
