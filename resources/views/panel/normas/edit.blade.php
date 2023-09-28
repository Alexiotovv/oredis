@extends('layouts.panel')

@section('content')
    
    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="">Normas</a></h5>
    
    <div class="card">
        <div class="card-body">
            <h5>Editar Norma</h5>
            <form action="{{route('panel.normas.update')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-sm-12">
                    <label for="">Titulo</label>
                    <input type="text" name="id" value="{{$obj->id}}" hidden>
                    <input type="text" name="titulo" value="{{$obj->titulo}}" class="form-control" required>
                </div>
                <div class="col-sm-12">
                    <label for="">Descripción</label>
                    <textarea type="text" name="descripcion" class="form-control" maxlength="250" required>{{$obj->descripcion}}</textarea>
                </div>
                <div class="col-sm-12">
                    <label for="">Cambiar Archivo</label>
                    <input type="file" name="archivo" class="form-control" accept=".pdf">
                    <br>
                    <p>Archivo Actual: <a href="{{asset('storage/normas/'.$obj->archivo)}}">{{$obj->archivo}}</a></p>
                </div>
                
                <div class="col-sm-12">
                    <br>
                    <button class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>

   

@endsection

@section('extra_js')
    <script src="../../../app_js/currentdate.js"></script>
    <script> currentdate("fecha") </script>
@endsection
