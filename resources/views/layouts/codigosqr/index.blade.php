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
                                <h3 class="mb-0">Contacto</h3>
                                <p class="text-sm mb-0">
                                   Gestor de Codigos QR
                                </p>
                            </div>

                        </div>
                    </div><br>
                    <div class="container">
                    <div class="row">


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
                                        <th>Familia</th>
                                        <th>Huespedes</th>
                                        <th>Codigo QR</th>
                                        <th>Descargar</th>
                                    </thead>
                                    <tbody id="tableBody"></tbody>
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
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
{{-- <script src="{{ asset('js/contactoIndexTable.js') }}"></script> --}}
@endpush
@endif
