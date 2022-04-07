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
                                    <h3 class="mb-0">{{ __('Descargar QR') }}</h3>
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
                                   <center><h1>{{$nicho->coordenada}}</h1> </center>
                                    <?php
                                 $searchString = " ";
                                 $replaceString = "";
                                 $originalString = "{$nicho->coordenada}";
                                 $outputString = str_replace($searchString, $replaceString, $originalString);?>
                <img  src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(500)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/'.$outputString)) !!} ">
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

<script src="{{ asset('js/axios.js') }}"></script>
<script>
    "downloadImage('https://upload.wikimedia.org/wikipedia/commons/thumb/0/02/Stack_Overflow_logo.svg/1280px-Stack_Overflow_logo.svg.png', 'LogoStackOverflow.png')"

</script>

@endpush
@endif
