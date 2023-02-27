@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Reporte de Visitas</a></h5>
        
    <h5>Lista de Visitas</h5>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="DTReporteVisitas">
                    <thead>
                        <tr>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Nombre</th>
                            <th>ApellidoPaterno</th>
                            <th>ApellidoMaterno</th>
                            <th>Dirección</th>
                            <th>Numero</th>
                            <th>Coincide</th>
                            <th>NombreVisitador</th>
                            <th>ApellidoVisitador</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($visitas as $vi)
                            <tr>
                                <td>{{$vi->provincia}}</td>
                                <td>{{$vi->distrito}}</td>
                                <td>{{$vi->nombre}}</td>
                                <td>{{$vi->apellido_paterno}}</td>
                                <td>{{$vi->apellido_materno}}</td>
                                <td>{{$vi->direccion}}</td>
                                <td>{{$vi->numero}}</td>
                                <td>{{$vi->viveaqui}}</td>
                                <td>{{$vi->nombres}} {{$vi->apellidos}}</td>
                                <td>{{$vi->nombres}} {{$vi->apellidos}}</td>
                            </tr>
                        @endforeach --}}
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
@endsection
