@extends('layouts.base')
@section('encabezado')
  @include('layouts.header')  
@endsection

@section('contenido')
    <section class="service-area pt-90 pb-80">
        <div class="container">
            <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="service-item service-style-one mb-40 wow fadeInDown" data-wow-delay=".3s">
                            <div class="icon">
                                <img src="{{asset('storage/noticias/'.$noticias->archivo)}}" style="heigth:300px" alt="">
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-8">
                        <h4 class="title" style="text-align: center">
                            {{$noticias->Titulo}} 
                        </h4>Fecha: {{$noticias->Fecha}}
                        <hr>
                        {{$noticias->Descripcion}}
                        {{-- <a href="noticia_independiente/{{$noti->id}}" class="btn-link">Leer más</a> --}}
                    </div>
                        
                        
                    
            </div>
        </div>
    </section>    
@endsection

@section('pie_pagina')
  @include('layouts.footer')
@endsection