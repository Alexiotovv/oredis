@extends('layouts.panel')

@section('content')

<h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Formulario de Registro</a></h5>

    <form id="formRegistro">@csrf 
       
        <h1 class="h3">Formulario de Registro</h1>
        <p class="lead">
            Sirvase a llenar el siguiente formulario para su inscripcion
        </p>
        <hr>

        <div class="card" id="cardInfo" style="position: absolute;right: 2px;margin-right: -410px;
        width:400px;transition-duration: 500ms;margin-top:-150px;z-index:10">
            <div class="card-header" style="background-color: #e9ecef">
                <h5>Datos</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <strong>Inf. Personal</strong>
                    <div class="col-sm-6">
                        <label for="">DNI</label>
                        <input type="text" value="" class="form-control form-control-sm" id="findDNI" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Nombre</label>
                        <input type="text" value="" class="form-control form-control-sm" id="findNombre" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Apellido Paterno</label>
                        <input type="text" value="" class="form-control form-control-sm" id="findPaterno" readonly>        
                    </div>
                    <div class="col-sm-6">
                        <label for="">Apellido Materno</label>
                        <input type="text" value="" class="form-control form-control-sm" id="findMaterno" readonly>        
                        
                    </div>
                    
                    <strong style="margin-top: 10px;">Domicilios Consignados</strong>
                    <table class="table table-striped table-hover" id="DTDomicilios">
                        <thead>
                            <tr>
                                <th>Provincia</th>
                                <th>Distrito</th>
                                <th>Dirección</th>
                                <th>Activo</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>

                </div>

                
            </div>
            <div class="card-footer">
                <a class="btn btn-secondary btn-sm" id="btnCerrarCard">Cerrar</a>
                <a href="" class="btn btn-warning btn-sm" id="btnInformacionCompleta"><i class="lni lni-eye"></i> Ver información Completa</a>
            </div>
        </div>

        <section data-step="1. Informacion personal">
            <div class="row">
                <h5>Personal</h5>
                <div class="col-md-2">
                    <label class="form-label" for="doc_identidad">D. de identidad</label>
                    <select class="form-select" aria-label="Default select example" name="doc_identidad"
                        required>
                        <option value="DNI">DNI</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="nro_doc_identidad">Nro de documento</label>
                    <div class="input-group lg-3">
                        {{-- <input type="text" class="form-control" id="validationServer03" name="nro_doc_identidad" aria-describedby="validationServer03Feedback" required> --}}
                        <input type="text" class="form-control" id="nro_doc_identidad" name="nro_doc_identidad"  required>
                        <button type="button" class="btn btn-primary" name="btnBuscar" id="btnBuscar"
                            disabled><i class="lni lni-search"></i>Buscar</button>
                            <div id="nro_doc_identidad" class="invalid-feedback">
                            DNI ya se encuentra registrado.
                                <span class="badge bg-warning text-dark" id="btnInfo"><a href="#" id="btnVerInfo">Click para ver Info</a></span>
                            </div>
                            
                        <div class="text-center" id="spinner" hidden>
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <div class="col-md-6">
                    <label class="form-label" for="Nombre">Nombre</label>
                    <input class="form-control" type="text" name="nombres" placeholder="Nombre..."
                        id="nombres" readonly required>
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
           
                <div class="col-md-3">
                    <label class="form-label" for="correo">Correo</label>
                    <input class="form-control" type="email" name="correo" id="correo" placeholder="Correo...">
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="telefono">teléfono</label>
                    <input class="form-control" maxlength="12" type="number" id="telefono" name="telefono"
                        placeholder="Teléfono..." required>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="estado_civil">Estado civil</label>
                    <select class="form-select" aria-label="Default select example" name="estado_civil">
                        <option value="SOLTERO">SOLTERO(A)</option>
                        <option value="CASADO">CASADO(A)</option>
                        <option value="VIUDO">VIUDO(A)</option>
                        <option value="DIVORCIADO">DIVORCIADO(A)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="sexo">Sexo</label>
                    <select class="form-select" aria-label="Default select example" name="sexo">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fecha_nacimiento">Fech. Nac.</label>
                    <input type="date" class="form-control" name="fecha_nacimiento"
                        id="fecha_nacimiento">
                        <br>
                </div>
                
                <hr>
                <h5>Domicilio</h5>
                <div class="col-md-3">
                    <label class="form-label" for="provincia">Provincia</label>
                    <select class="form-select" aria-label="Default select example" name="provincia" id="provincia" disabled>
                        @foreach ($provincias as $prov )
                            <option value="{{$prov->provincia}}">{{$prov->provincia}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="distrito">Distrito</label>
                    <select class="form-select" aria-label="Default select example" name="distrito" id="distrito">
                      @foreach ($distritos as $dist)
                        <option value="{{$dist->id}}">{{$dist->ubigeo_distrito}}-{{$dist->distrito}}</option>
                      @endforeach
                        
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="direccion">Dirección</label>
                    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direción..." required>
                </div>
                <div class="col-md-2">
                    <label class="form-label" for="direccion">Número</label>
                    <input class="form-control" type="text" name="numero" id="numero" placeholder="Número..." required>
                </div>
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
                    <select class="form-select" aria-label="Default select example"
                        name="grado_instruccion">
                        <option value="PRIMARIA">PRIMARIA</option>
                        <option value="SECUNDARIA">SECUNDARIA</option>
                        <option value="TECNICO">TECNICO</option>
                        <option value="TECNICO SUPERIOR">TÉCNICO SUPERIOR</option>
                        <option value="EGRESADO UNIVERSITARIO">EGRESADO UNIVERSITARIO</option>
                        <option value="PROFESIONAL UNIVERSITARIO TITULADO">PROFESIONAL TITULADO</option>
                        <option value="POSTGRADO">ESTUDIOS DE POSTGRADO</option>
                    </select>
                </div>
            </div>

        </section>
        <hr>
        <section data-step="3. Datos personales">
            
            <div class="row">
                
                <h5>Condición</h5>
                <div class="col-md-4">
                    <label class="form-label" for="flag_certifi_discapacidad">¿Cuenta con certificado de
                        discapacidad?</label>
                    <select class="form-select" aria-label="Default select example"
                        name="flag_certifi_discapacidad">
                        <option value="SI" selected>SÍ</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    
                    <label class="form-label" for="tipo_discapacidad">Tipo de discapacidad</label>
                    <select class="form-select" aria-label="Default select example"
                        name="tipo_discapacidad">
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
                <div class="col-md-4">
                    
                    <label class="form-label" for="diagnostico_discapacidad">Diagnostico de
                        discapacidad</label>
                    <select class="form-select" aria-label="Default select example"
                        name="diagnostico_discapacidad">
                        <option value="LEVE">LEVE</option>
                        <option value="MODERADO">MODERADO</option>
                        <option value="SEVERO">SEVERO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="requiere_ayuda">¿Requiere ayuda para
                        Movilizarce?</label>
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
                    <label class="form-label" for="tipo_ayuda">¿Qué tipo de ayuda necesita?</label>
                    <div class="form-check form-check-inline">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_ayuda"
                                id="tipo_ayudaRadio1" value="FISICA" >
                            <label class="form-check-label" for="inlineRadio1">FÍSICA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="tipo_ayuda"
                                id="tipo_ayudaRadio2" value="MECANICA" checked>
                            <label class="form-check-label" for="inlineRadio2">MECÁNICA</label>
                        </div>
                    </div>
                </div>

                <div class="col-md-4" id="seleccione_equipo">
                    <label class="form-label" for="ayuda_mecanica">Seleccione el equipo</label>
                    <select class="form-select" aria-label="Default select example" name="ayuda_mecanica"
                        required>
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
                
                <h5>Datos del Apoderado</h5>
                <div class="col-md-6">
                    <label class="form-label" for="nombre_apoderado">Nombre completo de apoderado</label>
                    <input class="form-control" type="text" name="nombre_apoderado"
                        id="nombre_apoderado" placeholder="Nombre de apoderado..." readonly required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="dni_apoderado">Nro de documento</label>
                    <div class="input-group lg-3">
                        <input class="form-control" type="text" name="dni_apoderado"
                            id="dni_apoderado" placeholder="Nro de documento...">
                        <button type="button" class="btn btn-primary" name="btnBuscarApoderado"
                            id="btnBuscarApoderado" disabled><i class="lni lni-search"></i>Buscar</button>

                        <div class="text-center" id="spinner_apoderado" hidden>
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="direccion_apoderado">Dirección de apoderado</label>
                    <input class="form-control" type="text" name="direccion_apoderado"
                        placeholder="Dirección de apoderado...">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="parentesco">Parentesco de Apoderado</label>
                    <select class="form-select" aria-label="Default select example" name="parentesco"
                        required>
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
                    <input class="form-control" type="number" name="telefono_apoderado" id="telefono_apoderado"
                        placeholder="Teléfono de apoderado...">
                </div>
                <div class="col-md-4">
                <label class="form-label" for="seguro_salud">¿Cuenta con seguro de salud?</label>
                <div class="form-check form-check-inline">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="seguro_salud"
                            id="flg_carnet_didRadio1" value="SI" checked>
                        <label class="form-check-label" for="inlineRadio1">SÍ</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="seguro_salud"
                            id="flg_carnet_didRadio2" value="NO">
                        <label class="form-check-label" for="inlineRadio2">NO</label>
                    </div>
                </div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="tipo_seguro">Tipo de seguro</label>
                    <select class="form-select" aria-label="Default select example" name="tipo_seguro">
                        <option selected>Seleccione el tipo</option>
                        <option value="SIS">SIS</option>
                        <option value="ESSALUD">EsSalud</option>
                        <option value="EPS">Empresas prestadoras de Salud(EPS)</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="flg_carnet_did` bigint">Nro de D.I.D</label>
                    <input class="form-control" type="number" name="flg_carnet_did" id="flg_carnet_did"
                        placeholder="Nro de D.I.D...">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fecha_empadronamiento">fecha de empadronamiento</label>
                    <input class="form-control" type="date" name="fecha_empadronamiento"
                        id="fecha_empadronamiento" placeholder="Fecha empadronamiento...">
                </div>
            </div>
            <hr>


            <div class="row" style="padding-top: 30px;">
                <div class="col-6 text-right">
                    <button class="btn btn-primary" id="btnRegistrar"><i class="lni lni-telegram-original"></i> Enviar</button>
                </div>
            </div>
        </section>
    </form>


@endsection
@section('extra_js')
    <script src="app_js/crud.js"></script>
    <script src="app_js/discapacitados.js"></script>
    <script src="assets/js/widgets.js"></script>
@endsection
