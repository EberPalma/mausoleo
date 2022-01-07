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
                           <select class="form-control" name="" id="filtroStatus">
                               <option value="sinatender">Sin atender</option>
                               <option value="atendidas">Atendidas</option>
                               <option value="todas">Todas</option>
                           </select>
                       </div>
                       <div class="col-md-4">
                           <a class="btn" id="btnBuscar">Buscar</a>
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
                                    <tbody id="tableBody"></tbody>
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

@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/contactoIndexTable.js') }}"></script>
@endpush