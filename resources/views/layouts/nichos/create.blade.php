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
                                    <h3 class="mb-0">{{ __('Añadir Nicho') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('nichosStore') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de nicho') }}</h6>
                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="coordenada">
                                            <i class="w3-xxlarge fa fa-map-marker "></i>{{ __(' Coordenada') }}
                                        </label>
                                        <input type="text" name="coordenada" id="coordenada" class="form-control coord nicoo" placeholder="{{ __('Ejemplo: A1') }}" value="" required autofocus>
                                        <span style="color:red; float:right;" id="spancoo"></span>
        
            
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label" for="capacidad">
                                            <i class="w3-xxlarge fa fa-sitemap"></i>{{ __(' Tamaño') }}
                                        </label>
                                        <input type="number" name="capacidad" id="capacidad" class="form-control" placeholder="{{ __('Ejemplo: 4') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="nombre">
                                                <i class="w3-xxlarge fa fa-user"></i>{{ __(' Nombre del Titular') }}
                                            </label>
                                            <input type="text" name="nombre" id="nombre" class="form-control nomb" placeholder="{{ __('Ejemplo: Juan Perez') }}" value="" required autofocus>
            
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="familia"><i class="w3-xxlarge fa fa-users"></i>{{ __(' Familia') }}</label>
                                        <input type="text" name="familia" id="familia" class="form-control fami" placeholder="{{ __('Ejemplo: Perez Gutierrez') }}" value="" required>
        
                                       
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __(' CORREO ELECTRÓNICO') }}</label>
                                        <input type="email" 
                                               name="email" id="email" class="form-control mail {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="" required>
                                               <span style="color:red; float:right;" id="spanmail"></span>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" id="btnSubmit" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
                                    </div>
                                </div>
                            </form>
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
        document.querySelector('#btnSubmit').addEventListener('click', (e)=>{
            e.preventDefault();
            axios.post('api/nichosstore', {
                coordenada: document.querySelector('#coordenada').value,
                capacidad: document.querySelector('#capacidad').value,
                nombre: document.querySelector('#nombre').value,
                familia: document.querySelector('#familia').value,
                email: document.querySelector('#email').value
            }).then((response)=>{
                alert(response.data.message);
            });
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $("#btnSubmit").hide();
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
                            $(".mail").css({ "border":"1px solid #0F0"}).fadeIn(2000);}
                            else{$("#spanmail").text("Correo Incorrecto").css("color", "red");
                            $(".mail").css({ "border":"1px solid #F00"}).fadeIn(2000);}
                            });
                            

                            $(".nicoo").blur(function(){
                            var txtcoo = $(".nicoo").val();
                            var valcoo = /([A-Z])\s([0-9])/gm;
                            if(valcoo.test(txtcoo)){
                                $("#spancoo").text("Correcto").css("color", "green");
                            $(".nicoo").css({ "border":"1px solid #0C0"}).fadeIn(2000);
                            $("#btnSubmit").show();}
                            else{$("#spancoo").text("Siga la sintaxis: Letra(s)+Espacio+Numero").css("color", "red");
                            $(".nicoo").css({ "border":"1px solid #C00"}).fadeIn(2000);
                            $("#btnSubmit").hide();}
                            });

         });
         
                       
</script>

@endpush
@endif