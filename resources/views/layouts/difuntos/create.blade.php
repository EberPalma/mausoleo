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
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombres') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control" placeholder="{{ __('Jose') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="apaterno">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Apellido paterno') }}
                                        </label>
                                        <input type="text" name="apaterno" id="input-paterno" class="form-control" placeholder="{{ __('Gonzales Hernandez') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="amaterno">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Apellido materno') }}
                                        </label>
                                        <input type="text" name="amaterno" id="input-materno" class="form-control" placeholder="{{ __('Gonzales Hernandez') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="fechan">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de nacimiento') }}
                                        </label>
                                        <input type="date" name="fechan" id="fecha_nacimiento" class="form-control datepicker" placeholder="Da clic en este campo" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-d">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}
                                        </label>
                                        <input type="date" name="fecha-d" id="input-fechad" class="form-control datepicker" placeholder="{{ __('Da clic en este campo') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <input type="text" name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Mensaje') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="coordenada">
                                            <i class="w3-xxlarge fa fa-map-marker"></i>{{ __('Coordenada') }}
                                        </label>
                                        <input name="coordenada" id="input-coordenada" class="form-control datepicker" placeholder="Inserta la coordenada" value="" required autofocus>
        
                                        
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

@endpush
@endif