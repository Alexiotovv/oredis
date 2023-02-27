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
    {{-- <div class="offcanvas-panel">
        <div class="panel-overlay"></div>
        <div class="offcanvas-panel-inner">
            <div class="panel-logo">
                <a href="index-2.html"><img src="assets/images/logo/logo-1.png" alt="Logo"></a>
            </div>
            <div class="about-us">
                <h5 class="panel-widget-title">About Us</h5>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore ipsam alias quae cupiditate quas,
                    neque eum magni impedit asperiores.
                </p>
            </div>
            <div class="contact-us">
                <h5 class="panel-widget-title">Contact Us</h5>
                <ul>
                    <li>
                        <i class="fal fa-map-marker-alt"></i>
                        121 King St, Melbourne VIC 3000, Australia.
                    </li>
                    <li>
                        <i class="fal fa-envelope-open"></i>
                        <a
                            href="https://wordpressriverthemes.com/cdn-cgi/l/email-protection#670f020b0b08270506150c1e4904080a">
                            <span class="__cf_email__"
                                data-cfemail="056d6069696a456764776e7c2b666a68">[email&#160;protected]</span></a>
                        <a
                            href="https://wordpressriverthemes.com/cdn-cgi/l/email-protection#ec85828a83ac8e8d9e8795c28f8381"><span
                                class="__cf_email__"
                                data-cfemail="e980878f86a98b889b8290c78a8684">[email&#160;protected]</span></a>
                    </li>
                    <li>
                        <i class="fal fa-phone"></i>
                        <a href="tel:(312)-895-9800">(312) 895-9800</a>
                        <a href="tel:(312)-895-9888">(312) 895-9888</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="panel-close"><i class="fal fa-times"></i></a>
        </div>
    </div> --}}
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
        {{-- <div class="hero-img hero-img-three scene">
          <span data-depth=".3">
            <img src="assets/images/shape/circle-logo-1.png" class="wow fadeInLeft" alt="hero image">
          </span>
        </div> --}}
        {{-- <div class="shape shape-one scene">
          <span data-depth="1">
            <img src="assets/images/shape/shape-1.png" alt="shape">
          </span>
        </div>
        <div class="shape shape-two scene">
          <span data-depth="2">
            <img src="assets/images/shape/shape-2.png" alt="shape">
          </span>
        </div>
        <div class="shape shape-three scene">
          <span data-depth="3">
            <img src="assets/images/shape/shape-3.png" alt="shape">
          </span>
        </div> --}}

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
                            {{-- <img src="assets/images/shape/circle-logo-2.png" class="circle-logo"
                              alt="circle logo"> --}}
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
                        {{-- <ul class="list-style-one mb-35">
                            <li>Digital Creative Agency</li>
                            <li>Professional Problem Solutions</li>
                            <li>Web Design & Development</li>
                        </ul>
                        <a href="about.html" class="main-btn bordered-btn btn-blue arrow-btn">Learn More Us</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item service-style-one mb-40 wow fadeInDown" data-wow-delay=".3s">
                        <div class="icon">
                            {{-- <i class="flaticon-strategy"></i> --}}
                            <img src="assetss/images/noticias/noti_3.jpg" alt="entrega de silla de ruedas">
                        </div>
                        <div class="text">
                            <h4 class="title">
                              <a href="#">
                                Personas con discapacidad son beneficiadas con 150 sillas de ruedas.
                              </a></h4>
                            <ul class="list-style-two">
                                <li style="font-size: 13px;">El gobierno regional de Loreto, a través de la Oficina Regional de Atención a la Persona con 
                                  Discapacidad (OREDIS), entregó 150 sillas de ruedas plegables a asociaciones y gobiernos locales 
                                  que lo solicitaron, con la finalidad de lograr la independencia de cada uno de los beneficiarios.
                                </li>
                                {{-- <li>MVP Definition</li>
                                <li>Product Strategy</li> --}}
                            </ul>
                            <a href="#" class="btn-link">Leer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item service-style-one mb-40 wow fadeInDown" data-wow-delay=".5s">
                        <div class="icon">
                            {{-- <i class="flaticon-design"></i> --}}
                            <img src="assets/images/noticias/noti_2.jpg" alt="entrega de silla de ruedas">
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
                                {{-- <li>MVP Definition</li>
                                <li>Product Strategy</li> --}}
                            </ul>
                            <a href="service-details.html" class="btn-link">Leer más</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="service-item service-style-one mb-40 wow fadeInDown" data-wow-delay=".7s">
                        <div class="icon">
                            {{-- <i class="flaticon-source-code"></i> --}}
                            <img src="assetss/images/noticias/noti_1.jpg" alt="entrega de silla de ruedas">
                        </div>
                        <div class="text">
                            <h3 class="title">
                              <a href="#">
                                Gorel celebra el día nacional de la persona con discapacidad
                              </a>
                            </h3>
                            <ul class="list-style-two">
                                <li style="font-size: 13px;">En el Día Nacional de la Persona con Discapacidad y con el objetivo de 
                                  promover sus derechos en todos los ámbitos de la sociedad, el gobierno
                                   regional de Loreto a través de la OREDIS, organizó un evento deportivo 
                                   adaptado, como estrategia para fomentar la inclusión social de estas personas.
                                </li>
                                {{-- <li>MVP Definition</li>
                                <li>Product Strategy</li> --}}
                            </ul>
                            <a href="#" class="btn-link">Lee más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="portfolio-area portfolio-area-v1 light-gray-bg pt-130 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-title mb-45 wow fadeInUp">
                        <span class="sub-title st-one">Latest Work</span>
                        <h2>Professional Experience</h2>
                        <p>Professional Design Agency to provide solutions</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="portfolio-filter-button mb-50 wow fadeInLeft">
                        <ul class="filter-btn mb-20">
                            <li data-filter="*" class="active">Show All</li>
                            <li data-filter=".cat-1">Design</li>
                            <li data-filter=".cat-2">Branding</li>
                            <li data-filter=".cat-3">Development</li>
                            <li data-filter=".cat-4">SEO</li>
                            <li data-filter=".cat-5">UX/UI Design</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row portfolio-grid">
                <div class="col-lg-4 col-md-6 col-sm-12 cat-1 portfolio-column cat-3">
                    <div class="portfolio-item portfolio-style-one mb-55 wow fadeInUp" data-wow-delay=".1s">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-1.jpg" alt="Img">
                            <a href="assets/images/portfolio/img-1.jpg" class="portfolio-hover img-popup">
                                <div class="hover-content">
                                    <i class="far fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="project-details.html">Dashboard Design</a></h3>
                            <a href="projects.html" class="cat-link">Creative Design</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-column cat-2 cat-4">
                    <div class="portfolio-item portfolio-style-one mb-55 wow fadeInUp" data-wow-delay=".2s">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-2.jpg" alt="Img">
                            <a href="assets/images/portfolio/img-2.jpg" class="portfolio-hover img-popup">
                                <div class="hover-content">
                                    <i class="far fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="project-details.html">Landing Pages</a></h3>
                            <a href="projects.html" class="cat-link">Creative Design</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-column cat-3 cat-4">
                    <div class="portfolio-item portfolio-style-one mb-55 wow fadeInUp" data-wow-delay=".3s">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-3.jpg" alt="Img">
                            <a href="assets/images/portfolio/img-3.jpg" class="portfolio-hover img-popup">
                                <div class="hover-content">
                                    <i class="far fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="project-details.html">Illustration Design</a></h3>
                            <a href="projects.html" class="cat-link">Creative Design</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-column cat-4 cat-3">
                    <div class="portfolio-item portfolio-style-one mb-55 wow fadeInUp" data-wow-delay=".4s">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-4.jpg" alt="Img">
                            <a href="assets/images/portfolio/img-4.jpg" class="portfolio-hover img-popup">
                                <div class="hover-content">
                                    <i class="far fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="project-details.html">Dashboard Design</a></h3>
                            <a href="projects.html" class="cat-link">Creative Design</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-column cat-5 cat-1">
                    <div class="portfolio-item portfolio-style-one mb-55 wow fadeInUp" data-wow-delay=".5s">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-5.jpg" alt="Img">
                            <a href="assets/images/portfolio/img-5.jpg" class="portfolio-hover img-popup">
                                <div class="hover-content">
                                    <i class="far fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="project-details.html">Apps Development</a></h3>
                            <a href="projects.html" class="cat-link">Creative Design</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 portfolio-column cat-4 cat-2">
                    <div class="portfolio-item portfolio-style-one mb-55 wow fadeInUp" data-wow-delay=".6s">
                        <div class="img-holder">
                            <img src="assets/images/portfolio/img-6.jpg" alt="Img">
                            <a href="assets/images/portfolio/img-6.jpg" class="portfolio-hover img-popup">
                                <div class="hover-content">
                                    <i class="far fa-plus"></i>
                                </div>
                            </a>
                        </div>
                        <div class="text">
                            <h3 class="title"><a href="project-details.html">Website Design</a></h3>
                            <a href="projects.html" class="cat-link">Creative Design</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    <section class="cta-area cta-area-v1 pt-130">
        <div class="container-1450">
            <div class="cta-wrapper dark-blue-bg">
                <div class="cta-img wow fadeInDown ">
                  {{-- <img src="assets/images/cta/img-1.jpg" alt=""> --}}
                  <iframe height="450px;" width="450px;" src="https://scontent.fiqt3-1.fna.fbcdn.net/v/t42.1790-2/245192683_1269416270195466_4783279060783690977_n.mp4?_nc_cat=110&ccb=1-7&_nc_sid=985c63&efg=eyJybHIiOjQ5NiwicmxhIjo1MTIsInZlbmNvZGVfdGFnIjoic3ZlX3NkIn0%3D&_nc_eui2=AeHuW_n_AdYh4rRc5lW3qSJtbYmsnjaksmVtiayeNqSyZYZGxx0249SIBMzI8-bTYVQDcAU_xNzSVoKxGYKJeHec&_nc_ohc=eumFX4oPaFIAX9thZou&rl=496&vabr=276&_nc_ht=scontent.fiqt3-1.fna&edm=AGo2L-IEAAAA&oh=00_AfC9rXnc62IXaSntirbcDIhsqbwwv_ZuviJvPcZNhAbAxA&oe=63F11C81" frameborder="0"></iframe>
                  
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

    {{-- <section class="counter-area counter-area-v1 pt-240 pb-90">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-55 wow fadeInUp">
                        <span class="sub-title st-one">Agency Statistics</span>
                        <h2>Why People’s Like Us</h2>
                        <p>Professional Design Agency to provide solutions</p>
                    </div>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon">
                            <i class="flaticon-start-up"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span>256</span>+</h2>
                            <p>Project Complate</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 wow fadeInUp" data-wow-delay=".3s">
                        <div class="icon">
                            <i class="flaticon-creativity"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span>783</span>+</h2>
                            <p>Project Complate</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 wow fadeInUp" data-wow-delay=".4s">
                        <div class="icon">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span>97</span>+</h2>
                            <p>Awards Winning</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="counter-item mb-40 wow fadeInUp" data-wow-delay=".5s">
                        <div class="icon">
                            <i class="flaticon-technical-support"></i>
                        </div>
                        <div class="text">
                            <h2 class="number"><span>35</span>+</h2>
                            <p>Years Of Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="team-area team-area-v1 pt-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-55 wow fadeInUp">
                        <span class="sub-title st-one">Meet Our Team</span>
                        <h2>Experience Team Members</h2>
                        <p>Professional Design Agency to provide solutions</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-item mb-40 wow fadeInUp" data-wow-delay=".2s">
                        <div class="img-holder">
                            <img src="assets/images/team/img-1.jpg" alt="Team Image">
                            <div class="team-hover">
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text text-center">
                            <h4 class="title"><a href="team-details.html">Douglas J. Bleau</a></h4>
                            <p class="position">UX/UI Designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-item mb-40 wow fadeInUp" data-wow-delay=".3s">
                        <div class="img-holder">
                            <img src="assets/images/team/img-2.jpg" alt="Team Image">
                            <div class="team-hover">
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text text-center">
                            <h4 class="title"><a href="team-details.html">Thomas M. Wilso</a></h4>
                            <p class="position">Web Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-item mb-40 wow fadeInUp" data-wow-delay=".4s">
                        <div class="img-holder">
                            <img src="assets/images/team/img-3.jpg" alt="Team Image">
                            <div class="team-hover">
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text text-center">
                            <h4 class="title"><a href="team-details.html">Robert J. Ryan</a></h4>
                            <p class="position">SEO Marketing</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="team-item mb-40 wow fadeInUp" data-wow-delay=".5s">
                        <div class="img-holder">
                            <img src="assets/images/team/img-4.jpg" alt="Team Image">
                            <div class="team-hover">
                                <ul class="social-link">
                                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="text text-center">
                            <h4 class="title"><a href="team-details.html">Kenneth K. Joiner</a></h4>
                            <p class="position">UX/UI Designer</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

    {{-- <section class="contact-area contact-area-v1 pt-70 pb-80">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="text-wrapper mb-50 wow fadeInLeft">
                        <h2>Have Any on <span class="fill-text">Project</span>
                            Mind! <span class="fill-text">Contact</span> Us</h2>
                        <p>Sed ut perspiciatis unde omnis iste natus error voluptatem accusantium doloremque laudan
                            tium, totam rem aperiam, eaque ipsa quae abillo <span>inventore veritatis</span> et quasi
                            architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem</p>
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="information-style-one mb-40">
                                    <div class="icon">
                                        <span><i class="far fa-envelope-open"></i>Email Us</span>
                                    </div>
                                    <div class="info">
                                        <h4><a
                                                href="https://wordpressriverthemes.com/cdn-cgi/l/email-protection#aad9dfdadac5d8deeacdc7cbc3c684c9c5c7"><span
                                                    class="__cf_email__"
                                                    data-cfemail="2a595f5a5a45585e6a4d474b434604494547">[email&#160;protected]</span></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="information-style-one mb-40">
                                    <div class="icon">
                                        <span><i class="far fa-phone"></i>Phone Us</span>
                                    </div>
                                    <div class="info">
                                        <h4><a href="tel:+0123456789">+012 (345) 67 89</a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contact-form">
                            <form>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="text" class="form_control" placeholder="Full Name"
                                                name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form_group">
                                            <input type="email" class="form_control" placeholder="Email Address"
                                                name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <textarea class="form_control" placeholder="Write Message" name="message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form_group">
                                            <button class="main-btn arrow-btn">Send Us Message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="img-holder mb-50 wow fadeInRight">
                        <div class="shape shape-icon-one scene"><span data-depth="1"><img
                                    src="assets/images/shape/shape-4.png" alt=""></span></div>
                        <div class="shape shape-icon-two"><span></span></div>
                        <img src="assets/images/contact/contact-1.jpg" alt="Contact Image">
                    </div>
                </div>
        </div>
        </div>
        <!-- container -->
            </div>
        <!-- container -->
        </div>
    </section> --}}

    {{-- <section class="blog-area blog-area-v1 light-gray-bg pt-130 pb-130">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title text-center mb-55 wow fadeInUp" data-wow-delay=".2s">
                        <span class="sub-title st-one">Articles News</span>
                        <h2>Latest News & Blogs</h2>
                        <p>Professional Design Agency to provide solutions</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item mb-40 wow fadeInUp" data-wow-delay=".25s">
                        <div class="entry-content">
                            <a href="#" class="cat-btn">Design</a>
                            <h3 class="title"><a href="blog-details.html">Everything You Want To Know About</a></h3>
                            <p>Sit amet consectete adipising elit
                                wedo eiusmod temeidiunt laboret dolore magna ways</p>
                            <a href="blog-details.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item mb-40 wow fadeInUp" data-wow-delay=".30s">
                        <div class="entry-content">
                            <a href="#" class="cat-btn">Design</a>
                            <h3 class="title"><a href="blog-details.html">Designing Better Links For Websites And
                                    Emails</a></h3>
                            <p>Sit amet consectete adipising elit
                                wedo eiusmod temeidiunt laboret dolore magna ways</p>
                            <a href="blog-details.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="blog-post-item mb-40 wow fadeInUp" data-wow-delay=".35s">
                        <div class="entry-content">
                            <a href="#" class="cat-btn">Design</a>
                            <h3 class="title"><a href="blog-details.html">Everything You Want To Know About</a></h3>
                            <p>Sit amet consectete adipising elit
                                wedo eiusmod temeidiunt laboret dolore magna ways</p>
                            <a href="blog-details.html" class="btn-link">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="button-box text-center wow fadeInUp">
                        <a href="blogs.html" class="main-btn arrow-btn">View More News</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

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
