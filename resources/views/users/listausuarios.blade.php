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
                                <h3 class="mb-0">Users</h3>
                                <p class="text-sm mb-0">
                                    This is an example of user management. This is a minimal setup in order to get started fast.
                                </p>
                            </div>
                            <div class="col-4 text-right">
                                <a href="#" class="btn btn-sm btn-default">Add user</a>
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
                                <tr><th>Name</th>
                                <th>Email</th>
                                <th>Start</th>
                                <th>Actions</th>
                            </tr></thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Start</th>
                                    <th>Actions</th>
                                </tr>
                            </tfoot>
                            <tbody id="tableBody">
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
            This is a <b>PRO</b> feature!</span>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{ asset('js/userIndexTable.js') }}"></script>
@endpush