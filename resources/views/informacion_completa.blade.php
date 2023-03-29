
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
                    <div class="col-sm-3">
                        <label for="">Provincia</label>
                        <input type="text" class="form-control form-control-sm" value="{{$dire->provincia}}" readonly>
                    </div>
                    <div class="col-sm-3">
                        <label for="">Distrito</label>
                        <input type="text" class="form-control form-control-sm" value="{{$dire->distrito}}" readonly>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control form-control-sm" value="{{$dire->direccion}} {{$dire->numero}}" readonly>
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

    @endsection
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
                e.preventDefault();
                $("header").css('display', 'none');
                $(".sidebar-wrapper").css('display', 'none');
                $("footer").css('display', 'none');
                $("#btnImprimir").css('display','none');
                imprSelec("seleccion");
            });
            function imprSelec(nombreDiv) {
                window.print();
                $("header").css('display', '');
                $(".sidebar-wrapper").css('display', '');
                $("footer").css('display', '');
                $("#btnImprimir").css('display','');
                // var mywindow = window.open('', 'PRINT', 'height=400,width=600');
                // mywindow.document.write('<html><head>');
                // // mywindow.document.write(document.getElementById("css").innerHTML);
                // mywindow.document.write('</head>');
                // // mywindow.document.write('<style></style>');
                // mywindow.document.write('<body>');
                // mywindow.document.write(document.getElementById(nombreDiv).innerHTML);
                // mywindow.document.write('</body></html>');
                // mywindow.document.close(); // necesario para IE >= 10
                // mywindow.focus(); // necesario para IE >= 10
                // mywindow.print();
                // mywindow.close();
                // return true;
            
            

                ////////////////////////////////////////////////777777
                // var ventana = window.open('', 'PRINT', 'height=400,width=600');
                // ventana.document.write('<html><head><title>' + document.title + '</title>');
                // ventana.document.write('<link rel="stylesheet" href="style.css">'); //Aquí agregué la hoja de estilos
                // ventana.document.write('</head><body >');
                // ventana.document.write(nombreDiv.innerHTML);
                // ventana.document.write('</body></html>');
                // ventana.document.close();
                // ventana.focus();
                // ventana.onload = function() {
                    //     ventana.print();
                    //     ventana.close();
                    // };
                    // return true;
                /////////////////////////////////////////////////////////////
                // var contenido = document.getElementById(nombreDiv).innerHTML;
                // var contenidoOriginal= document.body.innerHTML;
                // document.body.innerHTML = contenido;
                // window.print();
                // document.body.innerHTML = contenidoOriginal;
                            
            }
            
           

        </script>
    @endsection
@endauth
@endif

