@extends('index') 
@section('Contenidoprincipal')

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
                                <h3 class="mb-0">Usuarios</h3>
                                <p class="text-sm mb-0">
                                   Gestor de usuarios
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-default">Agregar usuario</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-2">
                                                                            </div>

                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>A.Paterno</th>
                                <th>A.Materno</th>
                                <th>Rol</th>
                                <th>Email</th>
                                <th>Ultima Entrada</th>
                                <th>Acciones</th>
                            </tr></thead>
                            <tfoot>
                                
                            </tfoot>
                            <tbody id="tableBody"></tbody>

                        </table>
                    </div><div class="stats container" style="margin-left:30px">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1"> <i class="now-ui-icons loader_refresh spin"></i> {{ __('VER REGISTROS ELIMINADOS') }}
                    
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
@endif

@endsection

@push('js')
<script src="{{ asset('js/axios.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/userIndexTable.js') }}"></script>
@endpush