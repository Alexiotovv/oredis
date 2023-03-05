@if (Route::has('login'))
@auth
  @extends('layouts.panel')
  @section('content')
    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="paneladmin">Contenido / </a></h5>
    <h5 style="text-align: center">Personaliza el contenido de la página</h5>  
    {{-- @if ($message==1)
    <div class="alert alert-success border-0 bg-success alert-dismissible fade show">
      <div class="text-white">A simple success alert—check it out!</div>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif --}}

  <form action="{{route('actualizar.contenido')}}" method="POST" enctype="multipart/form-data">@csrf
    <div class="row">
      <div class="col-sm-3">
        <label for="texto_banner">Texto de banner <label id="texto_banner_cant">0</label>/60 Carac.</label>
        <textarea class="form-control form-control-sm" id="texto_banner" name="texto_banner" maxlength="60" >{{$obj->texto_banner}}</textarea>
      </div>
      <div class="col-sm-3">
        <label for="pie_banner">Pie de Banner <label id="pie_banner_cant">0</label>/72 Carac.</label>
        <textarea class="form-control form-control-sm" id="pie_banner" name="pie_banner" maxlength="72">{{$obj->pie_banner}}</textarea>
      </div>
      <div class="col-sm-2">
        <label for="">Foto Banner Actual</label>
        <img src="{{asset('storage/contenido/'.$obj->foto_banner)}}" style="height: 65px;width: 55px;" alt="">
      </div>
      <div class="col-sm-4">
        <label for="foto_banner">Foto de Banner .jpg/.png (h.495px x v.690px)</label>
        <input type="file" class="form-control form-control-sm" id="foto_banner" name="foto_banner" maxlength="250">
      </div>
      <div class="col-sm-6">
        <label for="objetivo">Objetivo <label id="objetivo_cant">0</label>/369 Carac.</label>
        <textarea type="text" class="form-control form-control-sm" id="objetivo" name="objetivo" maxlength="369">{{$obj->objetivo}}</textarea>
      </div>
      <div class="col-sm-2">
        <label for="">Foto Objetivo Actual</label>
        <img src="{{asset('storage/contenido/'.$obj->foto_objetivo)}}" style="height: 65px;width: 55px;" alt="">
      </div>
      <div class="col-sm-4">
        <label for="foto_banner">Foto Objetivo .jpg/.png (h.590px x v.659px)</label>
        <input type="file" class="form-control form-control-sm" id="foto_objetivo" name="foto_objetivo" maxlength="250">
      </div>
      <div class="col-sm-4">
        <label for="evento">Evento <label id="texto_evento_cant">0</label>/78 Carac.</label>
        <textarea type="text" class="form-control form-control-sm" id="texto_evento" name="texto_evento" maxlength="78">{{$obj->texto_evento}}</textarea>
      </div>
      <div class="col-sm-4">
        <label for="pie_evento">Pie Evento <label id="pie_evento_cant">0</label>/313 Carac.</label>
        <textarea type="text" class="form-control form-control-sm" id="pie_evento" name="pie_evento" maxlength="313">{{$obj->pie_evento}}</textarea>
      </div>
      <div class="col-sm-4">
        <label for="telefono">Telefono</label>
        <input type="text" class="form-control form-control-sm" value="{{$obj->telefono}}" id="telefono" name="telefono" maxlength="20">
      </div>
      <div class="col-sm-4">
        <label for="correo">Correo</label>
        <input type="mail" class="form-control form-control-sm" id="correo" name="correo" value="{{$obj->correo}}">
      </div>
      <div class="col-sm-4">
        <label for="correo">Dirección</label>
        <input type="mail" class="form-control form-control-sm" id="direccion" name="direccion" value="{{$obj->direccion}}" maxlength="150">
      </div>
      <div class="col-sm-4">
        <label for="nombre_enlace1">Nombre de Enlace 1</label>
        <input type="text" class="form-control form-control-sm" id="nombre_enlace1" name="nombre_enlace1" value="{{$obj->nombre_enlace1}}" maxlength="100">
      </div>
      <div class="col-sm-4">
        <label for="enlace1">Enlace 1</label>
        <input type="text" class="form-control form-control-sm" id="enlace1" name="enlace1" value="{{$obj->enlace1}}" maxlength="100">
      </div>
      <div class="col-sm-4">
        <label for="nombre_enlace2">Nombre de Enlace 2</label>
        <input type="text" class="form-control form-control-sm" id="nombre_enlace2" name="nombre_enlace2" value="{{$obj->nombre_enlace2}}" maxlength="100">
      </div>
      <div class="col-sm-4">
        <label for="enlace1">Enlace 2</label>
        <input type="text" class="form-control form-control-sm" id="enlace2" name="enlace2" value="{{$obj->enlace2}}" maxlength="100">
      </div>
      <div class="col-sm-4">
        <label for="nombre_enlace3">Nombre de Enlace 3</label>
        <input type="text" class="form-control form-control-sm" id="nombre_enlace3" name="nombre_enlace3" value="{{$obj->nombre_enlace3}}" maxlength="100">
      </div>
      <div class="col-sm-4">
        <label for="enlace3">Enlace 3</label>
        <input type="text" class="form-control form-control-sm" id="enlace3" name="enlace3" value="{{$obj->enlace3}}" maxlength="100">
      </div>
      
      <div class="col-sm-4">
        <br>
        <button class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </form>
  @endsection
@endauth
@endif

@section('extra_js')
    <script src="app_js/contenido.js"></script>
    
@endsection
