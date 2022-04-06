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
                           <input type="text" id="input-filtro" class="form-control">
                       </div>
                       <div class="col-md-2">
                           <a class="btn" id="btnBuscar">Buscar</a>
                       </div>
                       <div class="col-md-2">
                        <a href="{{ route('nicho.añadir') }}" class="btn btn-warning"><i class="fa fa-plus-circle"></i> Agregar </a>
                    </div>
                    </div>
                </div>


                    <div class="col-12 mt-2">
                                                                            </div>

                    <div class="toolbar">
                        <!--        Here you can write extra buttons/actions for the toolbar              -->
                    </div>
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
                                    <tbody id="tableBody">

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
<script src="{{ asset('js/axios.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', ()=>{
        axios.get('/api/nichosindex/1')
            .then((response)=>{
                loadTable(response);
            });
        document.querySelector('#btnBuscar').addEventListener('click', (e)=>{
            e.preventDefault();
            let inputFiltro = document.querySelector("#input-filtro");
            if(inputFiltro.value == ""){
                alert('Ingresa un termino de busqueda');
            }else{
                axios.get('/api/nichosfiltro/'+inputFiltro.value)
                    .then((response)=>{
                        loadTable(response);
                    });
            }
        });
        let showAllCheckbox = document.querySelector('#defaultCheck1');
        showAllCheckbox.addEventListener("change", () => {
            if(showAllCheckbox.checked){
                axios.get('/api/nichosindex/0')
                    .then((response)=>{
                        loadTable(response);
                    });
            }else{
                axios.get('/api/nichosindex/1')
                    .then((response)=>{
                            loadTable(response);
                    });
            }
        });
    });

    function loadTable(response){
        let tabla = document.querySelector("#tableBody");
        tabla.innerHTML = "";
        let data = response.data;
        data.forEach((e)=>{
            let coordenada = `<th>${e.coordenada}</th>`;
            let tamanio = `<th>${e.capacidad}</th>`;
            let familia = e.familia ==null ? '<th style="color:green;">Disponible</th>' : `<th>${e.familia}</th>`;
            let difuntos = `<th id="difuntosRow${e.id}">`;
            e.difuntos.forEach((e)=>{
                difuntos = difuntos + `<span><a href="../difunto.editar/${e.id}">-${e.nombre}</a></span></br>`
            });
            difuntos = difuntos + '</th>';
            let botones = e.activo == 1 ? `<th>
                                <a type="button" href="/nicho.editar/${ e.id }" rel="tooltip" title="Editar" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" rel="tooltip" id="delete${e.id}" title="Eliminar" class="btn btn-danger">
                                    <i class="fa fa-times"></i>
                                </button>
                            </th>`: `<th>
                                <a type="button" href="/nicho.editar/${ e.id }" rel="tooltip" title="Editar" class="btn btn-info">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button type="button" rel="tooltip" id="delete${e.id}" title="Eliminar" class="btn btn-warning">
                                    Restaurar
                                </button>
                            </th>`;
            let tableRow = document.createElement("tr");
            tableRow.innerHTML = "<tr>" +coordenada + tamanio + familia +difuntos + botones + "</tr>";
            tabla.appendChild(tableRow);
            document
                .querySelector("#delete" + e.id)
                .addEventListener("click", () => {
                    if(document.querySelector(`#difuntosRow${e.id}`).innerHTML == ""){
                        Swal.fire({
                            title: 'Estas por eliminar este nicho',
                            text: "Estas seguro?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Si, borralo'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire(
                                'Borrado',
                                'El nicho se ha eliminado.',
                                'success'
                                )
                                axios.get("/api/nichosdelete/" + e.id);
                                tabla.removeChild(tableRow);
                            }
                        });
                    }else{
                        Swal.fire({
                            title: "Este registro no se puede eliminar",
                            text: "Elimina primero los difuntos de este nicho para continuar",
                            icon: "warning",
                            confirmButtonText: "ok"
                        });
                    }
                });
        });
    }
</script>
@endpush
@endif
