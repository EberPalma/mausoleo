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
                                    <h3 class="mb-0">{{ __('Editar Difunto') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="/api/beneficiariosupdate/{{ $beneficiario->id }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de difunto') }}</h6>
                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre') }}
                                        </label>
                                        <input type="text" name="nombre" id="input-name" class="form-control" placeholder="{{ __('Jose') }}" value="{{ $beneficiario->nombre }}" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <!--<div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Apellidos') }}
                                        </label>
                                        <input type="text" name="apaterno" id="" class="form-control" placeholder="{{ __('Gonzales Hernandez') }}" value="" required autofocus>
        
                                        
                                    </div>-->
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de nacimiento') }}
                                        </label>
                                        <input type="text" name="fechaNacimiento" id="" class="form-control datepicker1 valfechan" placeholder="Da clic en este campo" value="{{ $beneficiario->fechaNacimiento }}" required autofocus>
                                        <span style="color:red; float:right;" id="spaninputfn"></span>
                                        <input type="hidden" id="valfn" value="">
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}
                                        </label>
                                        <input type="text" name="fechaDefuncion" id="input-fechad" class="form-control datepicker2 valfd" placeholder="{{ __('Da clic en este campo') }}" value="{{ $beneficiario->fechaDefuncion }}" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <input type="text" name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Mensaje') }}" value="{{ $beneficiario->mensaje }}" required>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-map-marker"></i>{{ __('Coordenada') }}</label>
                                        <input type="text" name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Ejemplo: A 1') }}" value="{{ $beneficiario->idNicho }}" required>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    
                                    <hr>
                                    <br>
                                    <h6 class="heading-small text-muted mb-3">{{ __('Fotos del difunto') }}</h6>
                                    <div class="row">
                                    <div class="drop-zone col-md-4 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Principal</span>
                                        <input type="file" name="myFile" class="drop-zone__input">
                                      </div>
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 1</span>
                                        <input type="file" name="myFile" class="drop-zone__input">
                                      </div>
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 2</span>
                                        <input type="file" name="myFile" class="drop-zone__input">
                                      </div>
                                    </div>
                                    
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
                                    </div>
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
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('img/faces/9_1.jpg') }}" alt="...">
                                        <h5 class="title">{{ $beneficiario->nombre }}</h5>
                                    </a>
                                    <p class="description">
                                       <b>Nacimiento:</b> {{ $beneficiario->fechaNacimiento }}
                                    </p>
                                    <p class="description">
                                        <b>Defunción:</b> {{ $beneficiario->fechaDefuncion }}
                                     </p>
                                </div>
                                <p class="description text-center">
                                @if ($beneficiario->mensaje == NULL)

                                
                                @else
                                

                                "{{ $beneficiario->mensaje }}"
                                @endif  
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <img width="200px" src="{{ asset('img/qr-code.png') }}" class="rounded float-left" alt="...">
                            </div>
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
        //Validaciones segun el input
       
       
       const $input1 = document.querySelector('.datepicker1');
       const patron1 = /[0-9/AMP:]+/;
       const r = /([0-2][0-9]|3[0-1]|[0-9])(\/|-)([1-9]|0[1-9]|1[0-2])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])(:)([0-5][0-9])(\s)([AP][M])\z/gm; 
       const validacionf =  $(".valfn").val();

       $input1.addEventListener("keydown", event => {
        
                   console.log(event.key);
                   console.log(validacionf);
                   if(patron1.test(event.key)){
                    $(".datepicker1").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".datepicker1").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }
                   
                   
               });
 
       const $input2 = document.querySelector('.datepicker2');
       const patron2 = /[0-9/AMP:]+/;
       $input2.addEventListener("keydown", event => {
                   console.log(event.key);
                   if(patron2.test(event.key)){
                       $(".datepicker2").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".datepicker2").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }
               });
            });
</script>

@endpush
@endif