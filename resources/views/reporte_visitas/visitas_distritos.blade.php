@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Reporte de Visitas por Distrito</a></h5>
    <form id="formBuscarVisitas" method="POST" action="{{route('visita.reporte.distrito.show')}}">
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
    {{-- <script src="app_js/reportevisitas.js"></script> --}}
    <script src="../../../app_js/reportebeneficiario.js"></script>{{-- se puso esto porque ahi esta el codigo  --}}
    <script src="../../../assets/js/widgets.js"></script>
    <script>
        $(document).ready(function() {
        var table = $('#example2').DataTable( {
            lengthChange: false,
            buttons: [ 'excel', 'pdf', 'print'],
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
