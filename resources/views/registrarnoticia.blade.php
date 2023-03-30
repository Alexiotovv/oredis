@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Registrar Noticias</a></h5>
        
    <h5>Registro de Noticias</h5>
    <div class="card">
        <div class="card-body">
            <form  action="storenoticia" method="POST" enctype="multipart/form-data">@csrf

                <div class="row">
                    <div class="col-md-4">
                        <label for="">Título</label>
                        <input type="text" class="form-control" id="Titulo" name="Titulo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Fecha</label>
                        <input type="date" class="form-control" id="Fecha" name="Fecha" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Publicar?</label>
                        <select name="publicar" id="publicar" class="form-select">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    
                    <div class="col-md-4">
                        <label for="">Seleccione Archivo</label>
                        <input type="file" class="form-control-file" name="archivo" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Descripción <label id="descripcion_cant">0</label>/3000</label>
                        <textarea class="form-control" name="Descripcion" id="Descripcion" cols="30" rows="20" style="height: 90px"></textarea>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <br>
                    <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </form>
            
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="assets/js/widgets.js"></script>
    {{-- <script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#Descripcion'
        });
    </script> --}}
    <script src="../app_js/noticias.js"></script>
    <script>
        var fecha = new Date();
        document.getElementById("Fecha").value = fecha.toJSON().slice(0, 10);
    </script>
@endsection
