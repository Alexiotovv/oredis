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
                        <a href="/CreateDiscapacitados">Registrar Persona</a>
                    </li>
                    <li class="list-group-item">
                        <a href="/editarpersonas">Editar Persona</a>
                    </li>

                    <li class="list-group-item">
                        <a href="">Listar Personas</a>
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
    
    


<div class="modal fade" id="modalBuscarPersona" tabindex="-1" aria-labelledby="modalBuscarPersonaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalBuscarPersonaLabel">Buscar Persona</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Ingrese Dni :</label>
            <div class="input-group lg-3">
                <input type="text" class="form-control" id="dni_buscar" name="dni_buscar">
                <button type="button" class="btn btn-primary" id="btnEncontrarPersona">
                    <i class="lni lni-search"></i>Buscar
                </button>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection

@section('extra_js')
        <script src="assets/app_js/publicaciones.js"></script>
        <script src="assets/app_js/crud.js"></script>
        <script src="assets/app_js/editarregistro.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@endauth
@endif