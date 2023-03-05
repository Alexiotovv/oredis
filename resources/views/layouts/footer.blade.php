<footer class="footer-area">
    <div class="container">
        <div class="footer-top pt-75 pb-40">
            <div class="row align-items-center">
                {{-- <div class="col-md-6">
                    <div class="footer-logo mb-40 wow fadeInLeft">
                        <img src="assets/images/logo/footer-logo-1.png" alt="Brand Logo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-wrapper mb-40 wow fadeInRight">
                        <h3>
                            <span class="blue-dark">OREDIS</span>
                        </h3>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="footer-widget pt-70 pb-40">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget footer-nav-widget mb-40 wow fadeInUp" data-wow-delay=".15s">
                        <h4 class="widget-title">Contacto</h4>
                        <ul class="widget-nav">
                            <li><a href="#">{{$obj->telefono}}</a></li>
                            <li><a href="#">{{$obj->correo}}</a></li>
                            <li><a href="#">{{$obj->direccion}}</a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="widget footer-nav-widget mb-40 wow fadeInUp" data-wow-delay=".20s">
                        <h4 class="widget-title">Enlaces de Interés</h4>
                        <ul class="widget-nav">
                            <li><a href="{{$obj->enlace1}}">{{$obj->nombre_enlace1}}</a></li>
                            <li><a href="{{$obj->enlace2}}">{{$obj->nombre_enlace2}}</a></li>
                            <li><a href="{{$obj->enlace3}}">{{$obj->nombre_enlace3}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-12">
                    <div class="widget social-widget mb-40 wow fadeInUp" data-wow-delay=".25s">
                        <h4 class="widget-title">Síguenos en</h4>
                        <ul class="social-nav">
                            {{-- <li><a href="#"><i class="fab fa-dribbble"></i>Dribbble</a></li> --}}
                            <li><a href="#"><i class="fab fa-instagram"></i>Instagram</a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i>Twitter</a></li>
                            {{-- <li><a href="#"><i class="fab fa-behance"></i>Behance</a></li> --}}
                            <li><a href="#"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                            {{-- <li><a href="#"><i class="fab fa-medium-m"></i>Medium</a></li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-copyright">
            <div class="row">
                <div class="col-lg-6">
                    <div class="copyright-text">
                        <p>&copy; 2024. All rights reserved design by Webtend</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer-nav float-lg-right">
                        <ul>
                            <li><a href="service-details.html">Setting & Privacy </a></li>
                            <li><a href="service-details.html">Faqs</a></li>
                            <li><a href="service-details.html">Services</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
