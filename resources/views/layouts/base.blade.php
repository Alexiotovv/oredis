<!DOCTYPE html>
<html lang="es">

<!-- Mirrored from wordpressriverthemes.com/htmltemp/pixlab/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 18 Feb 2023 14:26:29 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>OREDIS</title>
    <link rel="shortcut icon" href="../../../assetss/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="../../../assetss/css/default.css">
    <link rel="stylesheet" href="../../../assetss/css/style.css">
    <link rel="stylesheet" href="../../../assetss/css/responsive.css">
    @yield('extra_css')
</head>

<body>
    {{-- Ventan Login --}}
    <form action="/login" method="POST">@csrf
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
            <img src="../../assetss/images/icon/regionloreto.png" alt="">
            {{-- <div class="pre-box"></div> --}}
            
        </div>
    </div>
   
    @yield('encabezado')

    @yield('contenido')

    @yield('pie_pagina')

    <a href="#" class="back-to-top"><i class="far fa-angle-up"></i></a>
    <script data-cfasync="false" src="../../../assetss/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="../../../assetss/vendor/jquery-3.6.0.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/popper/popper.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/bootstrap/js/bootstrap.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/slick/slick.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/magnific-popup/dist/jquery.magnific-popup.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/isotope.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/imagesloaded.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/jquery.counterup.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/jquery.waypoints.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/nice-select/js/jquery.nice-select.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/wow.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/vendor/parallax.min.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/js/theme.js" type="fcd2a3ed92a7775c946711b7-text/javascript"></script>
    <script src="../../../assetss/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="fcd2a3ed92a7775c946711b7-|49" defer=""></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993"
        integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA=="
        data-cf-beacon='{"rayId":"79b770648a486dfe","version":"2023.2.0","r":1,"token":"52ad871770524b3e8ca1e53094efe67a","si":100}'
        crossorigin="anonymous"></script>
  {{-- <script src="bootstrap-5.3.0/js/jquery.js"></script> --}}

  <script src="../assets/js/jquery.js"></script>
  <script>
    $("#btnLogin").on('click', function(e) {
      e.preventDefault();
      $("#modalLogin").modal('show');
    });
    $("#btnLogin2").on('click', function(e) {
      e.preventDefault();
      $("#modalLogin").modal('show');
    });
    

    $("#accesibility").on("click",function () { 
      $("#icon-inicio").removeAttr("hidden");
      $("#icon-contacto").removeAttr("hidden");
      $("#icon-noticia").removeAttr("hidden");
    })


    $("#icon-noticia").mouseover(function () { 
      $("#senal-noticia").removeAttr("hidden");
    });
    
    $("#icon-noticia").mouseleave(function () { 
      $("#senal-noticia").prop("hidden",true);
    });
  </script>
  @yield('extra_js')
</body>

</html>
