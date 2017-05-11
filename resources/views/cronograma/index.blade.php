@extends('layouts.app')
@section('title', 'Cronogama')
@section('title-section','Cronogama')
@section('content')

<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Buscar</h3>
            </div><!-- .panel-heading -->
            <div class="panel-body">
                <div class="col-md-12">
                    <form class="form-inline">
                        <label for="" class="control-label">Desde:</label>
                        <input class="form-control" type="date" name="" value="{{ $now->toDateString() }}">
                        <label for="" class="control-label">Hasta:</label>
                        <input class="form-control" type="date" name="" value="{{ $now->toDateString() }}">
                        <button  class="btn btn-primary" type="button" name="button"><i class="fa fa-search"></i></button>
                    </form><!-- .form-inline -->
                </div><!-- .col-md-12 -->
            </div><!-- .panel-body -->
        </div><!-- .panel panel-primary -->

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Cronogramas de Eventos</h3>
            </div><!-- .panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <td>
                                    Codigo de Presupuesto
                                </td>
                                <td>
                                    Fecha de Evento
                                </td>
                                <td>
                                    Nombre de Evento
                                </td>
                                <td>
                                    Hora de Evento
                                </td>
                                <td>
                                    Salon / Área
                                </td>
                                <td>
                                    Cliente
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td>02/02/2017</td>
                                <td>Educativo</td>
                                <td>04:00 PM</td>
                                <td>Julia</td>
                                <td>Carmen Segovia</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>02/02/2017</td>
                                <td>Educativo</td>
                                <td>04:00 PM</td>
                                <td>Julia</td>
                                <td>Carmen Segovia</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>02/02/2017</td>
                                <td>Educativo</td>
                                <td>04:00 PM</td>
                                <td>Julia</td>
                                <td>Carmen Segovia</td>
                            </tr>
                        </tbody>
                    </table><!-- .table table-hover table-bordered -->
                </div><!-- .table-responsive -->
                <div class="pull-right">
                    <button class="btn btn-success btn-lg" type="button" name="button"><i class="fa fa-print"></i></button>
                </div>
            </div><!-- .panel-body -->
        </div><!-- .panel panel-primary -->
    </div><!-- .row -->
</div><!-- .container -->

@endsection
