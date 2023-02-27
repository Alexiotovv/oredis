@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Formulario de Visitas</a></h5>
        
    

        <form action="">
            <div class="row">
                <h4>Ingrese un DNI</h4>
                <div class="input-group">    
                    <input type="text" class="form-control form-control" id="dniBuscar" required>
                    <button class="btn btn-warning" id="btnBuscarDireccion"><i class="lni lni-search"></i> Buscar</button>
                </div>
            </div>
            <br>
        </form>

        <form id="formGuardarVisita">@csrf
            <div class="row" >
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 id="NombrePersona"></h4>
                                    <label for="">Dirección</label>
                                    <input type="text" class="form-control" id="Direccion" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Vive Aquí?</label>
                            <select name="viveaqui" id="viveaqui" class="form-select">
                                <option value="1">Sí</option>
                                <option value="0">NO</option>
                            </select>
                        </div>
                    </div>
                
                    <div class="row">
                        <input type="text" id="idDireccion" name="idDireccion" readonly hidden>
                        <div class="col-md-3">
                            <br>
                            <a class="btn btn-primary" id="ObtenerUbicacion">Obtener Ubicación</a>
                            <a class="btn btn-danger" id="IngresarManualUbicacion">Ingresar Manual</a>
                        </div>
                        <div class="col-md-3">
                            <label for="">Latitud</label>
                            <input type="text" class="form-control" id="latitud" name="latitud" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="">Longitud</label>
                            <input type="text" class="form-control" id="longitud" name="longitud" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="">Altitud</label>
                            <input type="text" class="form-control" id="altitud" name="altitud" readonly>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Comentarios</label>
                            <textarea name="comentarios" id="comentarios" cols="30" rows="10" class="form-control" style="height: 60px;"></textarea>
                            </div>
                        
                    </div>
                </div>
                
                <div class="row">
                    <iframe src="" 
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade" id="mapa"></iframe>
                </div>

                <button class="btn btn-success" id="btnGuardarVisita" type="submit">Guardar Visita</button>
            </div>
        </form>

@endsection

@section('extra_js')
    <script src="app_js/crud.js"></script>
    <script src="app_js/visitas.js"></script>
    <script src="assets/js/widgets.js"></script>
@endsection
