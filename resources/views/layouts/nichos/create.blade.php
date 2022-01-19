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
                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf
                                @method('patch')

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de nicho') }}</h6>
                                
                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
        
                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-map-marker"></i>{{ __(' Coordenada') }}
                                        </label>
                                        <input type="text" name="name" id="input-name" class="form-control" placeholder="{{ __('Ejemplo: A1') }}" value="" required autofocus>
        
            
                                    </div>
                                    <div class="form-group col-3">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-sitemap"></i>{{ __(' Tamaño') }}
                                        </label>
                                        <input type="number" name="apaterno" id="" class="form-control" placeholder="{{ __('Ejemplo: 4') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">
                                                <i class="w3-xxlarge fa fa-user"></i>{{ __(' Nombre del Titular') }}
                                            </label>
                                            <input type="text" name="name" id="input-name" class="form-control" placeholder="{{ __('Ejemplo: Juan Perez') }}" value="" required autofocus>
            
                                            @include('alerts.feedback', ['field' => 'name'])
                                        </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-users"></i>{{ __(' Familia') }}</label>
                                        <input type="text" name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Ejemplo: Perez Gutierrez') }}" value="" required>
        
                                       
                                    </div>
                                    
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __(' CORREO ELECTRÓNICO') }}</label>
                                        <input type="email" 
                                               name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="" required>
        
                                        @include('alerts.feedback', ['field' => 'email'])
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