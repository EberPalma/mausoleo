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
                                        <input type="text" name="nombre" id="input-coordenada" class="form-control" placeholder="{{ __('Ejemplo: A1') }}" value="{{ $nicho->coordenada }}" required autofocus>
        
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
                                    <input type="text" name="nombre" id="input-nombre" class="form-control" placeholder="{{ __('Ejemplo: Jose Perez') }}" value="{{ $nicho->nombre }}" required autofocus>
    
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-name">
                                        <i class="w3-xxlarge fa fa-users"></i>{{ __(' Familia') }}
                                    </label>
                                    <input type="text" name="nombre" id="input-familia" class="form-control" placeholder="{{ __('Ejemplo: Perez') }}" value="{{ $nicho->familia }}" required autofocus>
    
                                    @include('alerts.feedback', ['field' => 'name'])
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('CORREO ELECTRÓNICO') }}</label>
                                    <input type="email" 
                                           name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ $nicho->email }}" required>
    
                                    @include('alerts.feedback', ['field' => 'email'])
                                </div>
                                
                                    
                                    
                                    
                                    
                                    
                                    <div class="text-center">
                                        <button type="submit" id="btnSubmit" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
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
                                       Coordenada: <b>{{ $nicho->coordenada }}</b>
                                    </p>
                                    <hr>
                                    <p class="description">
                                        Tamaño: <b>{{ $nicho->capacidad }}</b>
                                     </p>
                                     <hr>
                                     <p class="description">
                                        Nombre del Titular:<br> <b>{{ $nicho->nombre }}</b> 
                                     </p>
                                     <p class="description">
                                        Familia:<br> <b>{{ $nicho->familia }}</b> 
                                     </p>
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
                                echo('<img width="200px" src="http://127.0.0.1:8000/Images/QrCode/QRCodeNicho'.$outputString.'.png">'); 
                                ?> 
                                <a class="btn btn-success" href=""> Imprimir </a>
                                <a class="btn btn-primary" href=""> Descargar </a>
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
                email: document.querySelector('#input-email').value
            }).then((response)=>{
                alert(response.data);
            });
        });
    });
</script>

@endpush
@endif