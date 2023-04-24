@extends('layouts.panel')
@section('titulo')
<title>Detalle de Asociaciones Registradas a Nivel Regional</title>
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="DTAsociacionesysocios">
                    <thead>
                        <tr>
                            {{-- <th>id</th> --}}
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Socio</th>
                            <th>TipoSocio</th>
                            <th>Nombre</th>
                            <th>Siglas</th>
                            <th>N° Partida</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            {{-- <th>Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('extra_js')
    <script>
        $("#DTAsociacionesysocios").DataTable({
        "destroy":true,
        "ajax":"/asociacionesysocios/listar",
        "method":"GET",
        "columns":[
            // {data:'id'},
            {data:'provincia'},
            {data:'distrito'},
            {data: '-',
                render: function ( data, type, row ) {
                    if (row.nombre==null) {
                        return ' ';
                    }else{
                        return row.nombre +row.apellido_paterno + ' ' + row.apellido_materno;
                    }
                }
            },
            {data:'tipo_socio'},
            {data:'nombre_organizacion'},
            {data:'siglas_asociacion'},
            {data:'partida_registral'},
            {data:'direccion'},
            {data:'celular'},
            {data:'correo'},
            // {data:'status'},
        ],order:[0],
        buttons:['excel'],
        dom: 'Bfrtip',
    })

    </script>
@endsection