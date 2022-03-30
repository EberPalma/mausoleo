
@extends('index')
@if(!isset(Auth::user()->name))
    <meta http-equiv="refresh" content="0; url={{ route('login') }}">
@else
@section('Contenidoprincipal')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h3 class="mb-0">{{ __('Editar Perfil') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/api/userupdate/{{ auth()->user()->id }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de usuario') }}</h6>

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="inname form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Jose') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Apellido Paterno') }}
                                        </label>
                                        <input type="text" name="ap_paterno" id="" class="inappa form-control" placeholder="{{ __('Gonzales') }}" value="{{ auth()->user()->ap_paterno }}" required autofocus>


                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Apellido Materno') }}
                                        </label>
                                        <input type="text" name="ap_materno" id="" class="inapma form-control" placeholder="{{ __('Hernandez') }}" value="{{ auth()->user()->ap_materno }}" required autofocus>


                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre de usuario') }}
                                        </label>
                                        <input type="text" name="username" id="" class="inun form-control" placeholder="{{ __('JoseGH') }}" value="{{ auth()->user()->username }}" required autofocus>


                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('CORREO ELECTRÓNICO') }}</label>
                                        <input type="email"
                                               name="email" id="input-email" class="inemail form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>
                                               <span class="badge badge-warning" id="spanmail"></span>

                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
                                    </div>
                                </div>
                            </form>
                            <hr class="my-4" />
                            <form method="get" action="/api/changepassword/{{ auth()->user()->id }}">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('CONTRASEÑA') }}</h6>

                                @include('alerts.success', ['key' => 'password_status'])
                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-current-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Contraseña actual') }}
                                        </label>
                                        <input type="password" name="password" id="password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>

                                        @include('alerts.feedback', ['field' => 'old_password'])
                                    </div>
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-password">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Nueva Contraseña') }}
                                        </label>
                                        <input type="password" name="new_password" id="new-password" class="pass form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>
                                        <span class="badge badge-warning" id="passstrength"></span>

                                        @include('alerts.feedback', ['field' => 'password'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-password-confirmation">
                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Confirmar nueva contraseña') }}
                                        </label>
                                        <input type="password" name="conf_password" id="conf-password" class="confpass form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>
                                        <span class="badge badge-warning" id="passconf"></span>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" id="btnSubmit" class="btn btn-default mt-4">{{ __('CAMBIAR CONTRASEÑA') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <script src="{{ asset('js/axios.js') }}"></script>
                    <script>
                        document.addEventListener('DOMContentLoaded', ()=>{
                            let btn = document.querySelector('#btnSubmit');
                            btn.addEventListener('click',(e)=>{
                                e.preventDefault();
                                axios.post('/api/changepassword/{{ auth()->user()->id }}', {
                                    password: document.querySelector('#password').value,
                                    new_password: document.querySelector('#new-password').value,
                                    conf_password: document.querySelector('#conf-password').value
                                })
                                    .then((response)=>{
                                        alert(response.data);
                                    });
                            });
                        });
                    </script>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="{{ asset('img/7.jpg') }}" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src=" {{ asset('img/MSC.png') }}" alt="...">
                                        <h5 class="title">{{ auth()->user()->name }} {{ auth()->user()->ap_paterno }} {{ auth()->user()->ap_materno }}</h5>
                                    </a>
                                    <p class="description">
                                       <b>Nombre de Usuario:</b> {{ auth()->user()->username }} <br><br>
                                       <b>Email:</b> {{ auth()->user()->email }}
                                    </p>
                                </div>

                            </div>
                            <hr>
                             <center>  <h5> <span class="badge badge-warning">{{ auth()->user()->rol }}</span></h5> </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
<script>
$(document).ready(function(){
    $('#btnSubmit').hide();
    const $input1 = document.querySelector('.inname');
       const patron1 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
       $input1.addEventListener("keydown", event => {

                   if(patron1.test(event.key)){
                    $(".inname").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".inname").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }


               })
       const $input2 = document.querySelector('.inappa');
       const patron2 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
       $input2.addEventListener("keydown", event => {

                   if(patron2.test(event.key)){
                    $(".inappa").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".inappa").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }


               })
               const $input3 = document.querySelector('.inapma');
               const patron3 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
               $input3.addEventListener("keydown", event => {

                   if(patron3.test(event.key)){
                    $(".inapma").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".inapma").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }


               })
               const $input4 = document.querySelector('.inun');
               const patron4 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
               $input4.addEventListener("keydown", event => {

                   if(patron4.test(event.key)){
                    $(".inun").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".inun").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }


               })
               $(".inemail").blur(function(){
                            var txtmail = $(".inemail").val();
                            var valmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                            if(valmail.test(txtmail)){
                                $("#spanmail").text("Valido").css("color", "green");
                            $(".inemail").css({ "border":"1px solid #0F0"}).fadeIn(2000);}
                            else{$("#spanmail").text("Correo Incorrecto").css("color", "red");
                            $(".inemail").css({ "border":"1px solid #F00"}).fadeIn(2000);}
                });
    $('.pass').keyup(function(e) {
     var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
     var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
     var enoughRegex = new RegExp("(?=.{6,}).*", "g");
     if (false == enoughRegex.test($(this).val())) {
             $('#passstrength').html('Su contraseña necesita más caracteres.').css("color", "red");
             $(".pass").css({ "border":"1px solid #C00"}).fadeIn(2000);
     } else if (strongRegex.test($(this).val())) {
             $('#passstrength').className = 'ok';
             $('#passstrength').html('Su contraseña es fuerte!').css("color", "green");
             $(".pass").css({ "border":"1px solid #0C0"}).fadeIn(2000);
     } else if (mediumRegex.test($(this).val())) {
             $('#passstrength').className = 'alert';
             $(".pass").css({ "border":"1px solid #00C"}).fadeIn(2000);
             $('#passstrength').html('Nivel de seguridad media').css("color", "blue");
     } else {
             $('#passstrength').className = 'error';
             $(".pass").css({ "border":"1px solid #C00"}).fadeIn(2000);
             $('#passstrength').html('Su contraseña es debil, agrege minusculas, mayusculas, numeros y caracteres especiales').css("color", "red");
     }
     return true;
});
$('.confpass').keyup(function(e) {
    if($('.pass').val()==$('.confpass').val()){
        $('#passconf').hide();
        $('#btnSubmit').show();
        $(".confpass").css({ "border":"1px solid #0F0"}).fadeIn(2000);
    }else{
        $('#passconf').html('No coincide con la primera contraseña').css("color", "red");
        $('#btnSubmit').hide();
        $(".confpass").css({ "border":"1px solid #F00"}).fadeIn(2000);
    }
});
});
</script>
@endpush
@endif
