<form action="" id="formAsociacion">@csrf
    <div class="modal fade" id="modalAsociacion" aria-hidden="true" style="z-index: 1049">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="etiquetaAsociacion">-</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" id="idAsociacion" name="idAsociacion" hidden>
                        <div class="col-md-4">
                            <label class="" for="">Provincia</label>
                            <select name="provincia" id="provincia" class="form-select" disabled>
                                <option value="--">--</option>
                                @foreach ($provincia as $prov)
                                    <option value="{{$prov->provincia}}">{{$prov->provincia}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="col-md-4">
                            <label class="" for="">Distrito</label>
                            <select name="distrito" id="distrito" class="single-select">
                                <option value="--">--</option>
                                @foreach ($distrito as $dist)
                                    <option value="{{$dist->id}}">{{$dist->distrito}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="">Nombre de Organización</label>
                            <input type="text" class="form-control" id="nombre_organizacion" name="nombre_organizacion">
                        </div>
                        <div class="col-md-4">
                            <label for="">Siglas de Organización</label>
                            <input type="text" class="form-control" id="siglas_asociacion" name="siglas_asociacion">
                        </div>
                        <div class="col-md-4">
                            <label for="">N° Partida Registral</label>
                            <input type="text" class="form-control" id="partida_registral" name="partida_registral">
                        </div>
                        <div class="col-md-4">
                            <label for="">Direccion</label>
                            <input type="text" class="form-control" id="direccion" name="direccion">
                        </div>
                        <div class="col-md-4">
                            <label for="">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular">
                        </div>
                        <div class="col-md-4">
                            <label for="">Correo</label>
                            <input type="text" class="form-control" id="correo" name="correo">
                        </div>
                        

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-primary" id="btnGuardarAsociacion">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>
