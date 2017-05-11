@extends('layouts.app')
@section('title', 'Disponibilidad')
@section('title-section','Disponibilidad')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Buscar</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">
                    <!-- BUSCAR START -->
                    <form class="form-inline">
                        <div class="form-group">
                            <label for="" class="control-label">Desde:</label>
                            <input class="form-control" type="date" name="" value="{{ $now->toDateString() }}">
                            <label for="" class="control-label">Hasta:</label>
                            <input class="form-control" type="date" name="" value="{{ $now->toDateString() }}">
                            <button class="btn btn-primary" type="button" name="button"><i class="fa fa-search"></i></button>
                        </div>
                    </form><!-- .form-inline -->
                    <!-- BUSCAR END -->
                </div><!-- .panel-body -->
            </div><!-- .panel panel-primary -->
        </div><!-- .col-md-12 -->

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Salones / Áreas Disponibles</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Lunes / Días:1</th>
                                    <th>Martes / Días:2</th>
                                    <th>miercoles / Días:3</th>
                                    <th>Jueves / Días:4</th>
                                    <th>Viernes / Días:5</th>
                                    <th>Sabado / Días:6</th>
                                    <th>Domingo / Días:7</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                    <td>
                                        <p>Salon A</p>
                                        <p>Salon B</p>
                                        <p>Salon C</p>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- .panel-body -->
                <div class="panel-footer"></div>
            </div><!-- .panel panel-info -->
        </div><!-- .col-md-12 -->

        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Salones / Áreas Ocupados</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Salones / Áreas</th>
                                    <th>Fecha</th>
                                    <th>Hora</th>
                                    <th>Cliente</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        Salon A
                                    </td>
                                    <td>
                                        06/02/2017
                                    </td>
                                    <td>
                                        06:00 PM
                                    </td>
                                    <td>
                                        Jonathan Duran
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- .panel-body -->
                <div class="panel-footer"></div>
            </div><!-- .panel panel-info -->
        </div><!-- .col-md-12 -->

    </div><!-- .row -->
</div><!-- .container -->

@endsection
