@extends('layouts.panel')

@section('content')

    <h5><a href="/home">Inicio / </a><a href="paneladmin">Panel Admin / </a><a href="">Formulario de Visitas</a></h5>

    
        <h4>Ingrese un DNI</h4>
        <form action="">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control form-control" required>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-warning" type="submit"><i class="lni lni-search"></i> Buscar</button>
                </div>
            
        </div>
        </form>

@endsection

@section('extra_js')
    <script src="app_js/crud.js"></script>
    <script src="app_js/visitas.js"></script>
    <script src="assets/js/widgets.js"></script>
@endsection
