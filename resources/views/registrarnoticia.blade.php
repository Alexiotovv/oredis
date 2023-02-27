@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Registrar Noticias</a></h5>
        
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
                        <label for="">Seleccione Archivo</label>
                        <input type="file" class="form-control-file" name="archivo" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Descripción</label>
                        <textarea class="form-control" name="Descripcion" id="Descripcion" cols="30" rows="10" style="height: 90px" required></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="">Publicar?</label>
                        <select name="publicar" id="publicar" class="form-select">
                            <option value="1">Sí</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <br>
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </form>
            
        </div>
    </div>

@endsection

@section('extra_js')
    <script src="assets/js/widgets.js"></script>
    <script>
        var fecha = new Date();
        document.getElementById("Fecha").value = fecha.toJSON().slice(0, 10);
    </script>
@endsection
