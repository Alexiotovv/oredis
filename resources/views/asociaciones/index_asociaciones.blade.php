@extends('layouts.panel')
@section('extra_css')
    <style>
        /* .btnListarsocios:hover{

        } */
    </style>
@endsection
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
                            {{-- <th>Socio</th>
                            <th>TipoSocio</th> --}}
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

    @include('asociaciones.form_listarsocios')
    @include('asociaciones.form_asociacion')
    @include('asociaciones.form_buscarsocio')
    @include('asociaciones.form_socio')

    <div class="offcanvas offcanvas-end" tabindex="-1" id="VerSocios" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">Socios Registrados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <div class="row">
            <div class="col-sm-6">
                <p id="Nombreasociacion"></p>
            </div>
            <div class="col-sm-6">
                <p id="Cantidadsocios"></p>
            </div>
        </div>
        
        
        <hr>
        <div id="Socios">

        </div>

      </div>
    </div>




@endsection

{{-- @include('asociaciones.form_socio') --}}


@section('extra_js')
    <script>
        $(document).on("click",".btnVerSocios",function (e) {
            e.preventDefault();
            fila = $(this).closest("tr");
            id= (fila).find('td:eq(0)').text();
            x=0;
            $("#Nombreasociacion").text('Asociación :'+(fila).find('td:eq(4)').text());
            $.ajax({
                type: "GET",
                url: "/socios/listar/"+id,
                dataType: "json",
                success: function (response) {
                    $("#Socios").html("");
                    response.forEach(element => {
                        //console.log(element);
                        x+=1;
                        $("#Socios").append('<p>Socio #'+ x +'</p>')
                        $("#Socios").append('<p>'+'Nombre: '+ element.nombre+' '+ element.apellido_paterno + ' '+element.apellido_materno+'</p>');
                        $("#Socios").append('<p>'+'Tipo: '+ element.tipo_socio+'</p>');
                        $("#Socios").append('<p>'+'Telefono: '+ element.telefono+'</p>');
                        $("#Socios").append('<p>'+'Correo: '+ element.correo+'</p>');
                        $("#Socios").append('<p>'+'TipoDiscapacidad: '+ element.tipo_discapacidad+'</p>');
                        $("#Socios").append('<hr>');
                        $("#Cantidadsocios").text('Cant. Socios :'+x);
                    });
                }
            });
            

        });
    </script>

    <script src="../../../app_js/crud.js"></script>
    <script src="../../../app_js/asociaciones.js"></script>
    
    {{-- Para los estilos en excel --}}
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.2.0/js/buttons.html5.styles.templates.min.js"></script>
    {{-- End Para los estilos en excel --}}
    
    <script>
        $("#btnImprimir").on("click",function (e) {
            e.preventDefault();
            window.print()
        });
    </script>

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