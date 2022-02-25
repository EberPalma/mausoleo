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
                            <form method="post" action="{{ route('beneficiariosStore') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de difunto') }}</h6>
                                <h6 class="heading-small mb-4" style="color:red; float: right;">{{ __('Campos obligatorios*') }}</h6>

                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre Completo') }}<label style="color:red;">*</label>
                                        </label>
                                        <input type="text" name="nombre" id="input-name" class="form-control nombre" placeholder="{{ __('Jose Eduardo Lopez Perez') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="fechan">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de nacimiento') }}<label style="color:red;">*</label>
                                        </label>
                                        <input type="date"  id="fecha_nacimiento" class="form-control datepicker innac" placeholder="Da clic en este campo" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="time"  id="hora_nacimiento" class="form-control datepicker" value="" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fechaNacimiento" id="inputconcatna" class="form-control datepicker" value="" required autofocus readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-d">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}<label style="color:red;">*</label>
                                        </label>
                                        <input type="date"  id="fecha_defuncion" class="form-control datepicker indef" placeholder="{{ __('Da clic en este campo') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <input type="time"  id="hora_defuncion" class="form-control datepicker" value="" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fechaDefuncion5" id="inputconcatd" class="form-control datepicker" value="" required autofocus readonly>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <textarea  name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Mensaje') }}" value="" required></textarea>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="coordenada">
                                            <i class="w3-xxlarge fa fa-map-marker"></i>{{ __('Coordenada') }}<label style="color:red;">*</label>
                                        </label><br>
                                        <select  class="form-control" name="idNicho" id="idNicho">
                                            <option >Selecciona una coordenada</option>
                                            @foreach($nichos as $nicho)
                                                <option value="{{$nicho->id}}">{{$nicho->coordenada}}</option>
                                            @endforeach
                                        </select>
        
                                        
                                    </div>
                                    
                                    <hr>
                                    <br>
                                    <h6 class="heading-small text-muted mb-3">{{ __('Fotos del difunto') }}</h6>
                                    <div class="row">
                                    <div class="drop-zone col-md-4 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Principal</span>
                                        <input accept="image/*" type="file" name="foto1" class="drop-zone__input">
                                      </div>
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 1</span>
                                        <input accept="image/*" type="file" name="foto2" class="drop-zone__input">
                                      </div>
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 2</span>
                                        <input accept="image/*" type="file" name="foto3" class="drop-zone__input">
                                      </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <input type="submit" id="agregarBTN" class="btn btn-default mt-4 btnsubmit" value="{{ __('GUARDAR')}}">
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