<!DOCTYPE html>
<style>
    html {
  scroll-behavior: smooth;
}
    url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");
body {
  font-size: 16px;
  color: #404040;
  font-family: Montserrat, sans-serif;
  background-image: linear-gradient(to bottom right, #ff9eaa 0% 65%, #e860ff 95% 100%);
  background-position: center;
  background-attachment: fixed;
  margin: 0;
  padding: 2rem 0;
  display: grid;
  place-items: center;
  box-sizing: border-box;
}
.card {
  background-color: #fff;
  max-width: 410px;
  max-height: 420px;
  flex-direction: column;
  overflow: hidden;
  border-radius: 2rem;
  box-shadow: 0px 1rem 1.5rem rgba(0,0,0,0.5);
}
.card .banner {
  background-image: url("Images/demo/gallery/Nichointeriordesenfocado.jpg");
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  height: 11rem;
  display: flex;
  align-items: flex-end;
  justify-content: center;
  box-sizing: border-box;
}
.card .banner img {
  background-color: #fff;
  width: 14rem;
  height: 14rem;
  box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.3);
  border-radius: 50%;
  transform: translateY(30%);
  transition: transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
}
.card img:hover {
  z-index: 100;
  transform: translateY(50%) scale(1.3);
}
.card .menu {
  width: 100%;
  height: 5.5rem;
  padding: 1rem;
  display: flex;
  align-items: flex-start;
  justify-content: flex-end;
  position: relative;
  box-sizing: border-box;
}
.card .menu .opener {
  width: 2.5rem;
  height: 2.5rem;
  position: relative;
  border-radius: 50%;
  transition: background-color 100ms ease-in-out;
}
.card .menu .opener:hover {
  background-color: #f2f2f2;
}
.card .menu .opener span {
  background-color: #404040;
  width: 0.4rem;
  height: 0.4rem;
  position: absolute;
  top: 0;
  left: calc(50% - 0.2rem);
  border-radius: 50%;
}
.card .menu .opener span:nth-child(1) {
  top: 0.45rem;
}
.card .menu .opener span:nth-child(2) {
  top: 1.05rem;
}
.card .menu .opener span:nth-child(3) {
  top: 1.65rem;
}
.card h2.name {
  text-align: center;
  padding: 0 2rem 0.5rem;
  margin: 0;
}
.card .title {
  color: #a0a0a0;
  font-size: 0.80rem;
  text-align: center;
  padding: 0 2rem 1.2rem;
}
.card .actions {
  padding: 0 2rem 1.2rem;
  display: flex;
  flex-direction: column;
  order: 99;
}
.card .actions .follow-info {
  padding: 0 0 1rem;
  display: flex;
}
.card .actions .follow-info h2 {
  text-align: center;
  width: 50%;
  margin: 0;
  box-sizing: border-box;
}
.card .actions .follow-info h2 a {
  text-decoration: none;
  padding: 0.8rem;
  display: flex;
  flex-direction: column;
  border-radius: 0.8rem;
  transition: background-color 100ms ease-in-out;
}
.card .actions .follow-info h2 a span {
  color: #948307;
  font-weight: bold;
  font-size: 20px;
  transform-origin: bottom;
  transform: scaleY(.8);
  transition: color 100ms ease-in-out;
}
.card .actions .follow-info h2 a small {
  color: #afafaf;
  font-size: 0.85rem;
  font-weight: normal;
}
.card .actions .follow-info h2 a:hover {
  background-color: #f2f2f2;
}
.card .actions .follow-info h2 a:hover span {
  color: #007ad6;
}
.card .actions .follow-btn button {
  color: inherit;
  font: inherit;
  font-weight: bold;
  background-color: #ffd01a;
  width: 100%;
  border: none;
  padding: 1rem;
  outline: none;
  box-sizing: border-box;
  border-radius: 1.5rem/50%;
  transition: background-color 100ms ease-in-out, transform 200ms cubic-bezier(0.18, 0.89, 0.32, 1.28);
}
.card .actions .follow-btn button:hover {
  background-color: #efb10a;
  transform: scale(1.1);
}
.card .actions .follow-btn button:active {
  background-color: #e8a200;
  transform: scale(1);
}
.card .desc {
  text-align: justify;
  padding: 0 2rem 2.5rem;
  order: 100;
}
.imgRedonda {
    width:300px;
    height:300px;
    border-radius:150px;
    border:10px solid #666;
}

</style>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Presentacion</title>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.7/fullpage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilos.css">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
</head>
<body style="background-image:url('images/demo/backgrounds/marmol-blanco.jpg');">
    <img loading="lazy" src="Images/demo/logolargo.png" style=" position:fixed; float:left;"  alt="">
	<main id="fullpage">
		<header class="section" id="Presentacion"  style="background-color: rgba(0, 0, 0, 0.8);">
<div class="container" >
    <center><img  class="imgRedonda" loading="lazy" src="images/demo/Jaime-Sabines.jpg" style="width:250px; height:250px;" alt=""></center>
    <div class="row">
    <h1 style="color: white;">'Morir es retirarse, hacerse a un lado, ocultarse un momento, quedarse quieto pasar el aire de una orilla a nada y estar en todas partes en secreto'</h1>
</div>
<div class="row" style="float:right;"><br><br><br>
    <h1 style="color: white;">Jaime Sabines</h1>
</div>
</div>

		</header>

        @foreach ($nichos as $n )
        <?php
  $numdifuntos = $n->difuntos;
  $numero = count($numdifuntos,COUNT_RECURSIVE);
?>
        @if($numero == 0)
        @else
		<section class="section" id="{{$n->coordenada}}">
			<div class="card" style="float:right"><?php
                                 $searchString = " ";
                                 $replaceString = "";
                                 $originalString = "{$n->coordenada}";
                                 $outputString = str_replace($searchString, $replaceString, $originalString);?>
                <img width="120px" height="120px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/'.$outputString)) !!} ">
                <div class="card-body">
                    <h4 class="card-text">{{ $n->coordenada}}</h4>
                  </div>

            </div>

            <center>
            <div class="container">
                <div class="row justify-content-md-center">
                    <?php $difuntos = $n->difuntos ?>
                    @foreach ($difuntos as $d )
                    <div class="col-md-auto">
            <div class="card">
                <div class="banner">
                                       @if (File::exists(public_path("Images/Beneficiary/{$d->id}_1.jpg")))
                                        <img class="avatar border-gray" loading="lazy" src="{{ asset("Images/Beneficiary/{$d->id}_1.jpg") }}" alt="...">
                                        @else
                                        <img class="avatar border-gray" style="object-fit: contain;" loading="lazy" src="{{ asset("img/MSC.png") }}" alt="...">
                                        @endif
                </div>
                <div class="menu">
                  <div class="opener"><span></span><span></span><span></span></div>
                </div>


                            <h3 class="name" style="font-size: 22px; margin-bottom:10%">{{ $d->nombre}}</h3>
                            <div class="title">Información</div>
                            <div class="actions">
                              <div class="follow-info">
                                <h2><a href="#"><small>Nacimiento</small><span>{{ $d->fechaNacimiento}}</span></a></h2>
                                <h2><a href="#"><span>_</span><small></small></a></h2>
                                <h2><a href="#"><small>Defunción</small><span>{{ $d->fechaDefuncion}}</span></a></h2>
                              </div>
                            </div>
        </div>
    </div>
    @endforeach

</div>
        </center>
        </div>
        </div>
		</section>

    @endif
    @endforeach
	</main>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.7/fullpage.js"></script>
	<script src="js/opcionesnew.js"></script>



</body>
</html>
