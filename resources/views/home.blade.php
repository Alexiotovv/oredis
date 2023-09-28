@extends('layouts.base')

@section('encabezado')
  @include('layouts.header')
@endsection

@section('extra_css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
@endsection

@section('contenido')
<br><br><br><br>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            
            @foreach ($slider as $slider)
                
                    <div class="carousel-item @if ($loop->first) active @endif" data-bs-interval="10000">    
                        
                    <img src="{{asset('storage/noticias/'. $slider->archivo)}}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block" style="background-color: rgba(83, 234, 232, 0.7)">
                            <h5 style="font-size: 30px">{{$slider->Titulo}}</h5>
                            <p>{{$slider->Descripcion}} </p>
                            <a class="btn btn-primary" href="/noticia_independiente/{{$slider->id}}">Leer Más...</a>
                    </div>
                </div>
            @endforeach
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    {{-- <div class="container" style="margin-top: -140px;">
        <div class="row">
        <div class="col-xl-8 col-lg-12">
                <div class="hero-content">
                    <h1 class="wow fadeInUp" data-wow-delay=".5s" style="color: white; font-size:69px;">
                        {{$obj->texto_banner}}
                    </h1>

                    <p class="wow fadeInDown" data-wow-delay=".1s" style="color: white">
                        {{$obj->pie_banner}}
                    </p>
                    <a href="#" id="btnLogin2" class="main-btn arrow-btn wow fadeInUp" data-wow-delay=".5s">Acceder</a>
                </div>
            </div>
        </div>
    </div>

    <div class="hero-img hero-img-two scene">
        <span data-depth=".5">
            <img  src="{{asset('storage/contenido/'.$obj->foto_banner)}}" class="wow fadeInLeft" alt="hero image">

        </span>
    </div> --}}

    <section>
        <div class="container" style="padding-top: 30px; text-align:center;">
            <h4>OFICINA REGIONAL DE ATENCIÓN A LA PERSONA CON DISCAPACIDAD - OREDIS</h4>
            <P>"Proyecto de Ordenanza Regional de Personas con Discapacidad en la Región Loreto.
                Creado con Ordenanza Regional N°011-2022-GRL-CR"</p>
        </div>
        <div class="container" style="text-align: center">
            <img src="../../../assets/images/icons/disc_icons.png" style="width: 300px;height:70px;" alt="">
        </div>
    </section>


    <section class="about-area about-area-v1 position-relative pt-130">
        <div class="row">
            <div class="col-sm-9">
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
                
            </div>
            <div class="col-sm-3">
                <div class="card" >
                    <div class="card-header" style="text-align: center">
                        Normas Publicadas
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach ($normas as $n)
                            <li class="list-group-item">
                                Publicado el {{$n->fecha}}.
                                <div class="input-group">
                                    <img src="../../../assetss/images/icon/pdf-icon.png" style="height:30px; width: 30px;"> <a target="blank_" href="{{asset('storage/normas/'.$n->archivo)}}">{{$n->titulo}}</a>
                                </div>
                                <p>{{$n->descripcion}}</p>
                            </li>
                        @endforeach
                        
                    </ul>
                        
                    <div class="card-body" style="text-align: center">
                        <a href="#" class="btn btn-primary">Ver todas las normas...</a>
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
                        <p>Publicado el {{$bannerModal->Fecha}}</p>
                        
                    </div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">{{$bannerModal->Titulo}}</h5>

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
@section('extra_js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection
@section('pie_pagina')
  @include('layouts.footer')
@endsection
