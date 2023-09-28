
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
            <div class="col-md-12">
                <label for="">Título</label>
                <input type="text" class="form-control" id="Titulo" name="Titulo" value="{{$obj->Titulo}}" required>
            </div>
            <div class="col-md-12">
                <label for="">Descripción <label id="descripcion_cant">0</label>/3000</label>
                <textarea class="form-control" name="Descripcion" id="Descripcion" required>{{$obj->Descripcion}}</textarea>
            </div>
            <div class="col-md-12">
                <label for="">Contenido</label>
                @if ($obj->contenido=='')
                    <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="8">--</textarea>
                @else
                    <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="8">{{$obj->contenido}}</textarea>
                @endif
            </div>
            <div class="col-md-4">
                <label for="">Fecha</label>
                <input type="date" class="form-control" id="Fecha" name="Fecha" value="{{$obj->Fecha}}" required>
            </div>
            <div class="col-md-4">
                <label for="">Slider?</label>
                <select name="slider" id="slider" class="form-select">
                    @if ($obj->slider==1)
                        <option value="1" selected>Sí</option>
                        <option value="1">Sí</option>
                    @else
                        <option value="0">No</option>
                        <option value="1" selected>Sí</option>
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Publicar?</label>
                <select name="publicar" id="publicar" class="form-select">
                    
                    @if ($obj->publicar==1)
                        <option value="1" selected>Sí</option>
                        <option value="0">No</option>
                    @else
                        <option value="0" selected>No</option>
                        <option value="1">Sí</option>
                    @endif
                </select>
            </div>
            <div class="col-md-4">
                <label for="">Seleccione Archivo</label>
                <input type="file" class="form-control form-control-file" name="archivo">
            </div>

            <div class="col-md-4">
                <label for="">Foto Actual</label>
                <img src="{{asset('storage/noticias/'.$obj['archivo'])}}" alt="" style="height: 45px;width:45px;">
            </div>  
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary">Guardar</button>
        </div>
</form>

    @section('extra_js')
        
        <script src="https://cdn.tiny.cloud/1/4wya3wjn43w5kzye9wy73hdg6o6fv12cdk8emfpbcztc175m/tinymce/6/tinymce.min.js"></script>
        {{-- <script src="../../../tinymce/tinymce.min.js"></script> --}}
        <script type="text/javascript">
        // tinymce.init({
        // selector: '#contenido',
        // // plugins: 'tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        // plugins: 'link image media',
        // toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        // tinycomments_mode: 'embedded',
        // tinycomments_author: 'Author name',
        // language:'es',
        // mergetags_list: [
        //     { value: 'First.Name', title: 'First Name' },
        //     { value: 'Email', title: 'Email' },
        // ],
        // ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant"))
        // });
        tinymce.init({
            selector: '#contenido',
            plugins: 'link image code',
            toolbar: 'undo redo | link image | code',
            // toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            language: 'es',
            // enable title field in the Image dialog
            image_title: true, 
            // enable automatic uploads of images represented by blob or data URIs
            automatic_uploads: true,
            // add custom filepicker only to Image dialog
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function() {
            var file = this.files[0];
            var reader = new FileReader();
            
            reader.onload = function () {
                var id = 'blobid' + (new Date()).getTime();
                var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                var base64 = reader.result.split(',')[1];
                var blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                // call the callback and populate the Title field with the file name
                cb(blobInfo.blobUri(), { title: file.name });
            };
            reader.readAsDataURL(file);
            };
            
            input.click();
        }
        });


        </script>
    


        <script src="../../../app_js/noticias.js"></script>
    @endsection

  @endsection
@endauth
@endif

