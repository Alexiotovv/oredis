
@if (Route::has('login'))
@auth
  @extends('layouts.panel')
  @section('content')
    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Editar Noticia</a> </h5>
   
<form action="{{route('update.noticia')}}" method="POST" enctype="multipart/form-data">
@csrf
    <h5 class="modal-title">Editar Noticia</h5>
        <div class="row">
            <input type="text" name="id" id="id" value="{{$obj->id}}" hidden>
            <div class="col-md-6">
                <label for="">Título</label>
                <input type="text" class="form-control" id="Titulo" name="Titulo" value="{{$obj->Titulo}}" required>
            </div>
            <div class="col-md-4">
                <label for="">Fecha</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" value="{{$obj->Fecha}}" required>
            </div>
            <div class="col-md-2">
                <label for="">Publicar?</label>
                <select name="publicar" id="publicar" class="form-select">
                    {{-- pendiente --}}
                    <option value="1">Sí</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Foto Actual</label>
                <img src="{{asset('storage/noticias/'.$obj['archivo'])}}" alt="" style="height: 45px;width:45px;">
            </div>
            <div class="col-md-6">
                <label for="">Seleccione Archivo</label>
                <input type="file" class="form-control-file" name="archivo" required>
                {{-- <label for="">Nombre Actual archivo<strong>{{$obj->archivo}}</strong></label> --}}
            </div>
            <div class="col-md-10">
                <label for="">Descripción <label id="descripcion_cant">0</label>/3000</label>
                <textarea class="form-control" name="Descripcion" id="Descripcion" cols="30" rows="20" style="height: 90px" required>{{$obj->Descripcion}}</textarea>
            </div>
        
            <div class="col-md-4">
                <button class="btn btn-primary">Guardar</button>
            </div>
        </div>
    
        
</form>
  @endsection
@endauth
@endif