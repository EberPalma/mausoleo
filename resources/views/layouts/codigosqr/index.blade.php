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
                                <table id="qrtable" class="table table-hover table-striped">
                                    <thead>
                                        <th>#</th>
                                        <th>Coordenada</th>
                                        <th>Familia</th>
                                        <th>Huespedes</th>
                                        <th>Codigo QR</th>

                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach ($codigos as $c)
                                        <tr>
                                            <th> <?php echo $i;?> </th>
                                            <td> {{$c->coordenada}} </td>
                                            <td> {{$c->familia}}</td>
                                            <td><?php $difuntos = $c->difuntos ?>
                                                @foreach ($difuntos as $d )
                                                {{$d->nombre}}<br>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a class="btn btn-primary" href="descargar/qr/{{$c->id}}" target="_blank"> Descargar </a></td>
                                            </td>

                                        </tr>
                                        <?php $i++;?>
                                        @endforeach
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
</div>
@endsection

@push('js')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
    $(document).ready( function () {
    $('#qrtable').DataTable({
        "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "Término de búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    },
    });
} );
</script>
@endpush
@endif
