@extends('layouts.app')
@section('title', 'User')
@section('title-section','User')
@section('content')

<div class="container">
    <div class="row">
        <!-- Listar Usuarios -->
        <div class="col-md-10">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Listar Usuarios</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Nombre de Prueba</td>
                                    <td>Admin</td>
                                    <td>
                                        <button class="btn btn-primary">Mostrar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    <td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Nombre de Prueba</td>
                                    <td>Admin</td>
                                    <td>
                                        <button class="btn btn-primary">Mostrar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    <td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>Nombre de Prueba</td>
                                    <td>Admin</td>
                                    <td>
                                        <button class="btn btn-primary">Mostrar</button>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table><!-- .table table-hover -->
                    </div><!-- .table-responsive -->
                </div><!-- .panel-body -->
                <div class="panel-footer">
                </div><!-- .panel-footer -->
            </div><!-- .panel panel-default -->
        </div><!-- .col-md-12 -->
        <!-- Crear Usuario -->
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Crear Usuario</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">
                    <form method="post" class="form-horizontal">

                        <div class="form-group">
                            <label for="name" class="control-label col-md-4">Nombre:</label>
                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <label for="password" class="control-label col-md-4">Contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" name="password" class="form-control">
                            </div>
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <label for="repassword" class="control-label col-md-4">Repetir Contraseña:</label>
                            <div class="col-md-8">
                                <input type="password" name="repassword" class="form-control">
                            </div>
                        </div><!-- .form-group -->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-success">Guardar</button>
                                <button class="btn btn-primary">Limpiar</button>
                            </div>
                        </div><!-- .form-group -->

                    </form><!-- .form-horizontal -->
                </div><!-- .panel-body -->
                <div class="panel-footer">
                </div><!-- .panel-footer -->
            </div><!-- .panel panel-default -->
        </div><!-- .col-md-12 -->
    </div><!-- .row -->
</div><!-- .container -->



@endsection
