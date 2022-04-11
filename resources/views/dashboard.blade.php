@extends('index')

@section('Contenidoprincipal')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
               <div class="col-md-3">
                   <div class="card bg-warning">
                       <div class="card-header bg-warning" style="font-size: 25px; ">Nichos</div>
                       <div class="card-body">
                        <i class="fa fa-square fa-3x"></i>
                        </div>
                            <div class="card-footer">
                              <b id="countNichos"></b>
                            </div>

                   </div>
               </div>
               <div class="col">
                   <div class="card text-white bg-dark">
                       <div class="card-header text-white bg-dark" style="font-size: 25px;">Huespedes</div>
                       <div class="card-body">
                        <i class="fa fa-user fa-3x"></i>
                        </div>
                        <div class="card-footer">
                          <b id="countHuespedes"></b>
                        </div>

                   </div>


            </div>
            <div class="col">
                <div class="card bg-primary">
                    <div class="card-header bg-primary" style="font-size: 25px;">Formularios</div>
                    <div class="card-body">
                        <i class="fa fa-wpforms fa-3x"></i>
                    </div>
                    <div class="card-footer">
                        <b id="countContacto"></b>
                    </div>

                </div>

            </div>
            <div class="col">
                <div class="card bg-success">
                    <div class="card-header bg-success" style="font-size: 25px;">Codigos QR</div>
                    <div class="card-body">
                        <i class="fa fa-qrcode fa-3x"></i>
                    </div>


                        <div class="card-footer">
                            <b><?php
                                $total_imagenes = count(glob('Images/QrCode/{*.jpg,*.gif,*.png}',GLOB_BRACE));
                                echo $total_imagenes;

                                ?> Generados</b>
                        </div>
                    </div>


            </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Estadisticas Atención') }}</h4>
                            <p class="card-category">{{ __('Formularios de contacto') }}</p>
                        </div>
                        <div class="card-body ">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                            <hr>
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Informes') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Quejas') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Sugerencias') }}
                            </div>

                            <div class="stats">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card  card-tasks">
                        <div class="card-header ">
                            <h4 class="card-title">{{ __('Contacto') }}</h4>
                            <p class="card-category">{{ __('Formularios Recientes') }}</p>
                        </div>
                        <div class="card-body ">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody id="tableBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats">
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Ultimos 5 registros') }}

                            </div>
                        </div>
                    </div>
                </div>
            </div><input type="hidden" id="countInformes">
            <input type="hidden" id="countQuejas">
            <input type="hidden" id="countOtros">

        </div>
    </div>
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function() {

        let informes = axios.get("/api/informesdashboard").then((response) => {
            return response.data;
        });
        let quejas = axios.get("/api/quejasdashboard").then((response) => {
            return response.data;
        });
        let otros = axios.get("/api/otrosdashboard").then((response) => {
            return response.data;
        });
        function onDrawClick() {
        var x = document.getElementById("countInformes").value;
        var y = document.getElementById("countQuejas").value;
        var z = document.getElementById("countOtros").value;
        var chart = new Chartist.Pie('.ct-chart', {
            labels: ['Informes', 'Quejas', 'Sugerencias'],
                                series: [x, y,z],
                            }, {
                                showLabel: true
                            });
                        }
    $(document).ready(function(){
    //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
    setTimeout(onDrawClick, 5000);
  });


        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/dashboardContactoTable.js') }}"></script>
    <script src="{{ asset('js/dashboardCards.js') }}"></script>
    <script>
        </script>
@endpush
