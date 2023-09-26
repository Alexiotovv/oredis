@extends('layouts.panel')

@section('content')
    <style>
        .tamano-imagen img{
            width: 100%;
            height: 100%;
        }
    </style>


    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="">Noticias</a></h5>
        
    <h5>Buscar</h5>
    <form action="{{route('noticias')}}" method="GET">
    <div class="row" style="margin-bottom: 10px;">
            <div class="col-sm-5">
                <input type="text" class="form-control" id="txtBuscar" name="txtBuscar" value="{{$texto}}">
            </div>
            <div class="col-sm-3">
                <button class="btn btn-primary">Filtrar</button>
            </div>
        
    </form>
        <div class="col-sm-4">
                <a class="btn btn-warning" href="/noticias" >Mostrar Todos</a>
        </div>

    </div>
    <div class="card">
        <div class="card-body">
            <table class="table mb-0 table-hover">
                <thead>
                    <tr>
                        <th scope="col">N</th>
                        <th scope="col">Acción</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">BannerModal</th>
                        <th scope="col">BannerSlider</th>
                        <th scope="col">Publicado</th>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    @foreach ($noticias as $pub)
                        <tr>
                            <td>{{$pub->id}}</td>
                            <td>
                                {{-- <button class="btn btn-outline-danger btnEliminarNoticia"><i class="lni lni-trash"></i></button> --}}
                                <button class="btn btn-outline-warning btnEditarNoticia"><i class="lni lni-pencil"></i></button>
                            </td>
                            <td>{{$pub->Titulo}}</td>
                            <td>{{$pub->Descripcion}}</td>
                            <td>
                                <div class="tamano-imagen">
                                    {!!$pub->contenido!!}

                                </div>
                            </td>
                            <td>{{$pub->Fecha}}</td>
                            <td>
                                <a href="{{asset('storage/noticias/'.$pub['archivo'])}}"><img src="{{asset('storage/noticias/'.$pub['archivo'])}}" style="height: 30px;width:30px;"></a>
                                {{-- <img src="{{asset('/storage/publicaciones/'.$pub->Ruta)}}" alt="imagen" style="width: 40px;heigth: 50px;"> --}}
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    @if ($pub->modal)
                                        <input class="form-check-input chkbanner" type="checkbox" id="bannerModal" checked>
                                    @else
                                        <input class="form-check-input chkbanner" type="checkbox" id="bannerModal">
                                    @endif    
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    @if ($pub->slider)
                                        <input class="form-check-input chkslider" type="checkbox" id="Slider" checked>
                                    @else
                                        <input class="form-check-input chkslider" type="checkbox" id="Slider">
                                    @endif    
                                </div>
                            </td>
                            <td>
                                <div class="form-check form-switch">
                                    @if ($pub->publicar)
                                        <input class="form-check-input chkpublicar" type="checkbox" id="Publicar" checked>
                                    @else
                                        <input class="form-check-input chkpublicar" type="checkbox" id="Publicar">
                                    @endif    
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $noticias->links() !!}
        </div>
    </div>

   

@endsection

@section('extra_js')
    <script src="app_js/crud.js"></script>
    <script src="app_js/noticias.js"></script>
    {{-- <script src="assets/js/widgets.js"></script> --}}
@endsection
