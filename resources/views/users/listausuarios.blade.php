@extends('index') 
@section('Contenidoprincipal')
    

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
                                <tr>
                                    <th>Usuario</th>
                                    <th>Nombre</th>
                                    <th>A.Paterno</th>
                                    <th>A.Materno</th>
                                    <th>Rol</th>
                                    <th>Email</th>
                                    <th>Ultima Entrada</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            
                                                                        <tr>
                                        <td>Admin Admin</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>admin@lightbp.com</td>
                                        <td>2020-02-25 12:37:04</td>
                                        <td class="d-flex justify-content-end">
                                                
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                
                                                <label class="btn btn-sm btn-secondary">
                                                  <a href="#" type="radio" name="options" > <i class="fa fa-edit"></i> Editar </a>
                                                </label>
                                                <label class="btn btn-sm btn-danger">
                                                  <a href="#" type="radio" name="options"> <i class="fa fa-trash"></i> Borrar</a>
                                                </label>
                                              </div>
                                                                                        </td>
                                    </tr>
                                                                </tbody>
                        </table>
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