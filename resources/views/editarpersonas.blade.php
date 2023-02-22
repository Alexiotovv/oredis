@extends('layouts.panel')

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
                    <label class="form-label" for="nro_doc_identidad">Nro de documento</label>
                    <div class="input-group lg-3">
                        <input class="form-control" type="text" name="nro_doc_identidad" id="nro_doc_identidad"
                            name="nro_doc_identidad" placeholder="Nro de documento..." required>
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
                    <label class="form-label" for="direccion">Dirección</label>
                    <input class="form-control" type="text" value="direccion" name="direccion" id="direccion" placeholder="Direción..." required>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="provinci">Provincia</label>
                    <select class="form-select" aria-label="Default select example" name="provincia" id="provincia">
                        @foreach ($provincias as $prov )
                            <option value="">{{$prov->provincia}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label" for="distrito">Distrito</label>
                    <select class="form-select" aria-label="Default select example" name="distrito" id="distrito">
                        @foreach ($distritos as $dist )
                            <option value="{{$dist->id}}">{{$dist->ubigeo_distrito}}-{{$dist->distrito}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
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
                        <option value="SOLTERO">SOLTERO</option>
                        <option value="CASADO">CASADO</option>
                        <option value="VIUDO">VIUDO</option>
                        <option value="DIVORCIADO">DIVORCIADO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="sexo">Sexo</label>
                    <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">
                        <option value="M">MASCULINO</option>
                        <option value="F">FEMENINO</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fecha_nacimiento">Fech. Nac.</label>
                    <input type="date" class="form-control" name="fecha_nacimiento" id="fecha_nacimiento">
                </div>

            </div>


        </section>

        <section data-step="2. Datos de trabajo">
            <div class="row row-cols-1">
                <h5>Laboral</h5>
                <div class="col mb-2">
                    <label class="form-label" for="ocupacion">Ocupación</label>
                    <input class="form-control" type="text" name="ocupacion" id="ocupacion"
                        placeholder="Ocupación...">
                </div>
                <div class="col mb-2">
                    <label class="form-label" for="Grado de instrucción">Grado de instrucción</label>
                    <select class="form-select" aria-label="Default select example" name="grado_instruccion" id="grado_instruccion">
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

        <section data-step="3. Datos personales">
            <div class="row">
                <h5>Condición</h5>
                <div class="col-md-4">
                    <label class="form-label" for="flag_certifi_discapacidad">¿Cuenta con certificado de
                        discapacidad?</label>
                    <select class="form-select" aria-label="Default select example" name="flag_certifi_discapacidad" id="flag_certifi_discapacidad">
                        <option value="SI" selected>SÍ</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col-md-4">

                    <label class="form-label" for="tipo_discapacidad">Tipo de discapacidad</label>
                    <select class="form-select" aria-label="Default select example" name="tipo_discapacidad" id="tipo_discapacidad">
                        <option selected>Seleccione el tipo</option>
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
                        <option selected>Seleccione el grado</option>
                        <option value="LEVE">LEVE</option>
                        <option value="MODERADO">MODERADO</option>
                        <option value="SEVERO">SEVERO</option>
                    </select>
                </div>
                <div class="col-md-4">
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
                        <option selected>Seleccione el equipo</option>
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
                    <input class="form-control" type="text" name="nombre_apoderado" id="nombre_apoderado"
                        placeholder="Nombre de apoderado..." readonly required>
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="dni_apoderado">Nro de documento</label>
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
                    <label class="form-label" for="direccion_apoderado">Dirección de apoderado</label>
                    <input class="form-control" type="text" name="direccion_apoderado" id="direccion_apoderado"
                        placeholder="Dirección de apoderado...">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="parentesco">Parentesco de Apoderado</label>
                    <select class="form-select" aria-label="Default select example" name="parentesco" id="parentesco" required>
                        <option selected>Seleccione el equipo</option>
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
                        <option selected>Seleccione el tipo</option>
                        <option value="SIS">SIS</option>
                        <option value="ESSALUD">EsSalud</option>
                        <option value="EPS">Empresas prestadoras de Salud(EPS)</option>
                        <option value="OTRO">Otro</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="flg_carnet_did bigint">Nro de D.I.D</label>
                    <input class="form-control" type="number" name="flg_carnet_did" id="flg_carnet_did" placeholder="Nro de D.I.D...">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="fecha_empadronamiento">fecha de empadronamiento</label>
                    <input class="form-control" type="date" name="fecha_empadronamiento" id="fecha_empadronamiento"
                        placeholder="Fecha empadronamiento...">
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="content">
                    <h5>Datos de Geolocalziación</h5>
                    <a class="btn btn-primary" id="ObtenerUbicacion"><i class="lni lni-search"></i>
                        Obtener Ubicación</a>
                    <a class="btn btn-primary" id="IngresarManualUbicacion"><i class="lni lni-write"></i>
                        Ingresar Manual</a>
                </div>
                <div class="col-md-4">
                    <label for="">Latitud</label>
                    <input type="text" class="form-control" id="latitud" name="latitud" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">Longitud</label>
                    <input type="text" class="form-control" id="longitud" name="longitud" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">Altitud</label>
                    <input type="text" class="form-control" id="altitud" name="altitud" readonly>
                </div>
            </div>

            <div class="row" style="padding-top: 30px;">

                <div class="col-6 text-right">
                    <button class="btn btn-primary" id="btnEnviar" type="submit"><i
                            class="lni lni-telegram-original"></i> Enviar</button>
                </div>
            </div>
        </section>

    </form>
    
    <script src="assets/js/jquery.js"></script>
    <script src="app_js/crud.js"></script>
    <script src="app_js/editarregistro.js"></script>
@endsection
