@extends('layouts.panel')
@section('titulo')
<title>Reporte de Visitas por Fechas</title>
@endsection
@section('content')

    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Reporte de Visitas</a></h5>
    <form id="formBuscarVisitas" method="POST" action="/obtenervisitas">
        {{-- method="POST" action="{{route('registrar.visita')}}" --}}
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="">Fecha Inicio</label>
                <input type="date" class="form-control" id="FechaInicio" name="FechaInicio">
            </div>
            <div class="col-md-4">
                <label for="">Fecha Final</label>
                <input type="date" class="form-control" id="FechaFinal" name="FechaFinal">
            </div>
            <div class="col-md-4">
                <br>
                <button class="btn btn-warning" id="btnBuscarVisitas" type="submit"><i class="lni lni-search"></i>Buscar</button>
                <div class="text-center" id="spinner_busqueda" hidden>
                    <div class="spinner-border" role="status">
                    </div>
                </div>
            </div>
        </div>    
    </form>
    
    <div class="card">
        <div class="card-body">
 
            <div class="table-responsive">
                <h5 style="text-align: center">Reporte de Visitas por Fechas</h5>
                <table class="table table-striped table-bordered" id="example2">
                    <thead>
                        <tr>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Nombre</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Fecha de Visita</th>
                            <th>Dirección</th>
                            <th>Numero</th>
                            <th>Coincide</th>
                            <th>NombreVisitador</th>
                            <th>ApellidoVisitador</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($visitas as $vi)
                        <tr>
                            <td>{{$vi->provincia}}</td>
                            <td>{{$vi->distrito}}</td>
                            <td>{{$vi->nombre}}</td>
                            <td>{{$vi->apellido_paterno}}</td>
                            <td>{{$vi->apellido_materno}}</td>
                            <td>{{$vi->FechaVisita}}</td>
                            <td>{{$vi->direccion}}</td>
                            <td>{{$vi->numero}}</td>
                            <td>{{$vi->viveaqui}}</td>
                            <td>{{$vi->nombres}}</td>
                            <td>{{$vi->apellidos}}</td>
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
            buttons: ['excel'],
            order:[0]
        }
        );
            table.buttons().container()
                .appendTo( '#example2_wrapper .col-md-6:eq(0)' );
        } );
    </script>
@endsection
