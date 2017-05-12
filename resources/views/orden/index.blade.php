@extends('layouts.app')
@section('title', 'Generar Orden de Servicio')
@section('title-section','Generar Orden de Servicio')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4">
            <p><strong>N° de Presupuesto:</strong>5</p>
        </div><!-- .col-md-4 -->
        <div class="col-md-4">
            <p><strong>Fecha:</strong>{{ $now->toDateString() }}</p>
        </div><!-- .col-md-4 -->
        <div class="col-md-4">
            <p><strong>N° Orden:</strong>2</p>
        </div><!-- .col-md-4 -->
    </div><!-- .row -->

    <div class="row">
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Orden Servicio</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">
                    <div class="col-md-3">
                        <p><strong>Cliente:</strong> Jonathan Duran</p>
                        <p><strong>Teléfono:</strong> 0416-4806889</p>
                        <hr>
                    </div><!-- .col-md-3 -->
                    <div class="col-md-3">
                        <p><strong>Evento:</strong> Educativo</p>
                        <p><strong>Salón/Área:</strong> Alemana</p>
                        <hr>
                    </div><!-- .col-md-3 -->
                    <div class="col-md-3">
                        <p><strong>Fecha Evento:</strong> {{ $now->toDateString() }}</p>
                        <p><strong>Hora:</strong> 07:00 PM</p>
                        <hr>
                    </div><!-- .col-md-3 -->
                    <div class="col-md-3">
                        <p><strong>Hasta:</strong> {{ $now->toDateString() }}</p>
                        <p><strong>N° Pax:</strong> 1000</p>
                        <hr>
                    </div><!-- .col-md-3 -->

                    <div class="col-md-6">
                        <p><strong>Alimentos/Bebidas</strong></p>
                        <ul class="list-group">
                            <li class="list-group-item">Alimento1 - 10:00 AM</li>
                            <li class="list-group-item">Alimento2 - 10:00 AM</li>
                            <li class="list-group-item">Alimento3 - 10:00 AM</li>
                            <li class="list-group-item">Alimento4 - 10:00 AM</li>
                            <li class="list-group-item">Alimento5 - 10:00 AM</li>
                        </ul>
                    </div><!-- .col-md-6 -->
                    <div class="col-md-6">
                        <p><strong>Equipos/Materiales:</strong></p>
                        <ul class="list-group">
                            <li class="list-group-item">Equipo1 - 10:00 AM</li>
                            <li class="list-group-item">Equipo2 - 10:00 AM</li>
                            <li class="list-group-item">Equipo3 - 10:00 AM</li>
                        </ul>
                        <p><strong>Otros Servicios:</strong></p>
                        <ul class="list-group">
                            <li class="list-group-item">Otros Servicios1 - 10:00 AM</li>
                            <li class="list-group-item">Otros Servicios2 - 10:00 AM</li>
                            <li class="list-group-item">Otros Servicios3 - 10:00 AM</li>
                        </ul>
                        <p><strong>Habitaciones:</strong></p>
                        <ul class="list-group">
                            <li class="list-group-item">Habitación1 - 10:00 AM</li>
                            <li class="list-group-item">Habitación2 - 10:00 AM</li>
                            <li class="list-group-item">Habitación3 - 10:00 AM</li>
                        </ul>
                    </div><!-- .col-md-6 -->
                </div><!-- .panel-body -->
                <div class="panel-footer"></div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Observaciones</h3>
                    </div><!-- .panel-heading -->
                    <div class="panel-body">
                        <div class="col-md-4">
                            <p><strong>Concina Principal/Pastelería</strong></p>
                            <p class="well text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec dolor eget enim feugiat fringilla. Maecenas commodo mollis pretium. </p>
                            <p><strong>Coordinador de A/B</strong></p>
                            <p class="well text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec dolor eget enim feugiat fringilla. Maecenas commodo mollis pretium. </p>
                        </div><!-- .col-md-4 -->
                        <div class="col-md-4">
                            <p><strong>Restaurante Zalacain</strong></p>
                            <p class="well text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec dolor eget enim feugiat fringilla. Maecenas commodo mollis pretium. </p>
                            <p><strong>Mayordomia</strong></p>
                            <p class="well text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec dolor eget enim feugiat fringilla. Maecenas commodo mollis pretium. </p>
                        </div><!-- .col-md-4 -->
                        <div class="col-md-4">
                            <p><strong>Eventos Cristina</strong></p>
                            <p class="well text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec dolor eget enim feugiat fringilla. Maecenas commodo mollis pretium. </p>
                            <p><strong>Recepción/Botones/Reservas</strong></p>
                            <p class="well text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec dolor eget enim feugiat fringilla. Maecenas commodo mollis pretium. </p>
                        </div><!-- .col-md-4 -->
                    </div><!-- .panel-body -->
                </div><!-- .panel panel-info -->
            </div><!-- .panel panel-primary -->
        </div><!-- .col-md-10 -->
        <div class="col-md-2">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <button class="btn btn-primary  btn-lg" type="button" name="button1" data-toggle="modal" data-target="#buscarPresupuesto"><i class="fa fa-search"></i></button>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg" type="button" name="button2"><i class="fa fa-save"></i></button>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg" type="button" name="button3"><i class="fa fa-print"></i></button>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg" type="button" name="button4"><i class="fa fa-times"></i></button>
                    <br>
                </div>
            </div>
        </div><!-- .col-md-2 -->

    </div><!-- .row -->
    <!-- MODAL START -->
    <div class="modal fade" role="dialog" id="buscarPresupuesto">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Consultar Presupuesto</h4>
              </div>
              <div class="modal-body">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Buscar</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-inline">
                            <div class="form-group">
                                <label for="" class="control-label">Código:</label>
                                <input class="form-control" type="text" name="" value="">
                                <button class="btn btn-success" type="button" name="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <td>Código</td>
                                <td>Fecha de Emisión</td>
                                <td>Total General</td>
                                <td>Cliente</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>15</td>
                                <td>04/02/2017</td>
                                <td>10.000</td>
                                <td>Jonathan Duran</td>
                                <td>
                                    <button class="btn btn-success" type="button" name="button">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
              </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- MODAL END -->
</div><!-- .container -->

@endsection
