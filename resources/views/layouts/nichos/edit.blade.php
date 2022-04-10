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
                                    <h3 class="mb-0">{{ __('Editar Nicho') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de nicho') }}</h6>

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-map-marker"></i>{{ __('COORDENADA') }}
                                        </label>
                                        <input type="text" name="nombre" id="input-coordenada" class="form-control coord nicoo" placeholder="{{ __('Ejemplo: A1') }}" value="{{ $nicho->coordenada }}" required autofocus>
                                        <span style="color:red; float:right;" id="spancoo"></span>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-sitemap"></i>{{ __(' TAMAÑO') }}
                                        </label>
                                        <input type="number" name="nombre" id="input-capacidad" class="form-control" placeholder="{{ __('Ejemplo: 4') }}" value="{{ $nicho->capacidad }}" required autofocus>

                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __(' Nombre del Titular') }}
                                    </label>
                                    <input type="text" name="nombre" id="input-nombre" class="form-control nomb" placeholder="{{ __('Ejemplo: Jose Perez') }}" value="{{ $nicho->nombre }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">
                                        <i class="w3-xxlarge fa fa-users"></i>{{ __(' Familia') }}
                                    </label>
                                    <input type="text" name="nombre" id="input-familia" class="form-control fami" placeholder="{{ __('Ejemplo: Perez') }}" value="{{ $nicho->familia }}" required autofocus>

                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('CORREO ELECTRÓNICO') }}</label>
                                    <input type="email"
                                           name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} mail" placeholder="{{ __('Email') }}" value="{{ $nicho->email }}" required>
                                           <span style="color:red; float:right;" id="spanmail"></span>

                                    @include('alerts.feedback', ['field' => 'email'])

                                </div>
                                <div class="text-center">
                                    <button class="btn btn-warning" type="submit" id="btnSubmit" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
                                </div><br><br><br>

                                <h4>Difuntos</h4>
                                <hr>
                                <div class="col-md-12" id="difuntosList">
                                    @foreach($difuntos as $difunto)
                                    @if ($difunto->activo = 0)
                                    @else
                                    <div class="alert alert-success">

                                        <span>
                                            @if (File::exists(public_path("Images/Beneficiary/{$difunto->id}_1.jpg")))
                                            <img style="border-radius: 50%; width:30px" class="avatar border-gray" src="{{ asset("Images/Beneficiary/{$difunto->id}_1.jpg") }}" alt="...">
                                            @else
                                            <img style="border-radius: 50%; width:30px"class="avatar border-gray" src="{{ asset("img/MSC.png") }}" alt="...">
                                            @endif<a href="../difunto.editar/{{ $difunto->id }}">- {{ $difunto->nombre }}</a><br>
                                    </div>

                                    @endif
                                    @endforeach
                                </div>
                                <hr>



                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="{{ asset('img/1.jpg') }}" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#vistaporindividual">
                                        <br>
                                        <br>
                                        <br>
                                        <hr>
                                        <h5 class="title" title="Ver registro"> Contenido Actual </h5>
                                    </a>
                                    <hr>

                                    <p class="description">
                                       Coordenada: <b>{{ $nicho->coordenada }}</b>
                                    </p>
                                    <hr>
                                    <p class="description">
                                        Tamaño: <b>{{ $nicho->capacidad }}</b>
                                     </p>
                                     <hr>
                                     @if ($nicho->nombre<>null)
                                     <p class="description">
                                        Nombre del Titular:<br> <b>{{ $nicho->nombre }}</b>
                                     </p>
                                     @else
                                     <b class="description" style="color:green">
                                        No hay registro de titular
                                     </b><br>
                                     @endif
                                     @if ($nicho->nombre<>null)
                                     <p class="description">
                                        Familia:<br> <b>{{ $nicho->familia }}</b>
                                     </p>
                                     @else
                                     <b class="description" style="color:green">
                                        No hay registro de familia
                                     </b>
                                     @endif
                                     @if ($nicho->email == NULL)


                                     @else
                                     <hr>
                                     <p class="description" title="Enviar email">
                                        Email: <a href="mailto:{{ $nicho->email }}">{{ $nicho->email }}</a>
                                     </p>
                                     @endif

                                </div>
                                <p class="description text-center">



                                </p>
                            </div>
                            <hr>
                            <center> <b>CODIGO QR<b>
                                <?php
                                 $searchString = " ";
                                 $replaceString = "";
                                 $originalString = "{$nicho->coordenada}";
                                 $outputString = str_replace($searchString, $replaceString, $originalString);

                                  ?>
                                  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/'.$outputString)) !!} ">
                                  <a class="btn btn-primary" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(500)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/'.$outputString)) !!} " download="{{$nicho->coordenada}}.png"> Descargar </a>

                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')

<script src="{{ asset('js/axios.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        let btn = document.querySelector('#btnSubmit');
        btn.addEventListener('click', (e)=>{
            e.preventDefault();
            
            axios.put('../api/nichosupdate/{{ $nicho->id }}', {
                coordenada: document.querySelector('#input-coordenada').value,
                capacidad: document.querySelector('#input-capacidad').value,
                nombre: document.querySelector('#input-nombre').value,
                familia: document.querySelector('#input-familia').value,
                email: document.querySelector('#input-email').value == "" ? 'ejemplo@mausoleosantaclara.com' : document.querySelector('#input-email').value
            }).then((response)=>{
                alert(response.data);
            });
        });
    });
    $(document).ready(function(){

        //Validaciones segun el input


       const $input1 = document.querySelector('.coord');
       const patron1 = /[A-Z 0-9]+/;
       $input1.addEventListener("keydown", event => {

                   if(patron1.test(event.key)){

                   }
                   else{
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }


               });

            const $input2 = document.querySelector('.nomb');
            const patron2 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
            $input2.addEventListener("keydown", event => {

                        if(patron2.test(event.key)){
                            $(".nomb").css({ "border": "1px solid #0C0"});
                        }
                        else{$(".nomb").css({ "border": "1px solid #C00"});
                            if(event.keyCode==8){ console.log("backspace"); }
                            else{ event.preventDefault();}
                        }


                    });
                    const $input3 = document.querySelector('.fami');

                    $input3.addEventListener("keydown", event => {

                                if(patron2.test(event.key)){
                                    $(".fami").css({ "border": "1px solid #0C0"});
                                }
                                else{$(".fami").css({ "border": "1px solid #C00"});
                                    if(event.keyCode==8){ console.log("backspace"); }
                                    else{ event.preventDefault();}
                                }


                            });

                            $(".mail").blur(function(){
                            var txtmail = $(".mail").val();
                            var valmail = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
                            if(valmail.test(txtmail)){
                                $("#spanmail").text("Valido").css("color", "green");
                            $(".mail").css({ "border":"1px solid #0F0"}).fadeIn(2000);
                            $("#btnSubmit").show();}
                            else{$("#spanmail").text("Correo Incorrecto").css("color", "red");
                            $(".mail").css({ "border":"1px solid #F00"}).fadeIn(2000);
                            $("#btnSubmit").hide();}
                            });


                            $(".nicoo").keyup(function(){
                            var txtcoo = $(".nicoo").val();
                            var valcoo = /([A-Z])\s([0-9])/gm;
                            if(valcoo.test(txtcoo)){
                                $("#spancoo").text("Correcto").css("color", "green");
                            $(".nicoo").css({ "border":"1px solid #0C0"}).fadeIn(2000);
                            $("#btnSubmit").show();
                            }
                            else{$("#spancoo").text("Siga la sintaxis: Letra(s)+Espacio+Numero").css("color", "red");
                            $(".nicoo").css({ "border":"1px solid #C00"}).fadeIn(2000);
                            $("#btnSubmit").hide();
                            }
                            });


         });

</script>

@endpush
@endif
