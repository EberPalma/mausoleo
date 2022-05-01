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
                                    <h3 class="mb-0">{{ __('Añadir Promoción') }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('PromocionesStore') }}" autocomplete="off"
                                enctype="multipart/form-data">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('Información de promoción') }}</h6>

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">
                                    <div class="form-group">
                                        <label class="form-control-label" for="coordenada">
                                            <h4> <svg style="width:30px; margin-right:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M326.3 218.8c0 20.5-16.7 37.2-37.2 37.2h-70.3v-74.4h70.3c20.5 0 37.2 16.7 37.2 37.2zM504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zm-128.1-37.2c0-47.9-38.9-86.8-86.8-86.8H169.2v248h49.6v-74.4h70.3c47.9 0 86.8-38.9 86.8-86.8z"/></svg>{{ __('Titulo de promocion') }}</h4>
                                        </label>
                                        <input type="text" name="nombre" class="form-control " placeholder="{{ __('Ejemplo: Urnas 2x1 (Opcional)' ) }}" value="" required autofocus>

                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-control-label" for="precio">
                                            <h4><svg style="width:30px; margin-right:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M271.06,144.3l54.27,14.3a8.59,8.59,0,0,1,6.63,8.1c0,4.6-4.09,8.4-9.12,8.4h-35.6a30,30,0,0,1-11.19-2.2c-5.24-2.2-11.28-1.7-15.3,2l-19,17.5a11.68,11.68,0,0,0-2.25,2.66,11.42,11.42,0,0,0,3.88,15.74,83.77,83.77,0,0,0,34.51,11.5V240c0,8.8,7.83,16,17.37,16h17.37c9.55,0,17.38-7.2,17.38-16V222.4c32.93-3.6,57.84-31,53.5-63-3.15-23-22.46-41.3-46.56-47.7L282.68,97.4a8.59,8.59,0,0,1-6.63-8.1c0-4.6,4.09-8.4,9.12-8.4h35.6A30,30,0,0,1,332,83.1c5.23,2.2,11.28,1.7,15.3-2l19-17.5A11.31,11.31,0,0,0,368.47,61a11.43,11.43,0,0,0-3.84-15.78,83.82,83.82,0,0,0-34.52-11.5V16c0-8.8-7.82-16-17.37-16H295.37C285.82,0,278,7.2,278,16V33.6c-32.89,3.6-57.85,31-53.51,63C227.63,119.6,247,137.9,271.06,144.3ZM565.27,328.1c-11.8-10.7-30.2-10-42.6,0L430.27,402a63.64,63.64,0,0,1-40,14H272a16,16,0,0,1,0-32h78.29c15.9,0,30.71-10.9,33.25-26.6a31.2,31.2,0,0,0,.46-5.46A32,32,0,0,0,352,320H192a117.66,117.66,0,0,0-74.1,26.29L71.4,384H16A16,16,0,0,0,0,400v96a16,16,0,0,0,16,16H372.77a64,64,0,0,0,40-14L564,377a32,32,0,0,0,1.28-48.9Z"/></svg>{{ __(' Precio') }}</h4>
                                        </label>
                                        <input type="number" name="precio" id="precio" class="form-control" placeholder="{{ __('Ejemplo: 200.00 (Opcional)') }}" value="" required autofocus>


                                    </div>
                                    <div class="pl-lg-4">
                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="descripcion">
                                                <h4><svg style="width:30px; margin-right:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 9.8 11.2 15.5 19.1 9.7L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64z"/></svg>{{ __(' Descripción') }}</h4>
                                            </label>
                                            <textarea rows="5" name="descripcion" id="descripcion" class="form-control nomb" placeholder="{{ __('Ejemplo: ¡Disfruta de esta increible promoción 2x1! (Opcional)') }}" value="" required autofocus></textarea>
                                        </div>
                                        <hr>
                                    <div class="form-group">
                                        <label class="form-control-label" for="foto"><h4><svg  style="width:30px ; margin-right:20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M464 448H48c-26.51 0-48-21.49-48-48V112c0-26.51 21.49-48 48-48h416c26.51 0 48 21.49 48 48v288c0 26.51-21.49 48-48 48zM112 120c-30.928 0-56 25.072-56 56s25.072 56 56 56 56-25.072 56-56-25.072-56-56-56zM64 384h384V272l-87.515-87.515c-4.686-4.686-12.284-4.686-16.971 0L208 320l-55.515-55.515c-4.686-4.686-12.284-4.686-16.971 0L64 336v48z"/></svg>{{ __(' Foto') }}</h4></label>
                                        <div class="drop-zone ">
                                            <span class="drop-zone__prompt">Foto Promoción (Requerido)</span>
                                            <input accept="image/*" type="file" name="foto1" class="drop-zone__input">
                                          </div>
                                          </div>
                                        </div>


                                    </div>

                                    <div class="text-center">
                                        <button type="submit" id="btnSubmit" class="btn btn-default mt-4">{{ __('GUARDAR') }}</button>
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
<script src="{{ asset('js/axios.js') }}"></script>
<script>
    
</script>

@endpush
@endif
