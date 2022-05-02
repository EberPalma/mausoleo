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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                <h3 class="mb-0">Promociones</h3>
                                <p class="text-sm mb-0">
                                   Gestor de Promociones
                                </p>

                            </div>
                            <a href="/promociones.create" style="float: right" class="btn btn-warning"> Agregar Promoción</a>

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
                                        <th>Titulo</th>
                                        <th>Descripcion</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                        <th>Imagen</th>
                                    </thead>

                                    <tbody>
                                        <?php $i=1;?>
                                        @foreach ($productos as $producto)
                                        <th><?php echo $i;?></th>
                                        <td>{{$producto->nombre}}</td>
                                        <td>{{$producto->description}}</td>
                                        <td><b>$</b>{{$producto->precio}}</td>
                                        <td><a  class="btn btn-primary" href="">Editar</a><a  class="btn btn-danger" href="">Borrar</a></td>
                                        <td><img style="max-width: 100%;
                                            border: 1px solid red;
                                            width: 100%;
                                            height: 200px; " src="Images/Beneficiary/Promociones/{{$producto->id}}.jpg" alt=""></td>

                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer ">
                            <hr>

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
