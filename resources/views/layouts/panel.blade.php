<!doctype html>
<html lang="es">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
    <link rel="stylesheet" href="../../../assets/plugins/notifications/css/lobibox.min.css" />
	<link href="../../../assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
	<link href="../../../assets/plugins/select2/css/select2-bootstrap4.css" rel="stylesheet" />
	<!--favicon-->
	<link rel="icon" href="../../../assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="../../../assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="../../../assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	{{-- <link href="/assets/plugins/highcharts/css/highcharts.css" rel="stylesheet" />
	<link href="/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" /> --}}
	<link href="../../../assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="../../../assets/css/pace.min.css" rel="stylesheet" />
	<script src="../../../assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../../../assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="../../../assets/css/app.css" rel="stylesheet">
	<link href="../../../assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="../../../assets/css/dark-theme.css" />
	<link rel="stylesheet" href="../../../assets/css/semi-dark.css" />
	<link rel="stylesheet" href="../../../assets/css/header-colors.css" />
	<link href="../../../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<script src="https://unpkg.com/feather-icons"></script>
	<link href="../../../assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />


    @yield('extra_css')
	<title>Panel Administración</title>
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

    @if (Route::has('login'))
    @auth
	<!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="../../../assetss/images/icon/regionloreto.png" class="logo-icon" alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text">OREDIS</h4>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
                </div>
            </div>
            <!--navigation-->
            
                    <ul class="metismenu" id="menu">
                        <li>
                            <a href="javascript:;" class="has-arrow">
                                <div class="parent-icon"><i class='bx bx-list-ul'></i>
                                </div>
                                <div class="menu-title">Beneficiario</div>
                            </a>
                            <ul>
                                @if(Auth::user()->is_admin == 2 or Auth::user()->is_admin == 1 )
                                    <li><a href="{{route('Create.Discapacitados')}}"><i class="bx bx-right-arrow-alt"></i>Registrar Persona</a>
                                    </li>
                                @endif
                                @if(Auth::user()->is_admin == 2 or Auth::user()->is_admin == 1 )
                                    <li><a href="{{route('editar.personas')}}"><i class="bx bx-right-arrow-alt"></i>Editar Persona</a>
                                    </li>
                                @endif
                                @if(Auth::user()->is_admin == 1 or Auth::user()->is_admin == 3)
                                    <li><a href="{{route('registrar.visita')}}"><i class="bx bx-right-arrow-alt"></i>Registrar Visita</a>
                                    </li>
                                @endif
                                <li><a href="{{route('reporte.visitas')}}"><i class="bx bx-right-arrow-alt"></i>Reporte Visita x Fecha</a>
                                </li>
                                <li><a href="{{route('visita.reporte.distrito')}}"><i class="bx bx-right-arrow-alt"></i>Reporte Visita x Distrito</a>
                                </li>
                                <li><a href="{{route('reporte.beneficiario')}}"><i class="bx bx-right-arrow-alt"></i>Reporte Beneficiario</a>
                                </li>
                            </ul>
                        </li>
                        
                        @if(Auth::user()->is_admin == 1)
                            <li>
                                <a href="javascript:;" class="has-arrow">
                                    <div class="parent-icon"><i class='bx bx-cog' ></i>
                                    </div>
                                    <div class="menu-title">Admin Usuarios</div>
                                </a>
                                <ul>
                                    <li><a href="{{route('Usuarios')}}"><i class="bx bx-user"></i>Listar Usuarios</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:;" class="has-arrow">
                                    <div class="parent-icon"><i class='bx bx-cog' ></i>
                                    </div>
                                    <div class="menu-title">Admin Portal</div>
                                </a>
                                <ul>
                                    <li><a href="{{route('editar.contenido')}}"><i class="bx bx-user"></i>Contenido</a>
                                    </li>
                                    <li><a href="{{route('noticias')}}"><i class="bx bx-user"></i>Noticias</a>
                                    </li>
                                    <li><a href="{{route('create.noticia')}}"><i class="bx bx-user"></i>Registrar Noticia</a>
                                    </li>
                                    <li><a href="{{route('contacto.index')}}"><i class="bx bx-user"></i>Mensajes Contacto</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            
                            <li>
                                <a href="javascript:;" class="has-arrow">
                                    <div class="parent-icon"><i class='bx bx-cog' ></i>
                                    </div>
                                    <div class="menu-title">Asociaciones</div>
                                </a>
                                <ul>
                                    <li><a href="{{route('asociaciones.index')}}"><i class="bx bx-user"></i>Listar Asociaciones</a>
                                    </li>
                                    {{-- <li><a href="{{route('noticias')}}"><i class="bx bx-user"></i></a>
                                    </li>
                                    <li><a href="{{route('create.noticia')}}"><i class="bx bx-user"></i>Registrar Noticia</a>
                                    </li> --}}
                                </ul>
                            </li>
                        @endif

                    </ul>
                    
             
            <!--end navigation-->
            
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header >
            <div class="topbar d-flex align-items-center">
                
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu-left d-none d-lg-block">
                        <a href="https://oredis.regionloreto.gob.pe/manualdeusuariov1.0.pdf" download="" target="_blank">Manual de Usuario<i class='bx bx-download'></i></a>
                    </div>


                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <a class="nav-link" href="javascript:;">	<i class='bx bx-search'></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">	<i class='bx bx-category'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                {{-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">7</span>
                                    <i class='bx bx-bell'></i>
                                </a> --}}
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        {{-- <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div> --}}
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                                </div>
                                                {{-- <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span class="msg-time float-end">14 Sec
                                                ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div> --}}
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2 min
                                                ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19 min
                                                ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span class="msg-time float-end">28 min
                                                ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4 hrs
                                                ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span class="msg-time float-end">5 hrs
                                                ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span class="msg-time float-end">1 day
                                                ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span class="msg-time float-end">2 weeks
                                                ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                {{-- <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">8</span>
                                    <i class='bx bx-comment'></i>
                                </a> --}}
                                <div class="dropdown-menu dropdown-menu-end">
                                    {{-- <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a> --}}
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                                ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                                ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                                ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                                ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                                ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                                ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="../../../assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                                ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>


                    @if (Route::has('login'))
                    @auth
                        <div class="user-box dropdown">
                            <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../../assets/images/avatars/avatar-2.png" class="user-img" alt="user avatar">
                                <div class="user-info ps-3">
                                    <p class="user-name mb-0">{{ auth()->user()->name }}</p>
                                    <input type="text" id="idUsuario" value="{{auth()->user()->id}}" readonly hidden>
                                    <input type="text" id="Rol" value="{{auth()->user()->is_admin}}" readonly hidden>
                                    <p class="designattion mb-0">
                                        @if(Auth::user()->is_admin == 1)
                                            Administrador
                                        @else
                                            @if(Auth::user()->is_admin == 2)
                                                Registrador
                                            @else
                                                @if(Auth::user()->is_admin == 3)
                                                    Visitador
                                                @endif
                                            @endif
                                        @endif
                                        
                                    </p>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="javascript:;">
                                        <i class="bx bx-user"></i>Cuenta
                                    </a>
                                </li>

                                    <form action="/login" method="post">
                                        @method('put')
                                        @csrf
                                        <li><button type="submit" class="dropdown-item" href="javascript:;">
                                            <i class="bx bx-log-in-circle"></i>
                                            <span>Salir</span></button>
                                        </li>
                                    </form>
                                
                            </ul>
                        </div>
                        @endauth
                    @endif
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <footer class="page-footer">
            <p class="mb-0">Copyright © 2023. All right reserved.</p>
        </footer>


    </div>
    <!--end wrapper-->

	
    @else
        <div class="row" style="padding:50px;" >
            <a class="btn btn-warning" id="btnLogin" style="width: 20%;text-align:center;">Inicie Sesión</a>
        </div>
    @endauth
    @endif


    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="../../../assets/js/jquery.min.js"></script>
	<script src="../../../assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="../../../assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="../../../assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="../../../assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="../../../assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
    
	{{-- <script src="/assets/plugins/highcharts/js/highcharts.js"></script>
	<script src="/assets/plugins/highcharts/js/exporting.js"></script>
	<script src="/assets/plugins/highcharts/js/variable-pie.js"></script>
	<script src="/assets/plugins/highcharts/js/export-data.js"></script>
	<script src="/assets/plugins/highcharts/js/accessibility.js"></script>
	<script src="/assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script> --}}
	{{-- <script src="/assets/js/index2.js"></script> --}}


	<script src="https://unpkg.com/feather-icons"></script>
	<!--app JS-->
	<script src="../../../assets/js/app.js"></script>

	<script src="../../../assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="../../../assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script src="../../../assets/plugins/select2/js/select2.min.js"></script>
	<!--notification js -->
	<script src="../../../assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="../../../assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="../../../assets/plugins/notifications/js/notification-custom-script.js"></script>


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('extra_js')
    <script>
        $("#btnLogin").on('click', function(e) {
            e.preventDefault();
            $("#modalLogin").modal('show');
        });

        $(document).ready(function(){
            //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
            setTimeout(refrescar, 43200000);
        });
        function refrescar(){
            //Actualiza la página
            location.reload();
        }


    </script>
</body>
</html>