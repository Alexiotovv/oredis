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
                            </div>

                            <div class="col-md-5">
                                <label class="" for="">Nombres</label>
                                <input type="text" id="nombre_socio" class="form-control" name="nombre_socio" placeholder="Nombres" />
                                <p id="nombres" style="color: red"></p> 
                            </div>
                            <div class="col-md-5">
                                <label class="" for="">Apellidos</label>
                                <input type="text" id="apellido_socio" class="form-control" name="apellido_socio" placeholder="apellidos"/>
                                <p id="apellidos" style="color: red"></p> 
                            </div>
                            <div class="col-md-4">
                                <label for="">Tipo</label>
                                <select name="tipo_socio" id="tipo_socio" class="form-select">
                                    <option value="PRESIDENTE">PRESIDENTE</option>
                                    <option value="INTEGRANTE">INTEGRANTE</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="" for="">Celular</label>
                                <input type="text" id="celular_socio" name="celular_socio" class="form-control" placeholder="999999" required />
                            </div>

                            <div class="col-md-4">
                                <label class="" for="">Correo</label>
                                <input type="email" id="correo_socio" name="correo_socio" class="form-control" placeholder="john.doe@email.com" required />
                            </div>

                            <div class="col-md-4">
                                <label for="">Tipo Discapacidad</label>
                                <select name="tipo_discapacidad" id="tipo_discapacidad" class="form-select">
                                    <option value="FISICA">FÍSICA O MOTORA</option>
                                    <option value="INTELECTUAL">INTELECTUAL</option>
                                    <option value="MENTAL">MENTAL O PSÍQUICO </option>
                                    <option value="PSCICOSOCIAL">PSICOSOCIAL</option>
                                    <option value="MULTIPLE">MÚLTIPLE</option>
                                    <option value="SENSORIAL">SENSORIAL</option>
                                    <option value="AUDITIVA">AUDITIVA</option>
                                    <option value="VISUAL">VISUAL</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>

                            {{-- <div class="col-md-4">
                                <label for="">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div> --}}
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