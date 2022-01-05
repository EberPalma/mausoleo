
 <!-- JS, Fuentes, Iconos, CSS (HEADER) --> 
 <!DOCTYPE html>

 <html lang="en">
     <head>
         <meta charset="utf-8" />
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
         <link href="{{ asset('css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
         <!-- CSS Just for demo purpose, don't include it in your project -->
         <link href="{{ asset('css/demo.css') }}" rel="stylesheet" />
 
         <!-- Canonical SEO -->
         <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-laravel" />        <!--  Social tags      -->
         <meta name="keywords" content="design system, dashboard, bootstrap 4 dashboard, bootstrap 4 design, bootstrap 4 system, bootstrap 4, bootstrap 4 uit kit, bootstrap 4 kit, light bootstrap, light bootstrap dashboard, creative tim,updivision, html dashboard, html css template, web template, bootstrap, bootstrap 4, css3 template, frontend, responsive bootstrap template, bootstrap dashboard, responsive dashboard, laravel, laravel php, laravel php framework, free laravel admin template, free laravel admin, free laravel admin template + Front End + CRUD, crud laravel php, crud laravel, laravel backend admin dashboard">
         <meta name="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">
 
 
         <!-- Schema.org markup for Google+ -->
         <meta itemprop="name" content="Mausoleo Santa Clara">
         <meta itemprop="description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up.">
 
         <meta itemprop="image" content="https://s3.amazonaws.com/creativetim_bucket/products/213/opt_lbd_laravel_thumbnail.jpg">
 
        
         <!-- Open Graph data -->
         <meta property="fb:app_id" content="655968634437471">
         <meta property="og:title" content="Mausoleo Santa Clara" />
         <meta property="og:type" content="article" />
         <meta property="og:url" content="https://www.creative-tim.com/live/light-bootstrap-dashboard-laravel" />
         <meta property="og:image" content="https://s3.amazonaws.com/creativetim_bucket/products/213/opt_lbd_laravel_thumbnail.jpg"/>
         <meta property="og:description" content="Start your development with a Bootstrap 4 Admin Dashboard built for Laravel Framework 5.5 and Up." />
         <meta property="og:site_name" content="Mausoleo Santa Clara" />
           <!-- Google Tag Manager -->
         <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-NKDMSK6');</script>
         <!-- End Google Tag Manager -->
     
         <script>
             // Facebook Pixel Code Don't Delete
               ! function(f, b, e, v, n, t, s) {
                 if (f.fbq) return;
                 n = f.fbq = function() {
                   n.callMethod ?
                     n.callMethod.apply(n, arguments) : n.queue.push(arguments)
                 };
                 if (!f._fbq) f._fbq = n;
                 n.push = n;
                 n.loaded = !0;
                 n.version = '2.0';
                 n.queue = [];
                 t = b.createElement(e);
                 t.async = !0;
                 t.src = v;
                 s = b.getElementsByTagName(e)[0];
                 s.parentNode.insertBefore(t, s)
               }(window,
                 document, 'script', '//connect.facebook.net/en_US/fbevents.js');
               try {
                 fbq('init', '111649226022273');
                 fbq('track', "PageView");
               } catch (err) {
                 console.log('Facebook Track Error:', err);
               }
         </script>
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
                    <a href="http://www.creative-tim.com" class="simple-text">
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
                   
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#laravelExamples" aria-expanded="true">
                            <i class="nc-icon nc-icon nc-grid-45"></i>
                            <p>
                                {{ __('Nichos') }}
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse  show " id="laravelExamples">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('profile.edit')}}">
                                        <i class="nc-icon nc-badge"></i>
                                        <p>{{ __("Difuntos") }}</p>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('index')}}">
                                        <i class="nc-icon nc-email-85"></i>
                                        <p>{{ __("Contacto") }}</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
        
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'table')}}">
                            <img src="{{ asset('img/laravel.svg') }}" style="width:25px">
                             <p>{{ __("Codigo QR") }}</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('page.index', 'typography')}}">
                            <i class="nc-icon nc-album-2"></i>
                            <p>{{ __("Imagenes") }}</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('page.index', 'icons')}}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>{{ __("Usuarios") }}</p>
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
                <a href="https://www.creative-tim.com/product/light-bootstrap-dashboard-laravel" target="_blank" class="btn btn-success btn-block btn-fill">Acceder a Whatsapp</a>
            </div>
        </li>
        <li class="button-container">
            <div class="">
                <a href="https://light-bootstrap-dashboard-laravel.creative-tim.com/docs/tutorial-components.html" target="_blank" class="btn btn-info btn-block btn-fill">Acceder a Facebook</a>
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
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">{{ __('Tablero') }}</span>
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;{{ __('Buscar') }}</span>
                                </a>
                            </li>
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
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Mausoleo Santa Clara</a>
            </li>
            <li>
                <a href="https://www.cartuchosweb.com" class="nav-link" target="_blank">CPI</a>
            </li>
            <li>
                <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">Nosotros</a>
            </li>
        </ul>
        <p class="copyright text-center">
            ©
            <script>
                document.write(new Date().getFullYear())
            </script>
            <a href="http://www.creative-tim.com">Mausoleo Santa Clara</a> &amp; <a href="https://www.cartuchosweb.com">CPI</a>
        </p>
    </nav>
</div>
</footer> 
<!-- /Footer --> 
<!-- JS, Fuentes, Iconos, CSS (FOOTER) --> 
    </div>

    </div>
   



        <!--   Core JS Files   -->
        <script src="{{ asset('js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/popper.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}" type="text/javascript"></script>
    
        <script src="{{ asset('js/plugins/jquery.sharrre.js') }}"></script>
        <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
        <script src="{{ asset('js/plugins/bootstrap-switch.js') }}"></script>
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
        @stack('js')
        <script>
          $(document).ready(function () {
            
            $('#facebook').sharrre({
              share: {
                facebook: true
              },
              enableHover: false,
              enableTracking: false,
              enableCounter: false,
              click: function(api, options) {
                api.simulateClick();
                api.openPopup('facebook');
              },
              template: '<i class="fab fa-facebook-f"></i> Facebook',
              url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
            });
    
            $('#google').sharrre({
              share: {
                googlePlus: true
              },
              enableCounter: false,
              enableHover: false,
              enableTracking: true,
              click: function(api, options) {
                api.simulateClick();
                api.openPopup('googlePlus');
              },
              template: '<i class="fab fa-google-plus"></i> Google',
              url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
            });
    
            $('#twitter').sharrre({
              share: {
                twitter: true
              },
              enableHover: false,
              enableTracking: false,
              enableCounter: false,
              buttons: {
                twitter: {
                  via: 'CreativeTim'
                }
              },
              click: function(api, options) {
                api.simulateClick();
                api.openPopup('twitter');
              },
              template: '<i class="fab fa-twitter"></i> Twitter',
              url: 'https://light-bootstrap-dashboard-laravel.creative-tim.com/login'
            });
          });
        </script>
    </html>
 <!-- /JS, Fuentes, Iconos, CSS (FOOTER) --> 
