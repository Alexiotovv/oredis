@extends('layouts.panel')
@section('content')
    
    <div class="row">
        <div class="col-md-4">
            <button class="btn btn-primary" id="btnNuevo"> Nuevo</button>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="DTAsociaciones">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Acciones</th>
                            <th>Provincia</th>
                            <th>Distrito</th>
                            <th>Nombre</th>
                            <th>Siglas</th>
                            <th>N° Partida</th>
                            <th>Direccion</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
        
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    @include('asociaciones.form_asociacion')
    @include('asociaciones.form_listarsocios')
    @include('asociaciones.form_socio')
    
@endsection

{{-- @include('asociaciones.form_socio') --}}


@section('extra_js')
{{-- <script>
    $("#btnImprimir").on('click', function(e) {
           e.preventDefault();
           imprSelec("seleccion");
       });
       function imprSelec(nombreDiv) {
           var contenido = document.getElementById(nombreDiv).innerHTML;
           var contenidoOriginal= document.body.innerHTML;
           document.body.innerHTML = contenido;
           window.print();
           document.body.innerHTML = contenidoOriginal;
       }
       
</script> --}}

    <script src="../../../app_js/crud.js"></script>    
    <script src="../../../app_js/asociaciones.js"></script>
    
    

    <script>
		$('.single-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
		$('.multiple-select').select2({
			theme: 'bootstrap4',
			width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
			placeholder: $(this).data('placeholder'),
			allowClear: Boolean($(this).data('allow-clear')),
		});
	</script>
    
@endsection