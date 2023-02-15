@if (Route::has('login'))
@auth
    @extends('layouts.base')
    @section('extra_css')
        <link href="assets/css/icons_main.css" rel="stylesheet">
        <link href="bootsrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="bootsrap/css/bootstrap.css" rel="stylesheet">
        <link href="assets/css/sweetalert2.min.css" rel="stylesheet">
    @endsection
    @section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header">
                Opciones:
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <a href="CreateDiscapacitados">Registrar Discapacitado</a>
                    </li>
                    <li class="list-group-item">
                        <a href="">Listar Discapacitados</a>
                    </li>
                    {{-- <li class="list-group-item">
                        <a href="">Registrar Usuarios</a>
                    </li> --}}
                    <li class="list-group-item">
                        <a href="{{route('Usuarios')}}">Listar Usuarios</a>
                    </li>
                    {{-- <li class="list-group-item"><a href="">Otros</a></li> --}}
                </ul>
            </div>
        </div>
        <div class="col-lg-9" style="padding-right: 40px;">
            @yield('contenido_panel') 
            <br>
        </div>
        
        
    </div>    
        
    @endsection
    @section('extra_js')
        <script src="assets/app_js/publicaciones.js"></script>
        
        <script src="assets/app_js/crud.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endsection
@endauth
@endif