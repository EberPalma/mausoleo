<!DOCTYPE html>


<style>
.profile-card-4 {
    max-width: 300px;
    background-color: #FFF;
    border-radius: 5px;
    box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    position: relative;
    margin: 10px auto;
    cursor: pointer;
}

.profile-card-4 img {
    transition: all 0.25s linear;
}

.profile-card-4 .profile-content {
    position: relative;
    padding: 15px;
    background-color: #FFF;
}

.profile-card-4 .profile-name {
    font-weight: bold;
    position: absolute;
    left: 0px;
    right: 0px;
    top: -70px;
    color: #FFF;
    font-size: 17px;
}

.profile-card-4 .profile-name p {
    font-weight: 600;
    font-size: 13px;
    letter-spacing: 1.5px;
}

.profile-card-4 .profile-description {
    color: #777;
    font-size: 12px;
    padding: 10px;
}

.profile-card-4 .profile-overview {
    padding: 15px 0px;
}

.profile-card-4 .profile-overview p {
    font-size: 10px;
    font-weight: 600;
    color: #777;
}

.profile-card-4 .profile-overview h4 {
    color: #273751;
    font-weight: bold;
}

.profile-card-4 .profile-content::before {
    content: "";
    position: absolute;
    height: 20px;
    top: -10px;
    left: 0px;
    right: 0px;
    background-color: #FFF;
    z-index: 0;
    transform: skewY(3deg);
}

.profile-card-4:hover img {
    transform: rotate(5deg) scale(1.1, 1.1);
    filter: brightness(110%);
}


/* Add some content at the bottom of the video/page */
.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}

/* Style the button used to pause/play the video */
#myBtn {
  width: 200px;
  font-size: 18px;
  padding: 10px;
  border: none;
  background: #000;
  color: #fff;
  cursor: pointer;
}

#myBtn:hover {
  background: #ddd;
  color: black;
}

.whatsapp {
  position:fixed;
  width:60px;
  height:60px;
  bottom:80px;
  right:7px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  z-index:100;
}
.whatsapp-icon {
  margin-top:13px;
}
</style>
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Mausoleo Santa Clara</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body id="top">


<a href="https://api.whatsapp.com/send/?phone=+527228944086" class="whatsapp" target="_blank"> <i class="fa fa-whatsapp whatsapp-icon"></i></a>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- Top Background Image Wrapper -->


  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <header id="header" class="hoc clear"  style="background-image:url('images/demo/backgrounds/marmol-blanco.jpg'); border-radius: 10px; ">
    <div id="logo" >
      <!-- ################################################################################################ -->
      <img loading="lazy" src="Images/demo/logolargo.png" style="margin-top:-10px; height:80px"  alt="">
      <!-- ################################################################################################ -->

    <nav id="mainav" class="fl_right">

      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="/" style="color: black; font-weight:bold ">Inicio</a></li>
        <li><a href="#" style="color: #948307; font-weight:bold ">Nosotros</a></li>
        <li><a href="/productos" style="color: #948307; font-weight:bold ">Productos & Servicios</a></li>
        <li><a class="drop" href="#" style="color: #948307; font-weight:bold ">Recordando a</a>
          <ul>
            <li><a href="/RecordamosHoy">Hoy</a></li>
            <li><a href="/RecordamosEsteMes">Mes</a></li>
          </ul>
        </li>
        <li><a href="#" style="color: #948307; font-weight:bold ">Condolencias</a></li>
        <li><a href="/invitado.contacto" style="color: #948307; font-weight:bold ">Contacto</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </nav>
</div>
  </header>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3" style="background-color:rgba(0,0,0,0.8);">
    <section id="services" class="hoc container clear">
      <!-- ################################################################################################ -->
      <div>
      <div class="sectiontitle">
        <h1 style="color:white">ESTE DIA RECORDAMOS A</h1>
      </div>
      <div class="container" style="margin-top:-130px;">
          <div class="row">
            @foreach($defuncion as $difunto)
              <div class="col-md-4">
                  <div class="profile-card-4 text-center"><img src="{{ asset('Images/Beneficiary/'.$difunto->id.'_1.jpg') }}" class="img img-responsive">
                      <div class="profile-content">
                          <div class="profile-name">{{ $difunto->nombre }}</div>
                          <div class="row">
                              <div class="col-12"> <h2>
                                @for($i = 0; $i < strlen($difunto->fechaDefuncion); $i++)
                                  @if($difunto->fechaDefuncion[$i] == " " && is_numeric($difunto->fechaDefuncion[$i+1]))
                                    <span>{{ substr($difunto->fechaDefuncion, 0, $i) }}</span>
                                  @else
                                  @endif
                                @endfor
                              </h2> </div>

                          </div>
                          <div class="row">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><a href="" class="btn btn-warning">Enviar Condolencia</a></center>
                          </div>

                      </div>
                  </div>
              </div>
            @endforeach
          </div>
      </div>
      </div>

      <!-- ################################################################################################ -->
    </section>
  </div>
<!-- ################################################################################################ -->
<div class="wrapper row3" style="background-color:rgba(148,131,7,0.8);">
    <section id="services" class="hoc container clear">
      <!-- ################################################################################################ -->
      <div>
      <div class="sectiontitle">
        <h1 style="color:white">CUMPLEAÑOS</h1>
      </div>
      <div class="container" style="margin-top:-130px;">
          <div class="row">
          @foreach($nacimiento as $difunto)
              <div class="col-md-4">
                  <div class="profile-card-4 text-center"><img src="{{ asset('Images/Beneficiary/'.$difunto->id.'_1.jpg') }}" class="img img-responsive">
                      <div class="profile-content">
                          <div class="profile-name">{{ $difunto->nombre }}</div>
                          <div class="row">
                              <div class="col-12"> <h2>
                                @for($i = 0; $i < strlen($difunto->fechaDefuncion); $i++)
                                  @if($difunto->fechaDefuncion[$i] == " " && is_numeric($difunto->fechaDefuncion[$i+1]))
                                    <span>{{ substr($difunto->fechaDefuncion, 0, $i) }}</span>
                                  @else
                                  @endif
                                @endfor
                              </h2> </div>

                          </div>
                          <div class="row">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><a href="" class="btn btn-warning">Enviar Condolencia</a></center>
                          </div>

                      </div>
                  </div>
              </div>
            @endforeach

          </div>
      </div>
      </div>

      <!-- ################################################################################################ -->
    </section>
  </div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<div class="bgded overlay" >
  <!-- ################################################################################################ -->
  <div class="wrapper row4">
    <footer id="footer" class="hoc clear">
      <!-- ################################################################################################ -->
      <div class="group btmspace-50">
        <div class="one_quarter first">
          <h6 class="heading">Mausoleo Santa Clara</h6>
          <p>MAUSOLEO SANTA CLARA ubicado sobre una leyenda Toluqueña
            En el siglo XlX frente a la iglesia de Santa Clara, existía un panteón; en este espacio se localiza actualmente el jardín 5 de Mayo (o por muchos conocido como Jardín Santa Clara)
            En el año 1880 falleció el General Juan N. Mirafuentes, quien fuera entonces gobernador del Estado de Méx [<a href="https://www.facebook.com/MausoleoSantaClaraToluca">&hellip;</a>]</p>
          <ul class="faico clear">
            <li><a class="faicon-facebook" href="https://www.facebook.com/MausoleoSantaClaraToluca"><i class="fab fa-facebook"></i></a></li>
            <li><a class="faicon-google-plus" href="https://goo.gl/maps/83d4UYwDnCwE41Mf7"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a class="faicon-twitter" href="https://twitter.com/MausoleoStaCla"><i class="fab fa-twitter"></i></a></li>
          </ul>
        </div>
        <div class="one_quarter">
          <h6 class="heading">Preguntas Frecuentes</h6>
          <ul class="nospace linklist">
            <li><a href="#">¿Donde se encuentran?</a></li>
            <li><a href="#">¿Costos?</a></li>
            <li><a href="#">¿Procedimiento?</a></li>
            <li><a href="#">¿Como me puedo contactar?</a></li>
          </ul>
        </div>
        <div class="one_quarter">
          <h6 class="heading">Newsletter (Suscripcion)</h6>
          <p class="nospace btmspace-15">Reciba actualizaciones de nuestras promociones y notificaciones de nuestros servicios</p>
          <form action="#" method="post">
            <fieldset>
              <legend>Newsletter:</legend>
              <input class="btmspace-15" type="text" value="" placeholder="Nombre">
              <input class="btmspace-15" type="text" value="" placeholder="Correo Electronico">
              <button class="btn" type="submit" value="submit">Enviar</button>
            </fieldset>
          </form>
        </div>
        <div class="one_quarter">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.8174184801396!2d-99.65037208509553!3d19.29030458696534!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85cd89ecdee2e551%3A0x733451ced12493ed!2sMausoleo%20Santa%20Clara!5e0!3m2!1ses-419!2smx!4v1648949626031!5m2!1ses-419!2smx" width="300" height="360" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
      <!-- ################################################################################################ -->
      <hr class="btmspace-50">
      <!-- ################################################################################################ -->
      <nav>
        <ul class="nospace">
          <li><a href="index.html"><i class="fas fa-lg fa-home"></i></a></li>
          <li><a href="#">Acerca de nosotros</a></li>
          <li><a href="/invitado.contacto">Contacto</a></li>
          <li><a href="#">Terminos</a></li>
          <li><a href="#">Privacidad</a></li>
          <li><a href="#">Cookies</a></li>
          <li><a href="#">Disclaimer</a></li>
        </ul>
      </nav>
      <!-- ################################################################################################ -->
    </footer>
  </div>
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <div class="wrapper row5">
    <div id="copyright" class="hoc clear">
      <!-- ################################################################################################ -->
      <p class="fl_left">Copyright &copy; 2022 - All Rights Reserved - <a href="/">www.mausoleosantaclara.com.mx</a></p>
      <p class="fl_right">Webpage <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">Mausomex & CPI</a></p>
      <!-- ################################################################################################ -->
    </div>
  </div>
  <!-- ################################################################################################ -->
</div>
<!-- End Bottom Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<script src="js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
