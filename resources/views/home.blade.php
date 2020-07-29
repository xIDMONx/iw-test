@extends('layouts.app')

@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                    <div class="card-body">
                        <table class="table" id="usuarios">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Teléfono</th>
                                <th>Contraseña</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-success float-right" data-toggle="modal"
                                data-target="#modalAddUser">
                            Agregar Usuario
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modals-->
    <!--Nuevo Usuario-->
    <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Registrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!--DataTables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/r-2.2.5/datatables.min.js"></script>
    <!--JQuery Validation-->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
    <!--Notify JS-->
    <script src="{{ asset('js/notify.min.js') }}"></script>
    {{----}}
    <script src="{{ asset('js/listar.js') }}"></script>
@endsection
