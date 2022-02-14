@extends('layouts.invitado.invitadomenu')

@section('header')
<div>
    <img src="{{ asset('img/Logohc.png') }}" alt="..." width="200" >
  <nav class="nav nav-masthead justify-content-center float-md-end">
    <a class="nav-link"  href="#">Inicio</a>
    <a class="nav-link" href="#">Condolencias</a>
    <a class="nav-link" href="#">Presentacion</a>
    <a class="nav-link active" aria-current="page" href="#">Contacto</a>
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
}
</style><br>
<center>
    <div class="card text-white bg-secondary mb-3 smartcard" >
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Contacto</h5>
          <p class="card-text">Horario: Lunes a Viernes de 10:00 a 18:00 hrs. Sábado y Domingo de 10:00 a 14:00 hrs. Para mayores informes comuníquese con nosotros o envíenos sus comentarios.</p>
        </div><hr>
        <div class="card-body">
            <form>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>
                  <div class="input-group">
                    <span class="input-group-addon">👤</span>
                    <input type="text" class="form-control" placeholder="Nombre">
                  </div>
                </div><hr>
                <div class="form-group">
                    <label for="exampleInputEmail1">Telefono</label>
                    <div class="input-group">
                        <span class="input-group-addon">📱</span>
                        <input type="text" class="form-control" placeholder="Telefono">
                      </div>
                  </div><hr>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <div class="input-group">
                        <span class="input-group-addon">📧</span>
                        <input type="email" class="form-control" placeholder="Correo Electronico">
                      </div>
                  </div><hr>
                  <label for="exampleInputEmail1">Asunto</label>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Informes
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Sugerencias
                    </label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Quejas
                    </label>
                  </div><hr>
                  <div class="md-form">
                    <label for="form10">Mensaje</label>&nbsp&nbsp  <i class="fas fa-pencil-alt prefix"></i>
                    <textarea id="form10" class="md-textarea form-control" rows="3"></textarea>
                    
                  </div><br>
              </form>
          </div><hr>
        <div class="card-body">
          <a href="#" class="card-link">Regresar</a>
          <a href="#" class="card-link">Enviar</a>
        </div>
      </div>
      
      
</center>
@endsection
