<!DOCTYPE html>


<style>
    #myVideo {
  position: absolute;
  right: 0;
  bottom: 0;


}
/* CARDS DE PRODUCTOS */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}

.card button {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
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
<div class="wrapper row1 " >
  <section id="ctdetails" class="hoc clear">
    <!-- ################################################################################################ -->
    <ul class="nospace clear">
      <li class="one_quarter first">
        <div class="block clear"><a href="tel:+34678567876"><i class="fas fa-phone"></i></a> <span><strong>Llámanos:</strong> +52 (722) 8944086</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="mailto:contacto@mausoleosantaclara.com"><i class="fas fa-envelope"></i></a> <span><strong>Mándanos un correo:</strong> <small style="font-size:12.3px">contacto@mausoleosantaclara.com.mx</small></span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="https://www.horasabiertas.mx/es/toluca-de-lerdo/mausoleo-santa-clara"><i class="fas fa-clock"></i></a> <span><strong> Lun-Vie & Sab-Dom.</strong> 08.00am - 18.00pm  10.00am - 14.00pm</span></div>
      </li>
      <li class="one_quarter">
        <div class="block clear"><a href="https://goo.gl/maps/52MF2dMtbryQZPaT7"><i class="fas fa-map-marker-alt"></i></a> <span><strong>Visítanos:</strong> Direccion al <a href="https://goo.gl/maps/52MF2dMtbryQZPaT7">lugar</a></span></div>
      </li>
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
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
  <div class="bgded overlay " >
    <div id="demo" class="carousel slide" data-ride="carousel" >

        <!-- Indicators -->
        <ul class="carousel-indicators">
          <li data-target="#demo" data-slide-to="0" class="active"></li>
          <li data-target="#demo" data-slide-to="1"></li>
          <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner" >
          <div class="carousel-item active">
            <center><img src="Images/demo/gallery/Ceremonias.jpg" style="object-fit: cover; width:1100px; height:500px" alt="Los Angeles" width="1100" height="300">
            <div class="carousel-caption " style="background-color: rgba(0,0,0,0.4);">
                <h3>Ceremonia</h3>
                <p>Honra a tus seres queridos con un pequeño homenaje de ultimo adiós o aniversario.</p>
              </div>
            </center>
          </div>
          {{-- <div class="carousel-item" >
            <img src="img/1.jpg" alt="Chicago" style="object-fit: cover; width:1100px; height:500px">
          </div>
          <div class="carousel-item">
            <img src="ny.jpg" alt="New York" width="1100" height="500">
          </div> --}}
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
          <span class="carousel-control-next-icon"></span>
        </a>
      </div>

  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->
  <!-- ################################################################################################ -->

</div>

<!-- End Top Background Image Wrapper -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="bgded overlay" style="background-image:url('images/demo/backgrounds/marmol-blanco.jpg');">
  <section class="hoc container clear">
    <!-- ################################################################################################ -->
    <figure class="one_half first">
      <h6 class="heading">Nichos a perpetuidad</h6>
      <ul>
        <li>Instalaciones edificadas con materiales y acabados de calidad</li>
        <li>Excelente ubicación en la ciudad de Toluca</li>
        <li>Precios accesibles</li>
        <li>Facilidades de pago</li>
        <li>Recibo deducible de impuestos</li>
        <li>Plusvalía</li>
        <li>Vigilancia y mantenimiento</li>
        <li>Opción de renta</li>
        <li>Cementerio virtual</li>
    </ul>
    </figure>
    <div class="one_half last"><a class="imgover" href="#"><img loading="lazy" style="width:480px;height:300px" src="images/demo/gallery/Mausoleopasillo.jpg" alt="Pasillo_Santa_Clara"></a></div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3" style="background-image:url('images/demo/backgrounds/marmol-blanco.jpg');">
  <section id="services" class="hoc container clear">
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <p class="nospace font-xs">Le invitamos a conocer todos</p>
      <h6 class="heading">Nuestros Productos</h6>
    </div>
    <div class="container" style="margin-top:-80px">
        <div class="row">
            <div class="col-4">
                <div class="card" style="margin-bottom:50px">
                    <img src="/Images/Productos/Alternativa.jpeg" alt="Alternativa" style="width:100%">
                    <h1>Urna Alternativa</h1>
                    {{-- <p class="price">-</p>
                    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p> --}}
                    <p><button>Solicitar</button></p>
                  </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="/Images/Productos/Cilindro.jpeg" alt="Cilindro" style="width:100%">
                    <h1>Urna Cilindro</h1>
                    {{-- <p class="price">-</p>
                    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p> --}}
                    <p><button>Solicitar</button></p>
                  </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="/Images/Productos/Esmeralda.jpeg" alt="Esmeralda" style="width:100%">
                    <h1>Urna Esmeralda</h1>
                    {{-- <p class="price">-</p>
                    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p> --}}
                    <p><button>Solicitar</button></p>
                  </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="/Images/Productos/Infantil.jpeg" alt="Infantil" style="width:100%">
                    <h1>Urna Infantil</h1>
                    {{-- <p class="price">-</p>
                    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p> --}}
                    <p><button>Solicitar</button></p>
                  </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="/Images/Productos/InoxRetablo.jpeg" alt="InoxRetablo" style="width:100%">
                    <h1>Urna Inox Retablo</h1>
                    {{-- <p class="price">-</p>
                    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p> --}}
                    <p><button>Solicitar</button></p>
                  </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <img src="/Images/Productos/Jasper.jpeg" alt="Jasper" style="width:100%">
                    <h1>Urna Jasper</h1>
                    {{-- <p class="price">-</p>
                    <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p> --}}
                    <p><button>Solicitar</button></p>
                  </div>
            </div>
        </div>

    </div>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
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
