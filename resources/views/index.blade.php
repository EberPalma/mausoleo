
 <!-- JS, Fuentes, Iconos, CSS (HEADER) -->
 <!DOCTYPE html>
 @if(!isset(Auth::user()->name))
 <meta http-equiv="refresh" content="0; url={{ route('login') }}">
@else
 <html lang="en">
     <head>
         <meta charset="utf-8" />
         <meta name="csrf-token" content="{{ csrf_token() }}" />
         <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
         <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
         <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
         <title>Usuarios Administrativos</title>
         <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
         <!--     Fonts and icons     -->
         <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
         <!-- CSS Files -->
         <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
         <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet" />
         <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
         <!-- CSS Just for demo purpose, don't include it in your project -->
         <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />

         <!-- Canonical SEO -->
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">



         <!-- Schema.org markup for Google+ -->
         <meta itemprop="name" content="Mausoleo Santa Clara">
         <meta itemprop="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">

         <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/213/opt_lbd_laravel_thumbnail.jpg">


         <!-- Open Graph data -->
         <meta property="fb:app_id" content="655968634437471">
         <meta property="og:title" content="Mausoleo Santa Clara" />
         <meta property="og:type" content="article" />




     </head>


<body class="clickup-chrome-ext_installed">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=111649226022273&ev=PageView&noscript=1" />
    </noscript>

    <div class="wrapper ">
<!-- Zona del navbar -->
        <div class="sidebar" data-image="{{ asset('img/sidebar-5.jpg') }}">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
        -->
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.mausoleosantaclara.com.mx" class="simple-text">
                        {{ __("Mausoleo Santa Clara") }}
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('dashboard')}}">
                            <i class="nc-icon nc-istanbul"></i>
                            <p>{{ __("Tablero") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('nichos')}}">
                            <i class="nc-icon nc-icon nc-grid-45"></i>
                            <p>{{ __("Nichos") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('difuntos')}}">
                            <i class="nc-icon nc-badge"></i>
                                        <p>{{ __("Difuntos") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('contacto')}}">
                            <i class="nc-icon nc-email-85"></i>
                                        <p>{{ __("Contacto") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('codigoqr')}}">
                            <img src="{{ asset('img/laravel.svg') }}" style="width:25px">
                             <p>{{ __("Codigo QR") }}</p>
                        </a>
                    </li>
                    {{-- <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'typography')}}">
                            <i class="nc-icon nc-album-2"></i>
                            <p>{{ __("Imagenes") }}</p>
                        </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('usuarios')}}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>{{ __("Usuarios") }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('calendario.index')}}">
                            <img src="{{ asset('img/calendario.svg') }}" style="width:35px">
                            <p>{{ __("Calendario") }}</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
<!-- /Zona del navbar -->
<!-- Zona del navbarstyle -->
        <div class="fixed-plugin">
<div class="dropdown show-dropdown">
    <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
    </a>
    <ul class="dropdown-menu">
        <li class="header-title"> Estilo lateral </li>

        <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger background-color">
                <p>Filtros</p>
                <div class="pull-right">
                    <span class="badge filter badge-black" data-color="black"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-orange" data-color="orange"></span>
                    <span class="badge filter badge-red" data-color="red"></span>
                    <span class="badge filter badge-yellow active" data-color="yellow"></span>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        <li class="header-title">Imagenes de fondo</li>
        <li >
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/img/sidebar-1.jpg') }}" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/img/sidebar-3.jpg') }}" alt="" />
            </a>
        </li>
        <li>
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/img/sidebar-4.jpg') }}" alt="" />
            </a>
        </li>
        <li class="active">
            <a class="img-holder switch-trigger" href="javascript:void(0)">
                <img src="{{ asset('/img/sidebar-5.jpg') }}" alt="" />
            </a>
        </li>
        <li class="button-container">
            <div class="">
                <a href="https://www.mausoleosantaclara.com.mx/product/light-bootstrap-dashboard-laravel" target="_blank" class="btn btn-success btn-block btn-fill">Acceder a Whatsapp</a>
            </div>
        </li>
        <li class="button-container">
            <div class="">
                <a href="https://light-bootstrap-dashboard-laravel.mausoleosantaclara.com.mx/docs/tutorial-components.html" target="_blank" class="btn btn-info btn-block btn-fill">Acceder a Facebook</a>
            </div>
        </li>
        <li class="header-title" id="sharrreTitle"> - ARMONIA ETERNA - </li>
    </ul>
</div>
<!-- /Zona del navbarstyle -->
<!-- Zona del header -->
</div>
        <div class=" main-panel ">
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"> </a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">

                                    <span class="d-lg-none">{{ __('Tablero') }}</span>
                                </a>
                            </li>

                            {{-- <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;{{ __('Buscar') }}</span>
                                </a>
                            </li> --}}
                        </ul>
                        <ul class="navbar-nav   d-flex align-items-center">
                            <li class="nav-item">
                                <a class="nav-link" href=" {{route('profile.edit') }} ">
                                    <span class="no-icon">{{ __('Mi cuenta') }}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <a class="text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Salir') }} </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
<!-- /Zona del header -->
<!-- Contenido -->

@yield('Contenidoprincipal')

<!-- /Contenido -->
<!-- Footer -->
            <footer class="footer">
<div class="container -fluid ">
    <nav>
        <ul class="footer-menu">
            <li>
                <a href="https://www.mausoleosantaclara.com.mx" class="nav-link" target="_blank">Mausoleo Santa Clara</a>
            </li>
            <li>
                <a href="https://www.cartuchosweb.com" class="nav-link" target="_blank">CPI</a>
            </li>
            <li>
                <a href="https://www.mausoleosantaclara.com.mx/presentation" class="nav-link" target="_blank">Nosotros</a>
            </li>
        </ul>
        <p class="copyright text-center">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="http://www.mausoleosantaclara.com.mx">Mausoleo Santa Clara</a> &amp; <a href="https://www.cartuchosweb.com">CPI</a>
        </p>
    </nav>
</div>
</footer>
<!-- /Footer -->
<!-- JS, Fuentes, Iconos, CSS (FOOTER) -->
    </div>

    </div>




        <!--   Core JS Files   -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/dropzone.js') }}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

        <script src="{{ asset('js/plugins/jquery.sharrre.js') }}"></script>
        <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
        <script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
        <!--  Sweet Alert    -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!--  Google Maps Plugin    -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
        <!--  Chartist Plugin  -->
        <script src="{{ asset('js/plugins/chartist.min.js') }}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('js/plugins/bootstrap-notify.js') }}"></script>
        <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
        <script src="{{ asset('js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
        <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{ asset('js/demo.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0//locale-all.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        @stack('js')


    </html>
    @endif
 <!-- /JS, Fuentes, Iconos, CSS (FOOTER) -->
