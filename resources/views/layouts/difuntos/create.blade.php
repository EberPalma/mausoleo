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
                                    <h3 class="mb-0">{{ __('Añadir Difunto') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="#" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de difunto') }}</h6>
                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre Completo') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control nombre" placeholder="{{ __('Jose Eduardo Lopez Perez') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="fechan">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de nacimiento') }}
                                        </label>
                                        <input type="date" name="fechan" id="fecha_nacimiento" class="form-control datepicker" placeholder="Da clic en este campo" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="fechan" id="hora_nacimiento" class="form-control datepicker" value="" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fechan" id="inputconcatna" class="form-control datepicker" value="" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-d">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}
                                        </label>
                                        <input type="date" name="fecha-d" id="fecha_defuncion" class="form-control datepicker" placeholder="{{ __('Da clic en este campo') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="time" name="fechad" id="hora_defuncion" class="form-control datepicker" value="12:00:00 AM." required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fechan" id="inputconcatd" class="form-control datepicker" value="" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <textarea  name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Mensaje') }}" value="" required></textarea>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="coordenada">
                                            <i class="w3-xxlarge fa fa-map-marker"></i>{{ __('Coordenada') }}
                                        </label>
                                        <input name="coordenada" id="input-coordenada" class="form-control datepicker coord" placeholder="Inserta la coordenada" value="" required autofocus>
        
                                        
                                    </div>
                                    
                                    <hr>
                                    <br>
                                    <h6 class="heading-small text-muted mb-3">{{ __('Fotos del difunto') }}</h6>
                                    <div class="row">
                                    <div class="drop-zone col-md-4 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Principal</span>
                                        <input accept="image/*" type="file" name="myFile" class="drop-zone__input">
                                      </div>
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 1</span>
                                        <input accept="image/*" type="file" name="myFile" class="drop-zone__input">
                                      </div>
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 2</span>
                                        <input accept="image/*" type="file" name="myFile" class="drop-zone__input">
                                      </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" id="agregarBTN" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/difuntosStore.js') }}"></script>
<script>
    $(document).ready(function(){
        //Validaciones segun el input
       
       
       const $input1 = document.querySelector('.nombre');
       const patron1 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
       $input1.addEventListener("keydown", event => {

                   if(patron1.test(event.key)){
                    $(".nombre").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".nombre").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }
                   
                   
               });
               const $input2 = document.querySelector('.coord');
                const patron2 = /[A-Z 0-9]+/;
                $input2.addEventListener("keydown", event => {

                            if(patron2.test(event.key)){
                                $(".coord").css({ "border": "1px solid #0C0"});
                            }
                            else{$(".coord").css({ "border": "1px solid #C00"});
                                if(event.keyCode==8){ console.log("backspace"); }
                                else{ event.preventDefault();}
                            }
                            
                            
                        });
                        var stringtna = "";
                        var stringfna = "";
                        

                        $( "#fecha_nacimiento" ).change(function( event ) {
                            var stringfna =   $( "#fecha_nacimiento" ).val();
                        var stringtna =   $( "#hora_nacimiento" ).val();
                        if (stringtna.value !== "") {
                            var displayTime = "12:00:00 AM";
                            var stringftna = stringfna+" "+displayTime;
                        }
                        
                        var day = stringfna.split("-")[0];
                        var month = stringfna.split("-")[1];
                        var year = stringfna.split("-")[2];
                        var displayDate = month + "/" + year +"/"+ day;
                        var stringftna = displayDate+" "+displayTime;
                        
                        $("#inputconcatna" ).val(stringftna);
                        })
                        $( "#hora_nacimiento" ).change(function( event ) {
                        var stringfna =   $( "#fecha_nacimiento" ).val();
                        var stringtna =   $( "#hora_nacimiento" ).val();
                        if (stringtna.value !== "") {
                            var hours = stringtna.split(":")[0];
                            var minutes = stringtna.split(":")[1];
                            var suffix = hours >= 12 ? "PM" : "AM";
                            hours = hours % 12 || 12;
                            hours = hours < 10 ? "0" + hours : hours;

                            var displayTime = hours + ":" + minutes +":00"+" " + suffix;
                            var stringftna = stringfna+" "+displayTime;
                        }else{
                            var displayTime = "12:00 AM";
                            var stringftna = stringfna+" "+displayTime;
                        }
                        
                        var day = stringfna.split("-")[0];
                        var month = stringfna.split("-")[1];
                        var year = stringfna.split("-")[2];
                        var displayDate = month + "/" + year +"/"+ day;
                        var stringftna = displayDate+" "+displayTime;
                        
                        $("#inputconcatna" ).val(stringftna);
                        })  
                        
                        $( "#fecha_defuncion" ).change(function( event ) {
                            var stringfd =   $( "#fecha_defuncion" ).val();
                        var stringtd =   $( "#hora_defuncion" ).val();
                        if (stringtd.value !== "") {
                            var displayTime = "12:00:00 AM";
                            var stringftd = stringfd+" "+displayTime;
                        }
                        
                        var day = stringfd.split("-")[0];
                        var month = stringfd.split("-")[1];
                        var year = stringfd.split("-")[2];
                        var displayDate = month + "/" + year +"/"+ day;
                        var stringftd = displayDate+" "+displayTime;
                        
                        $("#inputconcatd" ).val(stringftd);
                        })
                        $( "#hora_defuncion" ).change(function( event ) {
                        var stringfd =   $( "#fecha_defuncion" ).val();
                        var stringtd =   $( "#hora_defuncion" ).val();
                        if (stringtd.value !== "") {
                            var hours = stringtd.split(":")[0];
                            var minutes = stringtd.split(":")[1];
                            var suffix = hours >= 12 ? "PM" : "AM";
                            hours = hours % 12 || 12;
                            hours = hours < 10 ? "0" + hours : hours;

                            var displayTime = hours + ":" + minutes +":00"+" " + suffix;
                            var stringftd = stringfd+" "+displayTime;
                        }else{
                            var displayTime = "12:00 AM";
                            var stringftd = stringfd+" "+displayTime;
                        }
                        
                        var day = stringfd.split("-")[0];
                        var month = stringfd.split("-")[1];
                        var year = stringfd.split("-")[2];
                        var displayDate = month + "/" + year +"/"+ day;
                        var stringftd = displayDate+" "+displayTime;
                        
                        $("#inputconcatd" ).val(stringftd);
                        })
            });
</script>
@endpush
@endif