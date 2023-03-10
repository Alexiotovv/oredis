@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Reporte de Beneficiario</a></h5>
    <form id="formBuscarVisitas" method="POST" action="obtenerbeneficiario">
        {{-- method="POST" action="{{route('registrar.visita')}}" --}}
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="">Seleccione un Distrito</label>
                <select name="distrito" id="distrito" class="form-select">
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
    
    <div class="card">
        <div class="card-body">
 
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>distrito</th>
                            <th>nombre</th>
                            <th>apellido_paterno</th>
                            <th>apellido_materno</th>
                            <th>nro_doc_identidad</th>
                            <th>telefono</th>
                            <th>correo</th>
                            <th>fecha_nacimiento</th>
                            <th>estado_civil</th>
                            <th>sexo</th>
                            <th>ocupacion</th>
                            <th>grado_instruccion</th>
                            <th>flag_certifi_discapacidad</th>
                            <th>tipo_discapacidad</th>
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
                            <th>tipo_seguro</th>
                            <th>seguro_salud</th>
                            <th>fecha_empadronamiento</th>
                            <th>flg_carnet_did</th>
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
                            <td>{{$per->telefono}}</td>
                            <td>{{$per->correo}}</td>
                            <td>{{$per->fecha_nacimiento}}</td>
                            <td>{{$per->estado_civil}}</td>
                            <td>{{$per->sexo}}</td>
                            <td>{{$per->ocupacion}}</td>
                            <td>{{$per->grado_instruccion}}</td>
                            <td>{{$per->flag_certifi_discapacidad}}</td>
                            <td>{{$per->tipo_discapacidad}}</td>
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
                            <td>{{$per->tipo_seguro}}</td>
                            <td>{{$per->seguro_salud}}</td>
                            <td>{{$per->fecha_empadronamiento}}</td>
                            <td>{{$per->flg_carnet_did}}</td>
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
    <script src="app_js/reportevisitas.js"></script>
    <script src="assets/js/widgets.js"></script>

    <script>
        $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print'],
            order:[0]
        }
        );
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
@endsection
