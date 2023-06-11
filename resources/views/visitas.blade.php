@extends('layouts.panel')
@section('extra_css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
    integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
    crossorigin=""/>
@endsection
@section('content')

    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Formulario de Visitas</a></h5>
    
    <form id="formGuardarVisita" >@csrf
        {{-- action="guardarvisita" method="POST" --}}
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-6">
                        <h5>Ingrese un DNI</h5>
                    </div>
                    <div class="col-6">
                        <span class="badge bg-warning text-dark" id="btnInfo"><a href="" id="SinDocumento"> Buscar por Nombre</a></span>
                    </div>
                </div>
                
                <div class="input-group">    
                    <input type="text" class="form-control form-control" id="dniBuscar" required>
                    <button class="btn btn-warning" id="btnBuscarDireccion"><i class="lni lni-search"></i> Buscar</button>
                </div>
                <br>
                <div class="card">
                    <div class="card-body">    
                        <h5 id="NombrePersona"></h5>
                        <label for="">Última Dirección Activa</label>
                        <input type="text" class="form-control" id="Direccion" readonly>
                        <label for="">Provincia</label>
                        <input type="text" class="form-control" id="Provincia" readonly>
                        <label for="">Distrito</label>
                        <input type="text" class="form-control" id="Distrito" readonly>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                    <label for="">Vive Aquí?</label>
                    <select name="viveaqui" id="viveaqui" class="form-select">
                        <option value="1">Sí</option>
                        <option value="0">NO</option>
                    </select>
                    <label for="">Fecha Visita</label>
                    <input type="date" id="FechaVisita" name="FechaVisita" class="form-control" readonly>

                    <div class="row">
                        <input type="text" id="idDireccion" name="idDireccion" readonly hidden>
                        <div class="col-md-3">
                            <br>
                            <a class="btn btn-primary" id="ObtenerUbicacion"><i class="lni lni-map-marker"></i></a>
                            <a class="btn btn-danger" id="IngresarManualUbicacion"><i class="lni lni-pencil-alt"></i></a>
                        </div>
                        <div class="col-md-4">
                            <label for="">Latitud</label>
                            <input type="text" class="form-control" id="latitud" name="latitud" readonly>
                        </div>
                        <div class="col-md-5">
                            <label for="">Longitud</label>
                            <input type="text" class="form-control" id="longitud" name="longitud" readonly>
                        </div>
                        <div class="col-md-3" hidden>
                            <label for="">Altitud</label>
                            <input type="text" class="form-control" id="altitud" name="altitud" hidden readonly>
                        </div>

                    </div>
                    <label for="">Comentarios</label>
                    <textarea name="comentarios" id="comentarios" cols="30" rows="10" class="form-control" style="height: 60px;"></textarea>

                    </div>
                    <div class="col-md-12">
                        <br>
                        <button class="btn btn-success" id="btnGuardarVisita" type="submit" style="width:100%">Guardar Visita</button>
                    </div>
                </form>
            </div>
        </div>     
    </form>
    @include('discapacitados.form_buscardiscapacitados')

    <div class="row">
        <div class="col-md-12" style="padding-left: 30px;padding-right:30px;">
            <div id="map" style="height: 400px;"></div>
            <br><br><br>
        </div>
        
    </div>
@endsection

@section('extra_js')
    <script src="app_js/crud.js"></script>
    <script src="app_js/visitas.js"></script>
   
    <script>
        $("#SinDocumento").on("click",function (e) {
            e.preventDefault();
            $("#modalbuscarpornombre").modal("show");
        })
        $("#txtbuscarnombre").on("keyup",function (e){
            buscarPersonaNombres();
        });
        $("#txtbuscarapellidopat").on("keyup",function (e){
            buscarPersonaNombres();
        });
        $("#txtbuscarapellidomat").on("keyup",function (e){
            buscarPersonaNombres();
        });
    </script>
     <script>
        function buscarPersonaNombres(){
            nombre=$("#txtbuscarnombre").val();
            apepat=$("#txtbuscarapellidopat").val();
            apemat=$("#txtbuscarapellidomat").val();
            if (nombre.trim()=='') {
            nombre="-";
            }
            if (apepat.trim()=='') {
            apepat="-";
            }
            if (apemat.trim()=='') {
            apemat="-";
            }

            $.ajax({
            type: "GET",
            url: "/socios/buscarnombre/"+nombre+"/"+apepat+"/"+apemat,
            dataType: "json",
            beforeSend: function() {
                $("#spinner_buscar_nombre").prop('hidden',false);
            },
            success: function (response) {
                $("#DTBuscarSocio tbody").html("");
                response.forEach(element => {
                    $("#DTBuscarSocio").append('<tr>'+
                    '<td>'+element.id+'</td>'+
                    '<td><button class="btn btn-warning btn-sm btnSeleccionar"><i class="bx bx-plus"></i></button></td>'+
                    '<td>'+element.nro_doc_identidad+'</td>'+
                    '<td>'+element.nombre+'</td>'+
                    '<td>'+element.apellido_paterno+'</td>'+
                    '<td>'+element.apellido_materno+'</td>'+
                    '<td>'+element.provincia+'</td>'+
                    '<td>'+element.distrito+'</td>'+
                    '<td>'+element.direccion+'</td>'+
                    '<td>'+element.numero+'</td>'+
                    '</tr>');
                });
                $("#spinner_buscar_nombre").prop('hidden',true);
            }

            });
        };
    </script>
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=&callback=iniciarMapa"></script> --}}
    
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>
    
    <script src="assets/js/widgets.js"></script>
    <script>
        var fecha = new Date();
        document.getElementById("FechaVisita").value = fecha.toJSON().slice(0, 10);
    </script>
@endsection
