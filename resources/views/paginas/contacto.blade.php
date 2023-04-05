@extends('layouts.base')
@section('encabezado')
  @include('layouts.header')  
@endsection

@section('contenido')
<section class="service-area pt-90 pb-80">
    <div class="container">
        <h2 style="text-align: center">Formulario de Contacto</h2>
            
                @if (session()->has('guardo')=='si')
                    <div class="alert alert-success" role="alert" style="width: 90%">
                        Su solicitud fue enviado, pronto se contactarán con usted.!
                    </div>
                @endif
            
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form">
                        <form action="{{route('contacto.store')}}" method="POST">@csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form_group">
                                        <input type="text" class="form_control" maxlength="100" placeholder="Nombre Completo" name="nombre" required="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_group">
                                        <input type="email" class="form_control" maxlength="50" placeholder="Correo Electrónico " name="correo" required="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form_group">
                                        <input type="text" class="form_control" maxlength="30" placeholder="Número Celular" name="telefono" required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group">
                                        <textarea class="form_control" maxlength="250" placeholder="Escribe tu mensaje" name="mensaje"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form_group text-center">
                                        <button class="main-btn">Enviar Mensaje</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>
@endsection


