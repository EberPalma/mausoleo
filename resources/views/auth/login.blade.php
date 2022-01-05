@extends('layouts/app', ['activePage' => 'login', 'title' => 'Login | Mausoleo Santa Clara'])

@section('content')
    <div class="full-page section-image" data-color="black" data-image="{{ asset('img/full-screen-image-2.jpg') }}">
        <div class="content pt-5">
            <div class="container mt-5">    
                <div class="col-md-4 col-sm-6 ml-auto mr-auto">
                    <form class="form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="card card-login card-hidden">
                            <div class="card-header ">
                                <h3 class="header text-center">{{ __('Inicio de Sesión') }}</h3>
                            </div>
                            <div class="card-body ">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="email" class="col-md-6 col-form-label">{{ __('Correo electrónico') }}</label>
            
                                        <div class="col-md-14">
                                            <input id="emailInput" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', 'admin@lightbp.com') }}" required autocomplete="email" autofocus>
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="col-md-6 col-form-label">{{ __('Contraseña') }}</label>
                
                                            <div class="col-md-14">
                                                <input id="passwordInput" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password', 'secret') }}" required autocomplete="current-password">
                
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label d-flex align-items-center">
                                                    <input class="form-check-input" type="checkbox" name="remember"  id="remember">
                                                    <span class="form-check-sign"></span>
                                                    {{ __('Recuerdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <div class="container text-center" >
                                        <button type="submit" class="btn btn-warning btn-wd" id="submitButton">{{ __('Iniciar Sesión') }}</button>
                                    </div>
                                    <div>
                                        
                                        <a class="btn btn-link"  style="color:#23CCEF; margin-left:25%" href="{{ route('login') }}">
                                        {{ __('Olvidaste tu contraseña?') }}
                                        </a>
                                    
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', ()=>{
            submitButton = document.querySelector('#submitButton');
            submitButton.addEventListener('click', (e)=>{
                e.preventDefault();
                let emailInput = document.querySelector('#emailInput');
                let passwordInput = document.querySelector('#passwordInput');
                axios.post('/api/login', {
                    username: emailInput.value,
                    password: passwordInput.value
                }).then((response)=>{
                    if(typeof(storage) != 'undefinied'){
                        console.log(response.data.session);
                        let username = response.data.session.username;
                        let fullname = response.data.session.fullname;
                        let id_session = response.data.session.id_session;
                        let status = response.data.session.status;
                        let type = response.data.session.type;
                        localStorage.setItem('mausoleoSessionFullname', fullname);
                        localStorage.setItem('mausoleoSessionUsername', username);
                        localStorage.setItem('mausoleoSessionId_session', id_session);
                        localStorage.setItem('mausoleoSessionStatus', status);
                        localStorage.setItem('mausoleoSessionType', type);
                    }
                    location.replace('/dashboard');
                });
            });
        });
    </script>
@endpush