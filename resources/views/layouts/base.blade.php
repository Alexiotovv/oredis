<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from wordpressriverthemes.com/htmltemp/pixlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Feb 2023 14:26:29 GMT -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>OREDIS</title>
    <link rel="shortcut icon" href="assetss/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="assetss/css/default.css">
    <link rel="stylesheet" href="assetss/css/style.css">
    <link rel="stylesheet" href="assetss/css/responsive.css">
</head>

<body>
    {{-- Ventan Login --}}
    <form action="login" method="POST">@csrf
      <!-- Modal -->
      <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Inicie Sesión</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
              </div>
              <div class="modal-body">
                  <label for="">Usuario</label>
                  <input type="text" class="form form-control" name="name" id="name">
                  <label for="">Contraseña</label>
                  <input type="password" class="form form-control" name="password" id="password">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Ingresar</button>
              </div>

          </div>
          </div>
      </div>
    </form>
  {{-- End Ventana Login --}}
    <div class="preloader">
        <div class="loader">
            <div class="pre-shadow"></div>
            <img src="assetss/images/icon/regionloreto.png" alt="">
            {{-- <div class="pre-box"></div> --}}
            
        </div>
    </div>
   
    @yield('encabezado')

    <section class="hero-banner-v1 position-relative">
        <div class="bg-one"></div>
        <div class="bg-two"></div>
        <div class="hero-img hero-img-one scene">
          <span data-depth=".5"><img src="assetss/images/hero/hero-one-img-1.jpg" class="wow fadeInLeft" alt="hero image">
          </span>
        </div>
        <div class="hero-img hero-img-two scene">
          <span data-depth=".2">
            <img src="assetss/images/hero/hero-one-img-2.jpg" class="wow fadeInLeft" alt="hero image">
          </span>
        </div>
       

        <div class="container" style="margin-top: -140px;">
          <div class="row">
            <div class="col-xl-8 col-lg-12">
                    <div class="hero-content">
                        <h1 class="wow fadeInUp" data-wow-delay=".5s">Bienvenido al portal
                          de personas con capacidades diferentes
                        </h1>
                        <p class="wow fadeInDown" data-wow-delay="1s">Brindamos un portal de administración
                          para el registro de las personas.
                        </p>
                        <a href="contact.html" class="main-btn arrow-btn wow fadeInUp" data-wow-delay=".5s">Acceder</a>
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
                            <img src="assetss/images/hero/hero-three-img-1-1.png" alt="Image">
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
                        <p>Lograr el desarrollo inclusivo y participativo de la persona con discapacidad, al mismo tiempo 
                          que pueda acceder a los distintos servicios tales como salud, trabajo de manera prioritaria dentro
                           de la agenda de desarrollo social, es importante lograr la inclusión de la persona con discapacidad 
                           y nuestra principal actividad es la promoción del empleo de estas personas.</p>
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
                        <p>Las Noticias más importantes están aquí</p>
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
                                        {{!! Str::limit($noti->Descripcion,100)!!}}
                                    </li>
                                </ul>
                                <a href="#" class="btn-link">Leer más</a>
                            </div>
                        </div>
                    </div>    
                @endforeach
                
                
                {{-- <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item service-style-one mb-40 wow fadeInDown" data-wow-delay=".5s">
                        <div class="icon">

                            <img src="assetss/images/noticias/noti_2.jpg" alt="">
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="#">Gorel celebra el día nacional de la 
                              persona con discapacidad
                            </a></h3>
                            <ul class="list-style-two">
                                <li style="font-size: 13px;">En la celebración del Día Nacional de la Persona con Discapacidad, 
                                  el Gorel organizo un evento deportivo adaptado. El acto inaugural, 
                                  contó con la presencia del Lic. Elisban Ochoa, funcionarios y equipos
                                   deportivos, conformados por miembros de asociaciones, CEBE's y OMAPED's 
                                   de la provincia de Maynas.
                                </li>

                            </ul>
                            <a href="service-details.html" class="btn-link">Leer más</a>
                        </div>
                    </div>
                </div> --}}

               
                
            </div>
        </div>
    </section>


    <section class="cta-area cta-area-v1 pt-130">
        <div class="container-1450">
            <div class="cta-wrapper dark-blue-bg">
                <div class="cta-img wow fadeInDown ">
                  <img src="assets/images/cta/img-1.jpg" alt="">
                  
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <div class="text-wrapper wow fadeInUp">
                            <div class="section-title section-title-white mb-55">
                                <span class="sub-title st-one">Evento</span>
                                <h2>CELEBRAMOS EL DÍA DE LA PERSONA CON DISCAPACIDAD CON EVENTO DEPORTIVO ADAPTADO 
                                  </h2>
                            </div>
                            <a href="#" class="main-btn bordered-btn btn-white arrow-btn">
                              Los participantes disputan las siguientes disciplinas: Futsal para personas con 
                              discapacidad visual, motora y severa. Además de basquet para personas con
                              discapacidad motora. Este importante evento, que se desarrolla en el coliseo
                              cerrado de Iquitos, concluye el día de hoy con la premiación de equipos ganadores.
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 

    @yield('pie_pagina')

    <a href="#" class="back-to-top"><i class="far fa-angle-up"></i></a>
    <script data-cfasync="false" src="assetss/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assetss/vendor/jquery-3.6.0.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/popper/popper.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/bootstrap/js/bootstrap.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/slick/slick.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/magnific-popup/dist/jquery.magnific-popup.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/isotope.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/imagesloaded.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/jquery.counterup.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/jquery.waypoints.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/nice-select/js/jquery.nice-select.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/wow.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/vendor/parallax.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/js/theme.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="assetss/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="fcd2a3ed92a7775c946711b7-|49" defer=""></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"79b770648a486dfe","version":"2023.2.0","r":1,"token":"52ad871770524b3e8ca1e53094efe67a","si":100}'
        crossorigin="anonymous"></script>
  {{-- <script src="bootstrap-5.3.0/js/jquery.js"></script> --}}

 



  <script src="assets/js/jquery.js"></script>
        <script>
          $("#btnLogin").on('click', function(e) {
            e.preventDefault();
            $("#modalLogin").modal('show');
          });
        </script>

</body>

</html>
