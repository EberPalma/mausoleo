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
                              <b>{{$nichos}} Registros</b>  
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
                          <b>{{$huespedes}} Registros</b>  
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
                        <b>40 Formularios</b>
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
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Sign contract for "What are conference organizers afraid of?"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Lines From Great Russian Literature? Or E-mails From My Boss?') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit') }}
                                            </td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" checked>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Create 4 Invisible User Experiences you Never Knew About') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="">
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Read "Following makes Medium better"') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" disabled>
                                                        <span class="form-check-sign"></span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ __('Unfollow 5 enemies from twitter') }}</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
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
    <script type="text/javascript">
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();

            demo.showNotification();

        });
    </script>
@endpush