@extends('index') 
@section('Contenidoprincipal')
 <style>
     table{
    table-layout: fixed;
    
}


</style>   

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card data-tables">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Contacto</h3>
                                <p class="text-sm mb-0">
                                   Gestor de formularios de contacto
                                </p>
                            </div>
                            
                        </div>
                    </div><br>
                    <div class="container">
                    <div class="row">
                       <div class="col-md-4">
                           <b>Estado de la solicitud:</b>
                       </div> 
                       <div class="col-md-4">
                           <select class="form-control" name="" id="">
                               <option value="">Sin atender</option>
                               <option value="">Atendidas</option>
                               <option value="">Todas</option>
                           </select>
                       </div>
                       <div class="col-md-4">
                           <a class="btn">Buscar</a>
                       </div>  
                    </div>
                </div>
                

                    <div class="col-12 mt-2">
                                                                            </div>

                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="card  card-tasks">
                        
                            <div class="card-body table-full-width table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Atendida</th>
                                        <th style="width:250px">Mensaje</th>
                                        <th>Asunto</th>
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Email</th>
                                        <th style="width:100px">Fecha de registro</th>
                                        <th >Acciones</th>
                                    </thead>
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
                                            <td style="width:250px"><small>{{ __('Buen dia por este medio deseo contactarme con ustedes para hacer entrega de nuestra carta de presentación sobre nuestro servicio de proteccion patrimonial y su logistica') }}</small></td>
                                            <td><small>{{ __('Sugerencias') }}</td>
                                            <td><small>{{ __('Central de Alarmas y Monitoreo de México SA DE CV') }}</small></td>
                                            <td><small>{{ __('7222105999') }}</small></td>
                                            <td><small>{{ __('nestor.salazar@calmo.com.mx') }}</small></td>
                                            <td><small>
                                                {{ __('06/01/2022 03:07:52 p. m.') }}</small>
                                            </td>
                                            <td class="td-actions text-right" class="d-flex align-items-center; width:100px;">
                                                <button type="button" rel="tooltip" title="Mandar mensaje" class="btn btn-success">
                                                    <i class="fa fa-whatsapp"></i>
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
                                <i class="now-ui-icons loader_refresh spin"></i> {{ __('Actualizado hace ') }}
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>
            El administrador es el unico que puede <b>Borrar y Editar</b> usuarios.</span>
        </div>
    </div>
</div>
@endsection