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
                                @if ($beneficiario->activo==0)
                                <div class="alert alert-danger">
                                    <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                                        <i class="nc-icon nc-simple-remove"></i>
                                    </button>
                                    <span>
                                    <b>Este registro se encuentra eliminado</b> </span>
                                </div>

                                @endif

                                @include('alerts.success')
                                @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Nombre') }}
                                        </label>
                                        <input type="text" name="nombre" id="input-name" class="form-control nameb" placeholder="{{ __('Jose') }}" value="{{ $beneficiario->nombre }}" required autofocus>

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
                                        <span style="color:gray; float:right;" id="spaninputfn">Mes/Dia/Año</span>


                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-name">
                                            <i class="w3-xxlarge fa fa-calendar"></i>{{ __('Fecha de defunción') }}
                                        </label>
                                        <input type="text" name="fechaDefuncion" id="input-fechad" class="form-control datepicker2 valfd" placeholder="{{ __('Da clic en este campo') }}" value="{{ $beneficiario->fechaDefuncion }}" required autofocus>
                                        <span style="color:gray; float:right;" id="spaninputfd">Mes/Dia/Año</span>


                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Mensaje o epitafilo') }}</label>
                                        <textarea rows="10" type="text" name="mensaje" id="input-mensaje" class="form-control" placeholder="{{ __('Mensaje') }}" spellcheck autofocus>{{ $beneficiario->mensaje }}</textarea>

                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-coordenada"><i class="w3-xxlarge fa fa-map-marker"></i>{{ __('Coordenada') }}</label>
                                        <select name="idNicho" id="input-coordenada" class="form-control selectdinamico">
                                            @foreach($nichos as $nicho)
                                                @if($nicho->id == $beneficiario->idNicho)
                                                    <option value="{{$nicho->id}}" selected>{{$nicho->coordenada}}</option>
                                                @else
                                                    <option value="{{$nicho->id}}" >{{$nicho->coordenada}}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                        @include('alerts.feedback', ['field' => 'email'])
                                    </div>

                                    <hr>
                                    <br>
                                    <h6 class="heading-small text-muted mb-3">{{ __('Fotos del difunto') }}</h6>
                                    <div class="row">
                                      @if (File::exists(public_path("Images/Beneficiary/{$beneficiario->id}_1.jpg")))
                                    <div class="drop-zone col-md-4 ml-auto">
                                        <input type="file" name="foto1" class="drop-zone__input">
                                        <div class="drop-zone__thumb" data-label="{{$beneficiario->id}}_1.jpg" style="background-image:url('{{ asset("Images/Beneficiary/{$beneficiario->id}_1.jpg") }}');"></div>
                                      </div>
                                      @else
                                      <div class="drop-zone col-md-4 ml-auto">
                                        <span class="drop-zone__prompt">Imagen de Perfil</span>
                                        <input type="file" name="foto1" class="drop-zone__input">
                                      </div>
                                      @endif
                                      @if (File::exists(public_path("Images/Beneficiary/{$beneficiario->id}_2.jpg")))
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <input type="file" name="foto2" class="drop-zone__input" >
                                        <div class="drop-zone__thumb" data-label="{{$beneficiario->id}}_2.jpg" style="background-image:url('{{ asset("Images/Beneficiary/{$beneficiario->id}_2.jpg") }}');"></div>
                                      </div>
                                      @else
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 2</span>
                                        <input type="file" name="foto2" class="drop-zone__input">
                                      </div>
                                      @endif
                                      @if (File::exists(public_path("Images/Beneficiary/{$beneficiario->id}_3.jpg")))
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <input type="file" name="foto3" class="drop-zone__input" >
                                        <div class="drop-zone__thumb" data-label="{{$beneficiario->id}}_3.jpg" style="background-image:url('{{ asset("Images/Beneficiary/{$beneficiario->id}_3.jpg") }}');"></div>
                                      </div>
                                      @else
                                      <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 3</span>
                                        <input type="file" name="foto3" class="drop-zone__input">
                                      </div>
                                      @endif

                                      <!-- <div class="drop-zone col-md-3 ml-auto">
                                        <span class="drop-zone__prompt">Imagen Alternativa 1</span>
                                        <input type="file" name="myFile" class="drop-zone__input">
                                      </div> -->

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class=" btnsubmit btn btn-warning mt-4">{{ __('GUARDAR') }}</button>
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
                                        @if (File::exists(public_path("Images/Beneficiary/{$beneficiario->id}_1.jpg")))
                                        <img class="avatar border-gray" src="{{ asset("Images/Beneficiary/{$beneficiario->id}_1.jpg") }}" alt="...">
                                        @else
                                        <img class="avatar border-gray" src="{{ asset("img/MSC.png") }}" alt="...">
                                        @endif
                                        <h5 class="title">{{ $beneficiario->nombre }}</h5>
                                    </a>
                                    @php

                                    @endphp
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
                                @foreach($nichos as $nicho)
                                @if($nicho->id == $beneficiario->idNicho)
                                <center> <b>CODIGO QR<b>
                                    <?php
                                 $searchString = " ";
                                 $replaceString = "";
                                 $originalString = "{$nicho->coordenada}";
                                 $outputString = str_replace($searchString, $replaceString, $originalString);

                                  ?>
                                  <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/'.$outputString)) !!} ">
                                  <a class="btn btn-primary" href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate('http://www.mausoleosantaclara.com.mx/Informacion/Nicho/'.$outputString)) !!} " download="{{$nicho->coordenada}}.png"> Descargar </a>


                                </center>
                                @endif
                                @endforeach
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
        $('.selectdinamico').select2();
        //Validaciones segun el input


       const $input1 = document.querySelector('.datepicker1');
       const patron1 = /[0-9/AMP :]+/;
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
               $(".datepicker1").keyup(function(){
               var txtfechana = $(".datepicker1").val();

               var valfechana = /^([1-9]|0[1-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1]|[0-9])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])(:)([0-5][0-9])(\s)([AP][M])$/gm;
               if(valfechana.test(txtfechana)){
                                $("#spaninputfn").text("Correcto").css("color", "green");
                            $(".datepicker1").css({ "border":"1px solid #0C0"}).fadeIn(2000);
                            $(".btnsubmit").show();}
                            else{$("#spaninputfn").text("Registre una fecha valida").css("color", "red");
                            $(".datepicker1").css({ "border":"1px solid #C00"}).fadeIn(2000);
                            $(".btnsubmit").hide();}
            });
            $(".datepicker2").keyup(function(){
               var txtfechad = $(".datepicker2").val();
               var valfechad = /^([1-9]|0[1-9]|1[0-2])(\/|-)([0-2][0-9]|3[0-1]|[0-9])\2(\d{4})(\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])(:)([0-5][0-9])(\s)([AP][M])$/gm;
               if(valfechad.test(txtfechad)){
                                $("#spaninputfd").text("Correcto").css("color", "green");
                            $(".datepicker2").css({ "border":"1px solid #0C0"}).fadeIn(2000);
                            $(".btnsubmit").show();}
                            else{$("#spaninputfd").text("Registre una fecha valida").css("color", "red");
                            $(".datepicker2").css({ "border":"1px solid #C00"}).fadeIn(2000);
                            $(".btnsubmit").hide();}
            });

       const $input2 = document.querySelector('.datepicker2');
       const patron2 = /[0-9/AMP :]+/;
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
               const $input4 = document.querySelector('.nameb');
               const patron4 = /[A-Za-zñÑáéíóúýÁÉÍÓÚ Ý]+/;
       $input4.addEventListener("keydown", event => {
                   console.log(event.key);
                   if(patron4.test(event.key)){
                       $(".nameb").css({ "border": "1px solid #0C0"});
                   }
                   else{$(".nameb").css({ "border": "1px solid #C00"});
                       if(event.keyCode==8){ console.log("backspace"); }
                       else{ event.preventDefault();}
                   }
               });

            });
            $(".btnsubmit").click(function(e){
                e.preventDefault();
                var form = $(this).parents('form');
                Swal.fire({
                    title: 'Deseas guardar los cambios?',
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Guardar',
                    denyButtonText: `No guardar`,
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        Swal.fire('Guardado', '', 'success')
                        setTimeout(function(){
                            form.submit();
                        },3000);

                    } else if (result.isDenied) {
                        Swal.fire('Los cambios no han sido guardados', '', 'info')
                        setTimeout(function(){
                            location.reload();
                        },3000);
                    }
                    })
            });
</script>

@endpush
@endif
