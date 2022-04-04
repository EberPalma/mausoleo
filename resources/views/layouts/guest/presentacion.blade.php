<!DOCTYPE html>
<style>
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
  max-width: 800px;
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
.card .banner img:hover {
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
  font-size: 0.85rem;
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

</style>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Presentacion</title>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Oswald&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.7/fullpage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<main id="fullpage">
		<header class="section" style="background-image:url('images/demo/backgrounds/marmol-blanco.jpg');" >

            <div class="card" style="float:right">
                <img width="120px" height="120px" src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(300)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/A7')) !!} ">
                <div class="card-body">
                    <h4 class="card-text">A7</h4>
                  </div>

            </div>

            <center>
            <div class="container">
                <div class="row justify-content-md-center">
                    <div class="col-md-auto">
            <div class="card">
                <div class="banner">
                  <img src="Images/Beneficiary/2_1.jpg">&nbsp;&nbsp;&nbsp;
                  <img src="Images/Beneficiary/3_1.jpg">
                </div>
                <div class="menu">
                  <div class="opener"><span></span><span></span><span></span></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h3 class="name">Manuel Roberto Maya Guadarrama</h3>
                            <div class="title">Información</div>
                            <div class="actions">
                              <div class="follow-info">
                                <h2><a href="#"><span>8/26/1922</span><small>Nacimiento</small></a></h2>
                                <h2><a href="#"><span>---</span><small></small></a></h2>
                                <h2><a href="#"><span>2/12/2015</span><small>Defunción</small></a></h2>
                              </div>
                            </div>
            </div>
                <div class="col">
                    <h3 class="name">Maria de la Luz Quiroz Sanchez</h3>
                <div class="title">Información</div>
                <div class="actions">
                  <div class="follow-info">
                    <h2><a href="#"><span>6/7/1917</span><small>Nacimiento</small></a></h2>
                    <h2><a href="#"><span>---</span><small></small></a></h2>
                    <h2><a href="#"><span>11/23/2012</span><small>Defunción</small></a></h2>
                  </div>
                </div>

                </div>
                </div>
                </div>
            </div>
            <div class="col">
            </div>
        </center>
        </div>
        </div>
		</header>
		<section class="section">
			<h1>Productos</h1>
		</section>
		<footer class="section">
			<h1>Footer</h1>
		</footer>
	</main>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.0.7/fullpage.js"></script>
	<script src="js/opciones.js"></script>

</body>
</html>