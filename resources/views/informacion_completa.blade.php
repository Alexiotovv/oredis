
@if (Route::has('login'))
@auth
  @extends('layouts.panel')
  @section('content')
    <h5><a href="/home">Inicio / </a><a href="/paneladmin">Panel Admin / </a><a href="#">Información Completa</a> </h5>

    <div id="seleccion">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Datos Personales</h5>
                    </div>
                    <div class="col-md-4">
                        <label for="">Fecha de Empadronamiento: {{$disc->fecha_empadronamiento}}</label>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-primary btn-sm" href="" id="btnImprimir"><i class="lni lni-printer"></i> Imprimir</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label for="">DNI</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->nro_doc_identidad}}" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Nombre Completo</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->nombre}}" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Apellidos</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->apellido_paterno}} {{$disc->apellido_materno}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">E. Civil</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->estado_civil}}(A)" readonly>
                    </div>
                    {{-- 12 --}}
    
                    <div class="col-sm-3">
                        <label for="">Correo</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->correo}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Teléfono</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->telefono}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">F. Nacimiento</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->fecha_nacimiento}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Sexo</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->sexo}}" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Ocupación</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->ocupacion}}" readonly>
                    </div>
                    {{-- 12 --}}
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5>Condición de la Persona</h5>
                    <div class="col-sm-2">
                        <label for="">Cert. Discapacidad</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->flag_certifi_discapacidad}}" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Tipo Discapacidad</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->tipo_discapacidad}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Dx. Discapacidad</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->diagnostico_discapacidad}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Requiere Ayuda</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->requiere_ayuda}}" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Tipo Ayuda</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->tipo_ayuda}}" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Ayuda Mec.</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->ayuda_mecanica}}" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <h5>Datos del Apoderado</h5>
                    <div class="col-sm-2">
                        <label for="">DNI</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->dni_apoderado}}" readonly>
                    </div>
                    <div class="col-sm-4">
                        <label for="">Nombre Completo</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->nombre_apoderado}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Parentesco</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->parentesco}}" readonly>
                    </div>
                    
                    <div class="col-sm-4">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->direccion_apoderado}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Correo</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->correo_apoderado}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Seguro</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->seguro_salud}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">Tipo Seguro</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->tipo_seguro}}" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label for="">D.I.D.</label>
                        <input type="text" class="form-control form-control-sm" value="{{$disc->flg_carnet_did}}" readonly>
                    </div>
                </div>
            </div>
        </div>
        {{-- <script src="../app_js/jspdf.min.js"></script> --}}
    </div>

    @section('extra_js')
        <script>
            // function imprSelec(nombre) {
            //     var ficha = document.getElementById(nombre);
            //     var ventimp = window.open(' ', 'popimpr');
            //     ventimp.document.write( ficha.innerHTML );
            //     ventimp.document.close();
            //     ventimp.print( );
            //     ventimp.close();
            //}

            $("#btnImprimir").on('click', function(e) {
                imprSelec("seleccion");
            });
            function imprSelec(nombreDiv) {
                var contenido = document.getElementById(nombreDiv).innerHTML;
                var contenidoOriginal= document.body.innerHTML;
                document.body.innerHTML = contenido;
                window.print();
                document.body.innerHTML = contenidoOriginal;
            }
            
            // $("#btnImprimir").on('click', function(e) {
            //     e.preventDefault()
            //     var doc = new jsPDF();
            //     var elementHTML = $('#seleccion').html();
            //     var specialElementHandlers = {
            //         '#elementH': function (element, renderer) {
            //             return true;
            //         }
            //     };
            //     doc.fromHTML(elementHTML, 15, 15, {
            //         'width': 170,
            //         'elementHandlers': specialElementHandlers
            //     });
            //     // Save the PDF
            //     doc.save('sample-document.pdf');
            // });

        </script>
    @endsection
  @endsection
@endauth
@endif

