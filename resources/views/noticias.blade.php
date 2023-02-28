@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Noticias</a></h5>
        
    <h5>Noticias</h5>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th scope="col">N</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Publicado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($noticias as $pub)
                        <tr>
                            <td>{{$pub->id}}</td>
                            <td>
                                <button class="btn btn-outline-danger btnEliminarPublicacion"><i class="lni lni-trash"></i></button>
                                <button class="btn btn-outline-warning btnEditarPublicacion"><i class="lni lni-pencil"></i></button>
                            </td>
                            <td>{{$pub->Titulo}}</td>
                            <td>{{$pub->Descripcion}}</td>
                            <td>{{$pub->Fecha}}</td>
                            <td>
                                <a href="{{asset('/storage/noticias/'.$pub->archivo)}}"><img src="{{asset('/storage/noticias/'.$pub->archivo)}}" style="height: 30px;width:30px;"></a>
                                {{-- <img src="{{asset('/storage/publicaciones/'.$pub->Ruta)}}" alt="imagen" style="width: 40px;heigth: 50px;"> --}}
                            </td>
                            <td>{{$pub->publicar}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $noticias->links() !!}
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="assets/js/widgets.js"></script>
@endsection
