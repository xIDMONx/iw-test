@extends('layouts.app')

@section('styles')
    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/r-2.2.5/datatables.min.css"/>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Películas Favoritas</div>
                    <div class="card-body">
                        <table class="table" id="movies">
                            <thead>
                            <tr>
                                <th style="width: 20%">Nombre de Película</th>
                                <th style="width: 20%">Género</th>
                                <th style="width: 20%">Fecha Estreno</th>
                                <th style="width: 20%">Descripción</th>
                                <th style="width: 20%">Acciones</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMovie">
                            Agregar Pelicula
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modals-->
    <!-- Película -->
    <div class="modal fade" id="addMovie" tabindex="-1" role="dialog" aria-labelledby="modalAddMovie"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('movies.store', ['id' => Auth::user()->id]) }}" method="post">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Nueva Película</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Película</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Pelicula"
                                   aria-describedby="name">
                            <small id="name" class="text-muted">Nombre</small>
                        </div>
                        <div class="form-group">
                            <label for="gender">Género</label>
                            <select name="gender" id="gender" class="form-control" aria-describedby="gender">
                                <option value="" selected>Seleccione un género</option>
                                <option value="Películas actuales">Películas actuales</option>
                                <option value="Películas antiguas">Películas antiguas</option>
                                <option value="Estrenos">Estrenos</option>
                                <option value="Clásicos">Clásicos</option>
                                <option value="Mudas">Mudas</option>
                                <option value="Sonoras">Sonoras</option>
                                <option value="Películas en blanco y negro">Películas en blanco y negro</option>
                                <option value="Películas en color">Películas en color</option>
                                <option value="De acción">De acción</option>
                                <option value="De aventuras">De aventuras</option>
                                <option value="Comedias">Comedias</option>
                                <option value="Dramáticas">Dramáticas</option>
                                <option value="De terror">De terror</option>
                                <option value="Musicales">Musicales</option>
                                <option value="Ciencia ficción">Ciencia ficción</option>
                                <option value="De guerra o bélicas">De guerra o bélicas</option>
                                <option value="Películas del Oeste">Películas del Oeste</option>
                                <option value="Crimen (Suspense)">Crimen (Suspense)</option>
                                <option value="Infantiles">Infantiles</option>
                                <option value="Adultos">Adultos</option>
                            </select>
                            <small id="gender" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="premiere_date">Fecha Estreno</label>
                            <input type="text" name="premiere_date" id="premiere_date" class="form-control"
                                   placeholder="Fecha Estreno"
                                   aria-describedby="premiere_date">
                            <small id="premiere_date" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control"
                                   placeholder="Descripcion"
                                   aria-describedby="descripcion">
                            <small id="descripcion" class="text-muted"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="add_movie_submit">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Película Editar -->
    <div class="modal fade" id="modalEditMovie" tabindex="-1" role="dialog" aria-labelledby="editMovie"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ route('movies.update', ['movie' => '']) }}" method="put">
                    @csrf
                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title">Editar Película</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Película</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Pelicula"
                                   aria-describedby="name">
                            <small id="name" class="text-muted">Nombre</small>
                        </div>
                        <div class="form-group">
                            <label for="gender">Género</label>
                            <select name="gender" id="gender" class="form-control" aria-describedby="gender">
                                <option value="" selected>Seleccione un género</option>
                                <option value="Películas actuales">Películas actuales</option>
                                <option value="Películas antiguas">Películas antiguas</option>
                                <option value="Estrenos">Estrenos</option>
                                <option value="Clásicos">Clásicos</option>
                                <option value="Mudas">Mudas</option>
                                <option value="Sonoras">Sonoras</option>
                                <option value="Películas en blanco y negro">Películas en blanco y negro</option>
                                <option value="Películas en color">Películas en color</option>
                                <option value="De acción">De acción</option>
                                <option value="De aventuras">De aventuras</option>
                                <option value="Comedias">Comedias</option>
                                <option value="Dramáticas">Dramáticas</option>
                                <option value="De terror">De terror</option>
                                <option value="Musicales">Musicales</option>
                                <option value="Ciencia ficción">Ciencia ficción</option>
                                <option value="De guerra o bélicas">De guerra o bélicas</option>
                                <option value="Películas del Oeste">Películas del Oeste</option>
                                <option value="Crimen (Suspense)">Crimen (Suspense)</option>
                                <option value="Infantiles">Infantiles</option>
                                <option value="Adultos">Adultos</option>
                            </select>
                            <small id="gender" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="premiere_date">Fecha Estreno</label>
                            <input type="text" name="premiere_date" id="premiere_date" class="form-control"
                                   placeholder="Fecha Estreno"
                                   aria-describedby="premiere_date">
                            <small id="premiere_date" class="text-muted"></small>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control"
                                   placeholder="Descripcion"
                                   aria-describedby="descripcion">
                            <small id="descripcion" class="text-muted"></small>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary" id="edit_movie_submit">Salvar</button>
                    </div>
                </form>
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
    <script type="text/javascript">
        id = {{ Auth::user()->id }};
    </script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
@endsection
