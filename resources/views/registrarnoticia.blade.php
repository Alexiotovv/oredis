@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Registrar Noticias</a></h5>
        
    <h5>Registro de Noticias</h5>
    <div class="card">
        <div class="card-body">
            <form  action="storenoticia" method="POST" enctype="multipart/form-data">@csrf

                <div class="row">
                    <div class="col-md-12">
                        <label for="">Título</label>
                        <input type="text" class="form-control" id="Titulo" name="Titulo" required>
                    </div>
                    <div class="col-md-12">
                        <label for="">Descripción <label id="descripcion_cant">0</label>/3000</label>
                        <textarea class="form-control" name="Descripcion" id="Descripcion"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="">Contenido</label>
                        <textarea name="contenido" id="contenido" cols="30" rows="8" class="form-control"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="">Fecha</label>
                        <input type="date" class="form-control" id="Fecha" name="Fecha" required>
                    </div>
                    <div class="col-md-4">
                        <label for="">Slider?</label>
                        <select name="slider" id="slider" class="form-select">
                            <option value="0">No</option>
                            <option value="1">Sí</option>
                        </select>
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
                        <input type="file" class="form-control form-control-file" name="archivo" required>
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
    
    <script src="https://cdn.tiny.cloud/1/4wya3wjn43w5kzye9wy73hdg6o6fv12cdk8emfpbcztc175m/tinymce/6/tinymce.min.js"></script>
    {{-- <script src="../../../tinymce/tinymce.min.js"></script> --}}
    <script type="text/javascript">
    tinymce.init({
      selector: '#contenido',
      plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
      toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      language:'es',
      mergetags_list: [
        { value: 'First.Name', title: 'First Name' },
        { value: 'Email', title: 'Email' },
      ],
      ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
    });
    </script>

    <script src="../app_js/noticias.js"></script>
    <script>
        var fecha = new Date();
        document.getElementById("Fecha").value = fecha.toJSON().slice(0, 10);
    </script>
@endsection
