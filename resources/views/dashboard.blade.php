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
                            <b>195 Generados</b>
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
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i> {{ __('Informes') }}
                                <i class="fa fa-circle text-danger"></i> {{ __('Otros') }}
                                <i class="fa fa-circle text-warning"></i> {{ __('Quejas') }}
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i> {{ __('Ultimo formulario hecho:') }}
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
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Updated 3 minutes ago') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/dashboardContactoTable.js') }}"></script>
    <script src="{{ asset('js/dashboardCards.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            console.log(localStorage.nichos);
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush