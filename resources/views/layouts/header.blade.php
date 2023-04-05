<header class="theme-header transparent-header">
    <div class="header-navigation navigation-style-v1">
        <div class="nav-overlay"></div>
        <div class="container-fluid">
            <div class="primary-menu">
                <div class="site-branding">
                    <a href="index-2.html" class="brand-logo"><img src="../assetss/images/icon/regionloreto.png"
                            alt="Site Logo"></a>
                </div>
                <div class="nav-menu">

                    <div class="navbar-close"><i class="far fa-times"></i></div>

                    <div class="nav-search">
                        <form>
                            <div class="form_group">
                                <input type="email" class="form_control" placeholder="Search Here" name="email"
                                    required>
                                <button class="search-btn"><i class="fas fa-search"></i></button>
                            </div>
                        </form>
                    </div>

                    <nav class="main-menu">
                        <ul>
                            <li class="menu-item has-children"><a href="/home" class="active nav-link">Inicio</a>
                                {{-- <ul class="sub-menu">
                                    <li class="has-children"><a href="#">Multipage</a>
                                        <ul class="sub-menu">
                                            <li><a href="index-2.html">Creative Agency</a></li>
                                            <li><a href="index-3.html">Digital Agency</a></li>
                                            <li><a href="index-4.html">Design Studio</a></li>
                                            <li><a href="index-3-dark.html">Design Studio Dark</a></li>
                                        </ul>
                                    </li>
                                    <li class="has-children"><a href="#">Onepage</a>
                                        <ul class="sub-menu">
                                            <li><a href="onepage-index-1.html">Creative Agency</a></li>
                                            <li><a href="onepage-index-2.html">Digital Agency</a></li>
                                            <li><a href="onepage-index-3.html">Design Studio</a></li>
                                            <li><a href="onepage-index-3-dark.html">Design Studio Dark</a></li>
                                        </ul>
                                    </li>
                                </ul> --}}
                            </li>
                            <li class="menu-item has-children"><a href="/shownoticias" class="nav-link">Noticias</a>
                                {{-- <ul class="sub-menu">
                                    <li><a href="services.html">Our Service</a></li>
                                    <li><a href="service-details.html">Service Details</a></li>
                                </ul> --}}
                            </li>
                            <li class="menu-item has-children"><a href="{{route('contacto.create')}}" class="nav-link">Contacto</a>
                                {{-- <ul class="sub-menu">
                                    <li><a href="projects.html">Our Portfolio</a></li>
                                    <li><a href="project-details.html">Portfolio Details</a></li>
                                </ul> --}}
                            </li>
                            
                            <li class="menu-item has-children"><a href="#" class="nav-link">
                                @if (Route::has('login'))
                                    @auth
                                        Hola {{ auth()->user()->name }}
                                    @else
                                        Login
                                    @endauth
                                    
                                @endif
                            </a>
                                <ul class="sub-menu">
                                    
                                    @if (Route::has('login'))
                                        @auth
                                        <li><a href="/paneladmin">PanelAdmin</a></li>
                                        <form action="login" method="post">
                                            @method('put')
                                            @csrf
                                            <li><a href="#" style="margin-left:0px;"><button type="submit"
                                                style="background-color: transparent;">
                                                Salir</button>
                                                </a>
                                            </li>
                                        </form>

                                            {{-- <li><a href="#">Salir</a></li> --}}
                                        @else
                                            <li><a href="#" id="btnLogin">Ingresar</a></li>
                                        @endauth
                                    
                                    @endif
                                  </ul>
                            </li>
                            {{-- <li class="menu-item has-children"><a href="#" class="nav-link">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blogs.html">Our Blog</a></li>
                                    <li><a href="blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="contact.html" class="nav-link">Contact</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="header-right-nav">
                    <ul>
                        <li class="bar-item"><a href="#"><img src="../assetss/images/dot.png"
                                    alt="dot"></a></li>
                        <li class="navbar-toggle-btn">
                            <div class="navbar-toggler">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>