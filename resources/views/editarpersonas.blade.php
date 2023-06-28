@extends('layouts.panel')


@section('extra_css')
    
@endsection

@section('content')
    <form id="formActualiza">@csrf
        {{--  --}}
        <h1 class="h3">Actualizar Formulario de Registro</h1>
        <p class="lead">
            Sirvase a llenar el siguiente formulario para su actualización
        </p>
        <hr>
        
        <section data-step="1. Informacion personal">
            <div class="row">
                <h5>Personal</h5>
                <div class="col-md-2">
                    <input type="text" id="idPersona" name="idPersona" hidden>
                    <label class="form-label" for="doc_identidad">D. de identidad</label>
                    <select class="form-select" aria-label="Default select example" name="doc_identidad" required>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="nro_doc_identidad">Ingrese N° Documento</label>
                    o <span class="badge bg-warning text-dark" id="btnInfo"><a href="" id="SinDocumento"> Buscar por Nombre</a></span>
                    <div class="input-group lg-3">
                        <input class="form-control" type="text" name="nro_doc_identidad" id="nro_doc_identidad"
                            placeholder="Nro de documento..." required>
                        <button type="button" class="btn btn-primary" id="btnBuscarEditar" ><i
                                class="lni lni-search"></i>Buscar</button>

                        <div class="text-center" id="spinner_editar" hidden>
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div id="dni_encontrado" class="valid-feedback">
                            DNI encontrado.
                        </div>
                        <div id="dni_noencontrado" class="invalid-feedback">
                            NO se encontró DNI.
                        </div>
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="Nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre..." id="nombres"
                        readonly required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="apellido_paterno">Apellido paterno</label>
                    <input class="form-control" type="text" name="apellido_paterno" id="apellido_paterno"
                        placeholder="Apellido paterno..." readonly required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="apellido_materno">Apellido materno</label>
                    <input class="form-control" type="text" name="apellido_materno" id="apellido_materno"
                        placeholder="Apellido paterno..." readonly required>
                </div>
                
                <div class="col-md-4">
                    <label class="form-label" for="correo">Correo</label>
                    <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo...">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="telefono">teléfono</label>
                    <input class="form-control" maxlength="12" type="number" name="telefono" id="telefono" placeholder="Teléfono...">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="estado_civil">Estado civil</label>
                    <select class="form-select" aria-label="Default select example" name="estado_civil" id="estado_civil">
                        <option value="--">--</option>
                        <option value="SOLTERO">SOLTERO</option>
                        <option value="CASADO">CASADO</option>
                        <option value="VIUDO">VIUDO</option>
                        <option value="DIVORCIADO">DIVORCIADO</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label" for="sexo">Sexo</label>
                    <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">
                        <option value="--">--</option>
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fecha_nacimiento">Fech. Nac.</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
                    <br>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="seguro_salud">¿Cuenta con seguro de salud?</label>
                    <br>
                    <div class="form-check">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="seguro_salud" id="seguro_saludRadio1"
                                value="SI" checked>
                            <label class="form-check-label" for="inlineRadio1">SÍ</label>
                        </div>
                        
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="seguro_salud" id="seguro_saludRadio2"
                                value="NO">
                            <label class="form-check-label" for="inlineRadio2">NO</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="tipo_seguro">Tipo de seguro</label>
                    <select class="form-select" aria-label="Default select example" name="tipo_seguro" id="tipo_seguro">
                        <option selected value="--">--</option>
                        <option value="SIS">SIS</option>
                        <option value="ESSALUD">EsSalud</option>
                        <option value="EPS">Empresas prestadoras de Salud(EPS)</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>

                <hr>
                <div class="row">
                    <div class="col-md-3">
                        <h5>Domicilios Asignados</h5>
                    </div>

                    <div class="col-md-4">
                        <button class="btn btn-success" id="btnNuevaDireccion"><i class="fadeIn animated bx bx-street-view"></i>Agregar Dirección</button>
                        <div class="spinner-border" role="status" id="spinnerDireccion" hidden>
                        </div>
                    </div>

                </div>
                
                <table class="table table-stripped" id="DTDirecciones">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Acción</th>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Dirección</th>
                            <th>Número</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>


        </section>
        <hr>
        <section data-step="2. Datos de trabajo">
            <div class="row">
                <h5>Laboral</h5>
                <div class="col-md-6">
                    <label class="form-label" for="ocupacion">Ocupación</label>
                    <input class="form-control" type="text" name="ocupacion" id="ocupacion"
                        placeholder="Ocupación...">
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="Grado de instrucción">Grado de instrucción</label>
                    <select class="form-select" aria-label="Default select example" name="grado_instruccion" id="grado_instruccion">
                        <option value="--">--</option>
                        <option value="SIN ESTUDIOS">SIN ESTUDIOS</option>
                        <option value="PRIMARIA">PRIMARIA</option>
                        <option value="SECUNDARIA">SECUNDARIA</option>
                        <option value="TECNICO">TECNICO</option>
                        <option value="TECNICO SUPERIOR">TÉCNICO SUPERIOR</option>
                        <option value="EGRESADO UNIVERSITARIO">EGRESADO UNIVERSITARIO</option>
                        <option value="PROFESIONAL UNIVERSITARIO TITULADO">PROFESIONAL TITULADO</option>
                        <option value="POSTGRADO">ESTUDIOS DE POSTGRADO</option>
                        <option value="OTRO">OTRO</option>

                    </select>
                </div>
            </div>
           
        </section>
        <hr>
        <section data-step="3. Datos personales">
            <div class="row">
                <h5>Condición</h5>
                <div class="col-md-3">
                    <label class="form-label" for="flag_certifi_discapacidad">¿Cuenta con certificado de
                        discapacidad?</label>
                    <select class="form-select" aria-label="Default select example" name="flag_certifi_discapacidad" id="flag_certifi_discapacidad">
                        <option value="--" selected>--</option>
                        <option value="SI">SÍ</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-md-2" style="text-align: center">
                    <label class="form-label">Estado Carnet</label>
                    <br>
                    <a  id="EstadoCarnet">--</a>
                    
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="fecha_caducidad_carnet">Fech. Caducidad. Cert. Discapacidad</label>
                    <input class="form-control" type="date" name="fecha_caducidad_carnet" id="fecha_caducidad_carnet" placeholder="Fecha Caducidad">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="flg_carnet_did bigint">Nro de D.I.D</label>
                    <input class="form-control" type="number" name="flg_carnet_did" id="flg_carnet_did" placeholder="Nro de D.I.D...">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label" for="tipo_discapacidad">Tipo de discapacidad</label>
                    <select class="form-select" aria-label="Default select example" name="tipo_discapacidad" id="tipo_discapacidad">
                        <option value="--" selected>--</option>
                        <option value="FISICA">FÍSICA O MOTORA</option>
                        <option value="INTELECTUAL">INTELECTUAL</option>
                        <option value="MENTAL">MENTAL O PSÍQUICO </option>
                        <option value="PSCICOSOCIAL">PSICOSOCIAL</option>
                        <option value="MULTIPLE">MÚLTIPLE</option>
                        <option value="SENSORIAL">SENSORIAL</option>
                        <option value="AUDITIVA">AUDITIVA</option>
                        <option value="VISUAL">VISUAL</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="diagnostico_discapacidad">Diagnostico de
                        discapacidad</label>
                    <select class="form-select" aria-label="Default select example" name="diagnostico_discapacidad" id="diagnostico_discapacidad" required>
                        <option value="--" selected>--</option>
                        <option value="LEVE">LEVE</option>
                        <option value="MODERADO">MODERADO</option>
                        <option value="SEVERO">SEVERO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <br>
                    <label class="form-label" for="requiere_ayuda">¿Requiere ayuda para
                        Movilizarse?</label>
                    <div class="form-check form-check-inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="requiere_ayuda"
                                id="requiere_ayudaRadio1" value="SI" checked>
                            <label class="form-check-label" for="inlineRadio1">SÍ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="requiere_ayuda"
                                id="requiere_ayudaRadio2" value="NO">
                            <label class="form-check-label" for="inlineRadio2">NO</label>
                        </div>
                    </div>

                </div>

                <div class="col-md-4">
                    <br>
                    <label class="form-label" for="tipo_ayuda">¿Qué tipo de ayuda necesita?</label>
                    <div class="form-check form-check-inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_ayuda" id="tipo_ayudaRadio1"
                                value="FISICA">
                            <label class="form-check-label" for="inlineRadio1">FÍSICA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_ayuda" id="tipo_ayudaRadio2"
                                value="MECANICA" checked>
                            <label class="form-check-label" for="inlineRadio2">MECÁNICA</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" id="seleccione_equipo">
                    <label class="form-label" for="ayuda_mecanica">Seleccione el equipo</label>
                    <select class="form-select" aria-label="Default select example" name="ayuda_mecanica" id="ayuda_mecanica" required>
                        <option value ="--" selected>--</option>
                        <option value="SILLA DE RUEDAS">SILLA DE RUEDAS</option>
                        <option value="BASTONES ORTOPEDICOS">BASTONES ORTOPÉDICOS</option>
                        <option value="MULETAS">MULETAS</option>
                        <option value="ANDADORES">ANDADORES</option>
                        <option value="OTROS">OTROS</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Apoderados</h5>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-warning" id="btnNuevoApoderado"><i class="fadeIn animated bx bx-user-plus"></i>Nuevo Apoderado</button>
                        <div class="text-center" id="spinner_guardar_apoderado" hidden>
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-stripped" id="DTApoderados">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Acción</th>
                                <th>dni</th>
                                <th>nombre</th>
                                <th>apellidos</th>
                                <th>dirección</th>
                                <th>parentesco</th>
                                <th>correo</th>
                                <th>telefono</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
    
                        </tbody>
                    </table>

                    <label for="" style="color:orange">Se recomienda que solo un apoderado esté con status: Activo(1)</label>
                </div>


                
                <hr>
                <div class="col-md-4">
                    <label class="form-label" for="fecha_empadronamiento">fecha de empadronamiento</label>
                    <input class="form-control" type="date" name="fecha_empadronamiento" id="fecha_empadronamiento"
                        placeholder="Fecha empadronamiento...">
                </div>
                
                <div class="col-md-4">
                    <label class="form-label" for="fecha_empadronamiento">Comentario</label>
                    <textarea class="form-control" type="date" name="comentario"
                        id="comentario" placeholder="escribre un comentario" maxlength="249"></textarea>
                </div>
            </div>


            <div class="row" style="padding-top: 30px;">

                <div class="col-6 text-right">
                    <button class="btn btn-primary" id="btnEnviar"><i
                            class="lni lni-telegram-original"></i> Enviar</button>
                </div>
            </div>
        </section>

    </form>
    
    <form id="formDirecciones">@csrf
        <!-- Modal -->
        <div class="modal fade" id="modalDirecciones" tabindex="-1" aria-hidden="true" style="z-index: 1049">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="etiquetaDirecciones">-</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="idPersonaDireccion" name="idPersonaDireccion" hidden>
                        <input type="text" id="idDireccion" name="idDireccion" hidden>
                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label" for="provincia">Provincia</label>
                                <select class="form-select" aria-label="Default select example" name="provincia" id="provincia" disabled>
                                    <option value="--">--</option>
                                    @foreach ($provincias as $prov )
                                        <option value="{{$prov->provincia}}">{{$prov->provincia}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="distrito">Distrito</label>
                                <select class="single-select" aria-label="Default select example" name="distrito" id="distrito">
                                    <option value="--">--</option>
                                    @foreach ($distritos as $dist )
                                        <option value="{{$dist->id}}">{{$dist->ubigeo_distrito}}-{{$dist->distrito}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="direccion">Dirección</label>
                                <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direción..." required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="numero">Número</label>
                                <input class="form-control" type="text" name="numero" id="numero" placeholder="Número..." required>
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="activo">Activo</label>
                                <select name="activo" id="activo" class="form-select">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnGuardarDireccion">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

     
    <form id="formApoderados">@csrf
        <!-- Modal -->
        <div class="modal fade" id="modalApoderados" tabindex="-1" aria-hidden="true" style="z-index: 1049">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="etiquetaApoderados">-</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="idPersonaApoderado" name="idPersonaApoderado" hidden>
                        <input type="text" id="idApoderado" name="idApoderado" hidden>
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group lg-3">
                                    <label class="form-label" for="dni_apoderado">Nro Doc.</label>
                                    <br>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="IngresoManualApoderado">
                                        <label class="form-check-label" for="IngresoManualApoderado">Ingreso Manual</label>
                                    </div>
                                </div>
                                <div class="input-group lg-3">
                                    <input class="form-control" type="text" name="dni_apoderado" id="dni_apoderado"
                                        placeholder="Nro de documento..." required>
                                    <button type="button" class="btn btn-primary" name="btnBuscarApoderado" id="btnBuscarApoderado"
                                        disabled><i class="lni lni-search"></i>Buscar</button>
            
                                    <div class="text-center" id="spinner_apoderado" hidden>
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="nombre_apoderado">Nombres</label>
                                <input class="form-control" type="text" name="nombre_apoderado" id="nombre_apoderado"
                                    placeholder="Nombre de apoderado..." readonly required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label" for="nombre_apoderado">Apellidos</label>
                                <input class="form-control" type="text" name="apellido_apoderado" id="apellido_apoderado"
                                    placeholder="Nombre de apoderado..." readonly required>
                            </div>
            
                            <div class="col-md-4">
                                <label class="form-label" for="direccion_apoderado">Dirección de apoderado</label>
                                <input class="form-control" type="text" name="direccion_apoderado" id="direccion_apoderado"
                                    placeholder="Dirección de apoderado...">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="parentesco">Parentesco de Apoderado</label>
                                <select class="form-select" aria-label="Default select example" name="parentesco" id="parentesco" required>
                                    <option value="--" selected>--</option>
                                    <option value="PADRE">PADRE</option>
                                    <option value="MADRE">MADRE</option>
                                    <option value="TIO">TIO(a)</option>
                                    <option value="PRIMO">PRIMO(A)</option>
                                    <option value="SORBINO">SOBRINO(A)</option>
                                    <option value="OTRO">OTRO</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="correo_apoderado">Correo apoderado</label>
                                <input class="form-control" type="email" name="correo_apoderado" id="correo_apoderado"
                                    placeholder="Correo de apoderado...">
                            </div>

                            <div class="col-md-4">
                                <label class="form-label" for="telefono_apoderado">Teléfono apoderado</label>
                                <input class="form-control" type="number" name="telefono_apoderado" id="telefono_apoderado" placeholder="Teléfono de apoderado...">
                                <br>
                            </div>

                            <div class="col-md-4">
                                <label for="status" class="form-label" >Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btnGuardarApoderado">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>




    @include('discapacitados.form_buscardiscapacitados')
@endsection

@section('extra_js')

    <script src="app_js/crud.js"></script>
    <script src="app_js/editarregistro.js"></script>
    
    <script>
        $('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
    </script>
@endsection
