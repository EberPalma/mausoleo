@extends('layouts.invitado.invitadomenu')

@section('header')
<div>
    <img src="{{ asset('img/Logohc.png') }}" alt="..." width="200" >
    <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link"  href="/">Inicio</a>
        <a class="nav-link active" aria-current="page" href="#">Contacto</a>&nbsp&nbsp&nbsp
        <li class="nav-item dropdown show">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Recordando a</a>
          <div id="dropdownf" class="dropdown-menu show" aria-labelledby="dropdown07">
            <a class="dropdown-item" href="/RecordamosHoy">Hoy</a>
            <a class="dropdown-item" href="/RecordamosEsteMes">Mes</a>
          </div>
        </li>
      </nav>
</div>
@endsection
@section('body')
<style>

    @media screen and (max-width: 1008px) {
        .smartcard{
        width: 23rem;
    }

}
    @media screen and (min-width: 1008px) {
        .smartcard{
        width: 40rem;
    }

    strong{
        color:#f75e25 ;
    }

}
</style><br>
<center>
   <h2 > Se envió su condolencia de forma exitosa </h2>
   <h4> Este mensaje será supervisado y le notificaremos en caso de ser aceptado. </h4>
   <div id="delayMsg"></div><br><br>
<a class="btn btn-primary" href="/invitado.inicio" >Ir al Inicio</a>
</center>
<script>
    $(document).ready(function(){
        $("#delayMsg").html("Lo redireccionaremos en <span id='countDown'>5</span> segundos....");
        var count = 10;
        setInterval(function(){
            count--;
            $("#countDown").html(count);
            if (count == 0) {
                window.location = '/';
            }
        },1000);
    });
    </script>

@endsection
