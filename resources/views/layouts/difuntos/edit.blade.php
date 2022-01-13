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
                                        <input type="text" name="apaterno" id="" class="form-control" placeholder="Da clic en este campo" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}
                                        </label>
                                        <input type="text" name="username" id="" class="form-control" placeholder="{{ __('Da clic en este campo') }}" value="" required autofocus>
        
                                        
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control" placeholder="{{ __('Mensaje') }}" value="" required>
        
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
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('img/faces/face-3.jpg') }}" alt="...">
                                        <h5 class="title">{{ __('Mike Andrew') }}</h5>
                                    </a>
                                    <p class="description">
                                        {{ __('michael24') }}
                                    </p>
                                </div>
                                <p class="description text-center">
                                {{ __(' "Lamborghini Mercy') }}
                                    <br> {{ __('Your chick she so thirsty') }}
                                    <br> {{ __('I am in that two seat Lambo') }}
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-google-plus-square"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endif