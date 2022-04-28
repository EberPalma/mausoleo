@extends('index')
@section('Contenidoprincipal')
<style>
    @media screen and (max-width: 320px){
        table {
            display:block;
            overflow-x: auto;
        }
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
                                <h3 class="mb-0">Condolencias</h3>
                                <p class="text-sm mb-0">
                                   Gestor de verificación de condolencias
                                </p>
                            </div>

                        </div>
                    </div><br>
                    <div class="container">
                    <div class="row">
                       <div class="col-md-4">
                           <b>Estado de la condolencia:</b>
                       </div>
                       <div class="col-md-4">
                           <select class="form-control" name="" id="filtroStatus">
                               <option value="sinverificar">Sin verificar</option>
                               <option value="verificadas">Verificado</option>
                               <option value="todas">Todas</option>
                           </select>
                       </div>
                       <div class="col-md-4">
                           <a class="btn" id="btnBuscar">Buscar</a>
                       </div>
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
                                        <th>Aceptar</th>
                                        <th>Huesped</th>
                                        <th>Mensaje</th>
                                        <th>Nombre</th>
                                        <th>Email (Remitente)</th>
                                        <th>Email (Destinatario)</th>
                                        <th>Acciones</th>
                                        <th>Fecha</th>
                                    </thead>
                                    <tbody id="tableBody"></tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>
                            <div class="stats container">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" checked> <i class="now-ui-icons loader_refresh spin"></i> {{ __('VER REGISTROS ACTIVOS') }}

                        </div>
                    </div>

            </div>
        </div>
        <div class="alert alert-danger">
            <button type="button" aria-hidden="true" class="close" data-dismiss="alert">
                <i class="nc-icon nc-simple-remove"></i>
            </button>
            <span>
            El administrador es el unico que puede <b>Borrar</b> condolencias.</span>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/condolenciaIndexTable.js') }}"></script>
@endpush
@endif
