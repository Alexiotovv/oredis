@extends('layouts.base')

@section('encabezado')
  @include('layouts.header')  
@endsection

@section('contenido')
     <section class="hero-banner-v1 position-relative">
        {{-- <div class="bg-one"></div>
        <div class="bg-two"></div> --}}
        {{-- <div class="hero-img hero-img-one scene">
          <span data-depth=".5"><img src="assetss/images/hero/hero-one-img-1.jpg" class="wow fadeInLeft" alt="hero image">
          </span>
        </div> --}}

        <div class="hero-img hero-img-two scene">
          <span data-depth=".5">
            <img style="width: 90%" src="{{asset('storage/contenido/'.$obj->foto_banner)}}" class="wow fadeInLeft" alt="hero image">
          </span>
        </div>

        <div class="container" style="margin-top: -140px;">
          <div class="row">
            <div class="col-xl-8 col-lg-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".5s" style="color: white">
                            {{$obj->texto_banner}}
                        </h1>
                        <p class="wow fadeInDown" data-wow-delay="1s" style="color: white">
                            {{$obj->pie_banner}}
                        </p>
                        <a href="#" id="btnLogin2" class="main-btn arrow-btn wow fadeInUp" data-wow-delay=".5s">Acceder</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="about-area about-area-v1 position-relative pt-130">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="img-holder-box mb-50">
                        <div class="img-holder wow fadeInLeft">
                            <img src="{{asset('storage/contenido/'.$obj->foto_objetivo)}}" alt="Image">
                        </div>
                        <div class="shape shape-one">
                          <span class="animate-float-y">
                          </span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="text-wrapper mb-50 wow fadeInRight">
                        <div class="section-title mb-15">
                            <span class="sub-title st-one">Nosotros</span>
                            <h2>Objetivo
                                </h2>
                        </div>
                        <h4>El objetivo de OREDIS es:</h4>
                        <p>{{$obj->objetivo}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Seccion Noticias --}}
    <section class="service-area pt-90 pb-80">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-55 wow fadeInUp">
                        <span class="sub-title st-one">Noticias</span>
                        <h2>Últimas Noticias</h2>
                        <p><a href="/shownoticias"> Ver Todas las Noticias</a></p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <style>
                    
                </style>
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
                                        {{Str::limit($noti->Descripcion,100)}}
                                    </li>
                                </ul>
                                <a target="_blank" href="/noticia_independiente/{{$noti->id}}" class="btn-link">Leer más</a>
                            </div>
                        </div>
                    </div>    
                @endforeach  
            </div>
        </div>
    </section>

    <section class="cta-area cta-area-v1 pt-130">
        <div class="container-1450">
            <div class="cta-wrapper dark-blue-bg">
                <div class="cta-img wow fadeInDown">
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-8">
                        <div class="text-wrapper wow fadeInUp">
                            <div class="section-title section-title-white mb-55">
                                <span class="sub-title st-one">Evento</span>
                                <h2>
                                    {{$obj->texto_evento}}
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4">
                        <a href="#" class="main-btn bordered-btn btn-white arrow-btn">
                            {{$obj->pie_evento}}
                          </a>
                    </div>

                </div>
            </div>
        </div>
    </section>



    @if ($bannerModal !== null)
    <div class="modal fade" id="modalBanner" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h5 class="modal-title" id="exampleModalLabel">{{$bannerModal->Titulo}}</h5>
                        </div>
                        <div class="col-sm-6">
                            <p style="font-size:13px;">{{$bannerModal->Fecha}}</p>
                        </div>
                    </div>
                        
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    {{Str::limit($bannerModal->Descripcion,100)}}
                    
                </div>
                <div class="modal-footer">
                    <a href="/noticia_independiente/{{$bannerModal->id}}" class="btn btn-info">Leer Más...</a>
                </div>

            </div>
            </div>
        </div>
    @endif
    <br>
    
    

    <script src="../assets/js/jquery.js"></script>
    <script>
        function banner() { 
            $("#modalBanner").modal('show');
            }
        setTimeout(banner, 2000);
        // if ($("#formContacto").on("click",function (e) { 
        //     e.preventDefault();
            
        //  }));

        
    </script>
@endsection

@section('pie_pagina')
  @include('layouts.footer')
@endsection
