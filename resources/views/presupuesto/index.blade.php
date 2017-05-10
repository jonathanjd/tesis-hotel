@extends('layouts.app')
@section('title', 'Presupuesto')
@section('title-section','Gestionar Presupuesto')
@section('content')

<div class="container">
    <div class="row well">

        <!-- *** INFO CLIENTE START *** -->
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Cliente</h3>
                </div><!-- .panel-heading -->
              <div class="panel-body">
                  <div class="col-md-6">
                      <div class="buscarCliente">
                          <form class="form-horizontal">
                              <div class="form-group">
                                  <label for="" class="control-label col-md-4">Cedula/Rif:</label>
                                  <div class="col-md-6">
                                      <input type="text" name="" value="" class="form-control">
                                  </div>
                                  <div class="col-md-2">
                                      <button type="button" name="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                  </div>
                              </div>
                          </form>
                      </div>
                      <div class="infoCliente">
                          <form class="form-horizontal">
                              <div class="form-group">
                                  <label for="" class="control-label col-md-4">Codigo:</label>
                                  <div class="col-md-8">
                                      <input type="text" name="" value="" class="form-control">
                                  </div><!-- .col-md-8 -->
                              </div><!-- .form-group -->
                              <div class="form-group">
                                  <label for="" class="control-label col-md-4">Teléfono:</label>
                                  <div class="col-md-8">
                                      <input type="text" name="" value="" class="form-control">
                                  </div><!-- .col-md-8 -->
                              </div><!-- .form-group -->
                              <div class="form-group">
                                  <label for="" class="control-label col-md-4">Fax:</label>
                                  <div class="col-md-8">
                                      <input type="text" name="" value="" class="form-control">
                                  </div><!-- .col-md-8 -->
                              </div><!-- .form-group -->
                          </form>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="infoClienteExtra">
                          <form class="form-horizontal">
                              <div class="panel panel-default">
                                  <div class="panel-heading">
                                      <h3 class="panel-title">Contacto Principal</h3>
                                  </div>
                                  <div class="panel-body">
                                      <div class="form-group">
                                          <label for="" class="control-label col-md-4">Nombre:</label>
                                          <div class="col-md-8">
                                              <input type="text" name="" value="" class="form-control">
                                          </div><!-- .col-md-8 -->
                                      </div><!-- .form-group -->
                                      <div class="form-group">
                                          <label for="" class="control-label col-md-4">Cargo</label>
                                          <div class="col-md-8">
                                              <input type="text" name="" value="" class="form-control">
                                          </div><!-- .col-md-8 -->
                                      </div><!-- .form-group -->
                                      <div class="form-group">
                                          <label for="" class="control-label col-md-4">Teléfono:</label>
                                          <div class="col-md-8">
                                              <input type="text" name="" value="" class="form-control">
                                          </div><!-- .col-md-8 -->
                                      </div><!-- .form-group -->
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div><!-- .panel-body -->
          </div><!-- .panel panel-default -->
        </div><!-- .col-md-8 -->
        <!-- *** INFO CLIENTE END *** -->

        <!-- *** CODIGO DE PRESUPUESTO START *** -->
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">SIGAEH</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Codigo de Presupuesto:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" name="" value="">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Fecha de Emisión:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="date" name="" value="{{ $now->toDateString() }}">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Fecha de Confirmación:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="date" name="" value="{{ $now->toDateString() }}">
                            </div>
                        </div><!-- .form-group -->
                    </form><!-- .form-horizontal -->
                </div>
            </div><!-- .panel panel-primary -->
        </div><!-- .col-md-4 -->
        <!-- *** CODIGO DE PRESUPUESTO END *** -->

        <!-- *** EVENTO START *** -->
        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Evento</h3>
                </div><!-- .panel-heading -->
                <div class="panel-body">

                    <div>
                        <form class="form-horizontal">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Tipo:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="" value="">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Salón:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="" value="">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Hora:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="" value="">
                                    </div>
                                </div><!-- .form-group -->
                            </div><!-- .col-md-6 -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Montaje:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="" value="">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">N° Pax:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="" value="">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Comentario:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" name="" value="">
                                    </div>
                                </div><!-- .form-group -->
                            </div><!-- .col-md-6 -->

                            <div class="col-md-12">
                                <p class="text-center"><strong>Fecha</strong></p>
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Desde:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="Date" name="" value="{{ $now->toDateString() }}">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <label for="" class="control-label col-md-4">Hasta:</label>
                                    <div class="col-md-8">
                                        <input class="form-control" type="Date" name="" value="{{ $now->toDateString() }}">
                                    </div>
                                </div><!-- .form-group -->
                            </div><!-- .col-md-12 -->
                        </form><!-- .form-horizontal -->
                    </div>

                </div><!-- .panel-body -->
            </div><!-- .panel panel-info -->
        </div><!-- .col-md-8 -->
        <!-- *** EVENTO END *** -->

        <!-- *** TOTAL START *** -->
        <div class="col-md-4">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Total</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Sub Total:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" name="" value="">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Iva 12%:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" name="" value="">
                            </div>
                        </div><!-- .form-group -->
                        <div class="form-group">
                            <label for="" class="control-label col-md-5">Total General:</label>
                            <div class="col-md-7">
                                <input class="form-control" type="text" name="" value="">
                            </div>
                        </div><!-- .form-group -->
                    </form>
                </div>
            </div>
        </div><!-- .col-md-4 -->
        <!-- *** TOTAL END *** -->

        <!-- ACCIONES START -->
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-body text-center">
                    <button class="btn btn-primary"><i class="fa fa-shopping-basket"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-folder-open"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-home"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-trash"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-home"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-check"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-print"></i></button>
                    <button class="btn btn-primary"><i class="fa fa-close"></i></button>
                </div><!-- panel-body -->
            </div><!-- panel panel-primary -->
        </div><!-- col-md-12 -->
        <!-- ACCIONES END -->

        <!-- TABLA START -->
        <div class="col-md-12">
            <div class="table responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Días</th>
                            <th>Precio Unit.</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#123</td>
                            <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam et lacus in dolor accumsan dictum. </td>
                            <td>5</td>
                            <td>2</td>
                            <td>5000</td>
                            <td>5000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- TABLA END -->

    </div><!-- .row -->
</div><!-- .container -->

@endsection
