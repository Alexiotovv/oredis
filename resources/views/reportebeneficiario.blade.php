@extends('layouts.panel')
@section('titulo')
<title>Reporte de Beneficiario</title>
@endsection
@section('content')

    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="">Reporte de Beneficiario</a></h5>
    <form id="formBuscarVisitas" method="POST" action="obtenerbeneficiario">
        {{-- method="POST" action="{{route('registrar.visita')}}" --}}
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-check form-switch">
                    <label class="form-check-label" for="chkDistrito">Seleccionar Todos</label>
                    <input class="form-check-input chkDistrito" type="checkbox" id="chkDistrito" name="chkDistrito">

                </div>
                <label for="">Seleccione uno o varios Distritos</label>
                <select id="distrito" name="distrito[]" class="multiple-select" multiple="multiple">
                    @foreach ($distritos as $dist)
                        <option value="{{$dist->id}}">{{$dist->ubigeo_distrito}}-{{$dist->distrito}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <br>
                <button class="btn btn-warning" id="btnBuscarVisitas" type="submit"><i class="lni lni-search"></i>Buscar</button>
                {{-- <div class="text-center" id="spinner_busqueda" hidden>
                    <div class="spinner-border" role="status">
                    </div>
                </div> --}}
            </div>
        </div>
    </form>
    <br>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <h5 style="text-align: center">Reporte de Beneficiarios</h5>
                <table class="table table-striped table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>distrito</th>
                            <th>nombre</th>
                            <th>apellido_paterno</th>
                            <th>apellido_materno</th>
                            <th>nro_doc_identidad</th>
                            <th>distrito</th>
                            <th>dirección</th>
                            <th>telefono</th>
                            <th>correo</th>
                            <th>fecha_nacimiento</th>
                            <th>estado_civil</th>
                            <th>sexo</th>
                            <th>ocupacion</th>
                            <th>grado_instruccion</th>
                            <th>flag_certifi_discapacidad</th>
                            <th>tipo_discapacidad</th>
                            <th>Nro_carnet</th>
                            <th>Fecha_Vcmto_Carnet</th>
                            <th>diagnostico_discapacidad</th>
                            <th>requiere_ayuda</th>
                            <th>tipo_ayuda</th>
                            <th>ayuda_mecanica</th>
                            <th>nombre_apoderado</th>
                            <th>dni_apoderado</th>
                            <th>parentesco</th>
                            <th>direccion_apoderado</th>
                            <th>correo_apoderado</th>
                            <th>telefono_apoderado</th>
                            <th>status_apoderado</th>
                            <th>tipo_seguro</th>
                            <th>seguro_salud</th>
                            <th>fecha_empadronamiento</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($personas as $per)
                        <tr>
                            <td>{{$per->distrito}}</td>
                            <td>{{$per->nombre}}</td>
                            <td>{{$per->apellido_paterno}}</td>
                            <td>{{$per->apellido_materno}}</td>
                            <td>{{$per->nro_doc_identidad}}</td>
                            <td>{{$per->distrito}}</td>
                            <td>{{$per->direccion}}</td>
                            <td>{{$per->telefono}}</td>
                            <td>{{$per->correo}}</td>
                            <td>{{$per->fecha_nacimiento}}</td>
                            <td>{{$per->estado_civil}}</td>
                            <td>{{$per->sexo}}</td>
                            <td>{{$per->ocupacion}}</td>
                            <td>{{$per->grado_instruccion}}</td>
                            <td>{{$per->flag_certifi_discapacidad}}</td>
                            <td>{{$per->tipo_discapacidad}}</td>
                            <td>{{$per->flg_carnet_did}}</td>
                            <td>{{$per->fecha_caducidad_carnet}}</td>
                            <td>{{$per->diagnostico_discapacidad}}</td>
                            <td>{{$per->requiere_ayuda}}</td>
                            <td>{{$per->tipo_ayuda}}</td>
                            <td>{{$per->ayuda_mecanica}}</td>
                            <td>{{$per->nombre_apoderado}}</td>
                            <td>{{$per->dni_apoderado}}</td>
                            <td>{{$per->parentesco}}</td>
                            <td>{{$per->direccion_apoderado}}</td>
                            <td>{{$per->correo_apoderado}}</td>
                            <td>{{$per->telefono_apoderado}}</td>
                            
                                @if ($per->status_apoderado)
                                    <td style="color: rgb(31, 179, 31)">    
                                        Activo
                                    </td>
                                @else
                                    <td style="color: rgb(225, 76, 76)">
                                        Inactivo
                                    </td>
                                @endif
                                
                            
                            <td>{{$per->tipo_seguro}}</td>
                            <td>{{$per->seguro_salud}}</td>
                            <td>{{$per->fecha_empadronamiento}}</td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section('extra_js')
    {{-- <script src="app_js/crud.js"></script>--}}
    {{-- <script src="app_js/reportevisitas.js"></script> --}}
    <script src="app_js/reportebeneficiario.js"></script>
    <script src="assets/js/widgets.js"></script>

    <script>
        $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'excel'],
            order:[0]
        }
        );
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
    <script>
        $('.single-select').select2({
        theme: 'bootstrap4',
        width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        placeholder: $(this).data('placeholder'),
        allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection
