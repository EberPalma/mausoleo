@extends('index') 
@section('Contenidoprincipal')
 <style>
     table{
    table-layout: fixed;
    
}


</style>  
@if(!isset(Auth::user()->name))
    <meta http-equiv="refresh" content="0; url={{ route('login') }}">
@else 

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card data-tables">

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Nichos</h3>
                                <p class="text-sm mb-0">
                                   Gestor de nichos
                                </p>
                            </div>
                            
                        </div>
                    </div><br>
                    <div class="container">
                    <div class="row">
                       <div class="col-md-2">
                           <b>Nicho:</b>
                       </div> 
                       <div class="col-md-4">
                           <input type="text" class="form-control">
                       </div>
                       <div class="col-md-2">
                           <a class="btn" id="btnBuscar">Buscar</a>
                       </div> 
                       <div class="col-md-2">
                        <a class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar </a>
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
                                        <th>Coordenada</th>
                                        <th>Tamaño</th>
                                        <th>Familia</th>
                                        <th>Difuntos</th>
                                        <th>Resultado de busqueda</th>
                                    </thead>
                                    <tbody id="">
                                        <th>A 1</th>
                                        <th>4</th>
                                        <th>Villaseñor Userralde</th>
                                        <th>Guillermina Gordillo Serna</th>
                                        <th>
                                        <button type="button" rel="tooltip" title="Editar" class="btn btn-info">
                                        <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" rel="tooltip" id="" title="Eliminar" class="btn btn-danger">
                                        <i class="fa fa-times"></i>
                                        </button></th>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats container">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> <i class="now-ui-icons loader_refresh spin"></i> {{ __('VER REGISTROS ELIMINADOS') }}
                            
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
            El administrador es el unico que puede <b>Borrar y Editar</b> nichos.</span>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush
@endif