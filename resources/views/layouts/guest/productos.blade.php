<!DOCTYPE html>
<style>
    #myVideo {
  position: absolute;
  right: 0;
  bottom: 0;
}
</style>
<html lang="" >
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Mausoleo Santa Clara</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<div class="bgded overlay " >


  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <header id="header" class="hoc clear"  style="background-image:url('images/demo/backgrounds/marmol-blanco.jpg'); border-radius: 10px; ">
    <link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
    <div id="logo" >
      <!-- ################################################################################################ -->
      <img loading="lazy" src="Images/demo/logolargo.png" style="margin-top:-10px; height:80px"  alt="">
      <!-- ################################################################################################ -->

    <nav id="mainav" class="fl_right">
      <!-- ################################################################################################ -->
      <ul class="clear">
        <li class="active"><a href="index.html" style="color: black; font-weight:bold ">Inicio</a></li>
        <li><a href="#" style="color: #948307; font-weight:bold ">Nosotros</a></li>
        <li><a href="#" style="color: #948307; font-weight:bold ">Servicios</a></li>
        <li><a class="drop" href="#" style="color: #948307; font-weight:bold ">Recordando a</a>
          <ul>
            <li><a href="pages/gallery.html">Hoy</a></li>
            <li><a href="pages/full-width.html">Mes</a></li>
          </ul>
        </li>
        <li><a href="#" style="color: #948307; font-weight:bold ">Condolencias</a></li>
        <li><a href="/invitado.contacto" style="color: #948307; font-weight:bold ">Contacto</a></li>
      </ul>
      <!-- ################################################################################################ -->
    </nav>
</div>
  </header>
  <body>
    <div class="container" >
        <h2>Productos & Servicios</h2>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <div class="item active">
              <img src="images/demo/backgrounds/marmol-blanco.jpg" alt="Los Angeles" style="width:100%;">
              <div class="carousel-caption">
                <h3>Los Angeles</h3>
                <p>LA is always so much fun!</p>
              </div>
            </div>

            <div class="item">
              <img src="chicago.jpg" alt="Chicago" style="width:100%;">
              <div class="carousel-caption">
                <h3>Chicago</h3>
                <p>Thank you, Chicago!</p>
              </div>
            </div>

            <div class="item">
              <img src="ny.jpg" alt="New York" style="width:100%;">
              <div class="carousel-caption">
                <h3>New York</h3>
                <p>We love the Big Apple!</p>
              </div>
            </div>

          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      </body>
      </html>
