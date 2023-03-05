@extends('layouts.base')
@section('encabezado')
  @include('layouts.header')  
@endsection

@section('contenido')
    <section class="service-area pt-90 pb-80">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-55 wow fadeInUp">
                        <h2>Todas las Noticias</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach ($noticias as $noti)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="service-item service-style-one mb-40 wow fadeInDown" data-wow-delay=".3s">
                            <div class="icon">
                                <img src="{{asset('storage/noticias/'.$noti->archivo)}}" style="heigth:300px" alt="">
                            </div>
                            <div class="text">
                                <h4 class="title">
                                <a href="#">
                                    {{$noti->Titulo}}
                                </a></h4>
                                <ul class="list-style-two">
                                    <li style="font-size: 13px;">
                                        {{ Str::limit($noti->Descripcion,100)}}
                                    </li>
                                </ul>
                                <a target="_blank" href="noticia_independiente/{{$noti->id}}" class="btn-link">Leer más</a>
                            </div>
                        </div>
                    </div>    
                @endforeach  
            </div>
        </div>
    </section>    
@endsection

@section('pie_pagina')
  @include('layouts.footer')
@endsection