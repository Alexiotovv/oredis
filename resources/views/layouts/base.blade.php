<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>OREDIS</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Place favicon.ico in the root directory -->
  
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="assets/css/LineIcons.2.0.css" />
    {{-- <link rel="stylesheet" href="assets/css/tiny-slider.css" /> --}}
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/lindy-uikit.css" />
    <script src="assets/js/cdn.min_2.js" defer></script>
    <script src="assets/controller/data.js"></script>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png">
    
    <script src="assets/js/axios.min.js"></script>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
      
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    @yield('extra_css')
  </head>
  
<body>

{{-- Ventan Login --}}
    <form action="login" method="POST">@csrf
        <!-- Modal -->
        <div class="modal fade" id="modalLogin" tabindex="-190" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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


<!-- Main header-->
<div class="preloader">
    <div class="loader">
      <div class="spinner">
        <div class="spinner-container">
          <div class="spinner-rotator">
            <div class="spinner-left">
              <div class="spinner-circle"></div>
            </div>
            <div class="spinner-right">
              <div class="spinner-circle"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ========================= preloader end ========================= -->

  <!-- ========================= hero-section-wrapper-5 start ========================= -->
  <section id="home" class="hero-section-wrapper-5">

    <!-- ========================= header-6 start ========================= -->
    <header class="header header-6">
      <div class="navbar-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                  <!-- <img src="assets/img/logo/logo.svg" alt="Logo" />-->
                  <h3>OREDIS</h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent6" aria-controls="navbarSupportedContent6"
                  aria-expanded="false" aria-label="Toggle navigation">
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent6">
                  <ul id="nav6" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a class="page-scroll active" href="#home">Inicio</a>
                    </li>
                    <li class="nav-item">
                      <a class="page-scroll" href="#pricing">Noticas</a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="page-scroll" href="#pricing">Pricing</a>
                      </li>-->
                    <li class="nav-item">
                      <a class="page-scroll" href="#about">Contacto</a>
                    </li>
                    <li class="nav-item">
                      
                        @if (Route::has('login'))
                            @auth
                              <a class="page-scroll" href="paneladmin">Hola {{ auth()->user()->name }}, Acceder</a>
                                                            
                              <form action="{{route('login')}}" method="post">
                                  @method('put')
                                  @csrf
                                  <button class="page-scroll" type="submit" style="background-color: transparent; border-color:transparent;">
                                      <a>Cerrar Sesión</a></button>
                              </form>
                            @else
                              <a href="" id="linkLogin">Login</a>
                            @endauth
                        @endif
                      
                      {{-- <a href="" >Login</a> --}}
                    </li>
                  </ul>
                </div>

                <div class="header-action d-flex">
                  <!--<a href="#0"> <i class="lni lni-cart"></i> </a>
                  <a href="#0"> <i class="lni lni-alarm"></i> </a>-->
                </div>
                <!-- navbar collapse -->
              </nav>
              <!-- navbar -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- navbar area -->
    </header>
    <!-- ========================= header-6 end ========================= -->

<!-- End Main header -->
     

<div class="content" style="padding-top: 8%">
  @yield('content')
</div>
<!-- Contenido --> 
    
<!-- Fin de Contenido -->
<div class="content">
  {{-- Pie de página --}}
  @include('layouts.footer')
  {{-- Fin pie de pagina --}}
</div>


{{-- Js Contenido --}}
  
    {{-- <script src="assets/js/bootstrap-5.0.0-beta1.min.js"></script> --}}
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script src="bootstrap/assets/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>    

    
    @yield('extra_js')

    <script>
      $('#linkLogin').on("click",function(e){
        e.preventDefault(); 
        $("#modalLogin").modal("show");
      })
    </script>
    
</body>

</html>