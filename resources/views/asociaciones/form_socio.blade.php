<form action="" id="fomrSocio">@csrf
        <div class="modal fade" id="modalSocio" aria-hidden="true" style="z-index: 1049">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="etiquetaSocio">-</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">Id</label>
                                <input type="text" class="form-control" name="IdSocio" id="IdSocio" readonly>
                                <input type="text" name="IdAsociacionSocio" id="IdAsociacionSocio" hidden>
                                <input type="text" name="iddiscapacitado" id="iddiscapacitado" hidden>
                            </div>
                            <div class="col-md-4" id="ocultar_campos">
                                
                                <label for="">Ingrese DNI</label>
                                o <span class="badge bg-warning text-dark" id="btnInfo"><a href="" id="SinDocumento">Buscar por Nombre</a></span>

                                <div class="input-group">
                                    <input type="text" class="form-control" id="dni">
                                    <button class="btn btn-primary" id="btnbuscarsocio"><i class="bx bx-search"></i></button>
                                </div>
                                <div class="text-center" id="spinner" hidden style="position: absolute;">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="">Nombre Registrado </label>
                                <input type="text" class="form-control" id="nombre" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Tipo</label>
                                <select name="tipo_socio" id="tipo_socio" class="form-select">
                                    <option value="PRESIDENTE">PRESIDENTE</option>
                                    <option value="DIRECTIVO">DIRECTIVO</option>
                                    <option value="SOCIO">SOCIO</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" id="btnGuardaSocio">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
   
</form>

@include('asociaciones.form_socio')