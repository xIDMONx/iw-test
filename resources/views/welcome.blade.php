<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    {{-- Titulo --}}
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/r-2.2.5/datatables.min.css"/>
    <!--Font Awesome-->
    <script src="https://use.fontawesome.com/e508771086.js"></script>
    <style type="text/css">
        #divLoading {
            display: none;
            }

        #divLoading.show {
            display: block;
            position: fixed;
            z-index: 9999;
            background: rgba(102, 102, 102, 0.5) url('{{ asset('img/loading.svg') }}') no-repeat center;
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
            }
    </style>
</head>
<body>
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-12">
            <a class="btn btn-info float-right" href="{{ route('login') }}">Login</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Usuarios
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered" id="usuarios" style="width: 100%">
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
<!-- Nuevo Usuario -->
<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('usuarios.store') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Usuario</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre"
                               aria-describedby="name">
                        <small id="name" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Apellido"
                               aria-describedby="last_name">
                        <small id="last_name" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="age">Edad</label>
                        <input type="text" name="age" id="age" class="form-control" placeholder="Edad"
                               aria-describedby="age">
                        <small id="age" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Correo"
                               aria-describedby="email">
                        <small id="email" class="text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Teléfono</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" placeholder="Teléfono"
                               aria-describedby="telephone">
                        <small id="telephone" class="text-muted">10 dígitos</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="add_user_submit">Registrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--Loading-->
<div id="divLoading"></div>
<!--Loading-->

<!--Bootstrap JS-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!--DataTables-->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/r-2.2.5/datatables.min.js"></script>
<!--JQuery Validation-->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/additional-methods.min.js"></script>
<!--Notify JS-->
<script src="{{ asset('js/notify.min.js') }}"></script>
{{----}}
<script src="{{ asset('js/listar.js') }}"></script>
</body>
</html>
