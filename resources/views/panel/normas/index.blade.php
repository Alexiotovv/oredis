@extends('layouts.panel')

@section('content')
    {{-- <style>
        .tamano-imagen img{
            width: 100%;
            height: 100%;
        }
    </style> --}}


    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="">Normas</a></h5>
        
    <a href="{{route('panel.normas.create')}}" class="btn btn-primary">Nueva Norma</a>
    
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-hover" id="dtnormas">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($normas as $n)
                        <tr>
                            <td>{{$n->id}}</td>
                            <td>
                                <a href="{{route('panel.normas.edit',$n->id)}}" class="btn btn-outline-warning"><i class="lni lni-pencil"></i></a>
                            </td>
                            <td>{{$n->titulo}}</td>
                            <td>{{$n->descripcion}}</td>
                            <td>
                                <a href="{{asset('storage/normas/'.$n->archivo)}}">{{$n->archivo}}</a>
                            </td>
                            <td>{{$n->fecha}}</td>
                            
                            <td>
                                <div class="form-check form-switch">
                                    @if ($n->estado)
                                        <input class="form-check-input chknormas" type="checkbox" onclick="cambia_estado('normas')" id="normas" checked>
                                    @else
                                        <input class="form-check-input chknormas" type="checkbox" onclick="cambia_estado('normas')" id="normas">
                                    @endif    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>

   

@endsection

@section('extra_js')
    <script>
        $("#dtnormas").DataTable({
            order:[0],
            columnDefs: [
            // { width: "10px", targets: 0 },
            
            ]
        });
    </script>
    <script src="../../../app_js/chkestados.js"></script>
    <script>

    </script>
@endsection
