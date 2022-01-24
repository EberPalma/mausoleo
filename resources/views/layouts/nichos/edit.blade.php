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
                                        <input type="text" name="nombre" id="input-name" class="form-control" placeholder="{{ __('Ejemplo: A1') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                    <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-sitemap"></i>{{ __(' TAMAÑO') }}
                                        </label>
                                        <input type="number" name="nombre" id="input-name" class="form-control" placeholder="{{ __('Ejemplo: 4') }}" value="" required autofocus>
        
                                        @include('alerts.feedback', ['field' => 'name'])
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">
                                        <i class="w3-xxlarge fa fa-user"></i>{{ __(' Nombre del Titular') }}
                                    </label>
                                    <input type="text" name="nombre" id="input-name" class="form-control" placeholder="{{ __('Ejemplo: Jose Perez') }}" value="" required autofocus>
    
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">
                                        <i class="w3-xxlarge fa fa-users"></i>{{ __(' Familia') }}
                                    </label>
                                    <input type="text" name="nombre" id="input-name" class="form-control" placeholder="{{ __('Ejemplo: Perez') }}" value="" required autofocus>
    
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('CORREO ELECTRÓNICO') }}</label>
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
                                       Coordenada: <b>A1</b>
                                    </p>
                                    <hr>
                                    <p class="description">
                                        Tamaño: <b>4</b>
                                     </p>
                                     <hr>
                                     <p class="description">
                                        Nombre del Titular: <b>Jose Perez</b> 
                                     </p>
                                     <hr>
                                     <p class="description" title="Enviar email">
                                        Email: <a href="mailto:joseperez@gmail.com">joseperez@gmail.com</a> 
                                     </p>
                                </div>
                                <p class="description text-center">

                                
                                    
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <center>Codigo QR:</center> 
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


@endpush
@endif