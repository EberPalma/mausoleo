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
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
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
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Apellidos') }}
                                        </label>
                                        <input type="text" name="apaterno" id="" class="form-control" placeholder="{{ __('Gonzales Hernandez') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de nacimiento') }}
                                        </label>
                                        <input type="date" name="fechan" id="" class="form-control datepicker" placeholder="Da clic en este campo" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}
                                        </label>
                                        <input type="date" name="fecha-d" id="input-fechad" class="form-control datepicker" placeholder="{{ __('Da clic en este campo') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <input type="text" name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Mensaje') }}" value="" required>
        
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

                    
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')


@endpush
@endif