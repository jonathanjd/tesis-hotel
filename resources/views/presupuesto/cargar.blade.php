<div class="modal fade" role="dialog" id="cargar">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cargar Productos y Servicios</h4>
          </div>
          <div class="modal-body">

            <div>
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#evento" aria-controls="evento" role="tab" data-toggle="tab">Eventos</a></li>
                    <li role="presentation"><a href="#producto" aria-controls="producto" role="tab" data-toggle="tab">Productos</a></li>
                    <li role="presentation"><a href="#servicio" aria-controls="servicio" role="tab" data-toggle="tab">Servicios</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="evento">
                        <br>
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Evento/Salón/Montaje</h3>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-10">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p><strong>Fecha:</strong></p>
                                            <p><strong>Desde:</strong><input class="form-control" type="date" name="" value=""></p>
                                            <p><strong>Hasta:</strong><input class="form-control" type="date" name="" value=""></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Evento:</strong></p>
                                            <select class="form-control">
                                              <option>Evento 1</option>
                                              <option>Evento 2</option>
                                              <option>Evento 3</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>N° Pax:</strong><input class="form-control" type="text" name="" value="3"></p>
                                            <p><strong>Hora:</strong><input class="form-control" type="text" name="" value="10:30 PM"></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong>Observación:</strong><textarea class="form-control" name="name" rows="4" cols="100"></textarea></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Salones/Áreas</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <select class="form-control" name="">
                                                        <option value="">Salón Uno</option>
                                                        <option value="">Salón Dos</option>
                                                        <option value="">Salón Tres</option>
                                                    </select>
                                                    <br>
                                                    <p class="text-center"><strong>Fecha:</strong></p>
                                                    <p><strong>Desde:</strong><input class="form-control" type="text" name="" value="10/02/2017"></p>
                                                    <p><strong>Hasta:</strong><input class="form-control" type="text" name="" value="10/02/2017"></p>
                                                    <p><strong>Días:</strong><input class="form-control" type="text" name="" value="1"></p>
                                                    <p><strong>Descuento(%):</strong><input class="form-control" type="text" name="" value="5"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel panel-info">
                                                <div class="panel-heading">
                                                    <h3 class="panel-title">Montaje Salones</h3>
                                                </div>
                                                <div class="panel-body">
                                                    <p class="text-center"><strong>Tipo de Montaje:</strong></p>
                                                    <div class="radio">
                                                      <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                        Pequeño
                                                      </label>
                                                    </div>
                                                    <div class="radio">
                                                      <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                        Grande
                                                      </label>
                                                    </div>
                                                    <hr>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Imperial</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Escuela</button>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Coctel</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Banquete</button>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Auditorio</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Tipo T</button>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Tipo U</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary sizeButtonMiddle" type="button" name="button">Otro</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <p><strong>Precio Salón/Área:</strong> 100BsF</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div>
                                                <p><strong>Precio Montaje:</strong> 100BsF</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="well text-center">
                                        <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                            <i class="fa fa-level-down"></i>
                                        </button>
                                        <br>
                                        <br>
                                        <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                            <i class="fa fa-refresh"></i>
                                        </button>
                                        <br>
                                        <br>
                                        <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                            <i class="fa fa-close"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="producto">
                        <br>
                        <div class="">
                            <div class=" panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Cargar Alimentos/Bebidas/Materiales</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="col-md-10">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr>
                                                                <td>Código</td>
                                                                <td>Nombre</td>
                                                                <td>Precios</td>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>001</td>
                                                                <td>Cachapas</td>
                                                                <td>3500</td>
                                                            </tr>
                                                            <tr>
                                                                <td>002</td>
                                                                <td>Arepas</td>
                                                                <td>1500</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <select class="form-control" name="">
                                                        <option value="">Alimentos</option>
                                                        <option value="">Bebidas</option>
                                                        <option value="">Materiales</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div class="radio">
                                                      <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                        Codigo
                                                      </label>
                                                    </div>
                                                    <div class="radio">
                                                      <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                        Nombre
                                                      </label>
                                                    </div>
                                                    <div class="radio">
                                                      <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                        Todo
                                                      </label>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input class="form-control" type="text" name="" value="">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button class="btn btn-success" type="button" name="button">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <p><strong>Cantidad</strong></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="" value="1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <p><strong>F. Inicio</strong></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="" value="10/02/2017">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <p><strong>F. Fin.</strong></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="" value="10/02/2017">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <p><strong>Días.</strong></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="" value="1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4">
                                                    <p><strong>Hora</strong></p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input class="form-control" type="text" name="" value="10:10AM">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="well text-center">
                                            <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                                <i class="fa fa-level-down"></i>
                                            </button>
                                            <br>
                                            <br>
                                            <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                                <i class="fa fa-refresh"></i>
                                            </button>
                                            <br>
                                            <br>
                                            <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                                <i class="fa fa-close"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="servicio">

                        <br>
                        <div class="panel panel-primary">
                          <div class="panel-heading">
                            <h3 class="panel-title">Equipos/Habitaciones/Otros Servicios</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-md-10">
                                <div class="col-md-6">
                                    <h3>Equipos</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                    <th>Disponibilidad</th>
                                                    <th>Fecha</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>001</td>
                                                    <td>Equipo A</td>
                                                    <td>100</td>
                                                    <td>Si</td>
                                                    <td>01/02/2017</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <h3>Habitaciones/Otros Servicios</h3>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>001</td>
                                                    <td>Habitación A</td>
                                                    <td>100</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <select class="form-control" name="">
                                                <option value="">Equipos</option>
                                                <option value="">Habitaciones</option>
                                                <option value="">Otros Servicios</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                                                Codigo
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                Nombre
                                              </label>
                                            </div>
                                            <div class="radio">
                                              <label>
                                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                                                Todo
                                              </label>
                                            </div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="text" name="" value="">
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-success" type="button" name="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <p><strong>Cantidad</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <p><strong>F. Inicio</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="" value="10/02/2017">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <p><strong>F. Fin.</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="" value="10/02/2017">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <p><strong>Días.</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="" value="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <p><strong>Hora</strong></p>
                                        </div>
                                        <div class="col-md-8">
                                            <input class="form-control" type="text" name="" value="10:10AM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="well text-center">
                                    <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                        <i class="fa fa-level-down"></i>
                                    </button>
                                    <br>
                                    <br>
                                    <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                    <br>
                                    <br>
                                    <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                                        <i class="fa fa-close"></i>
                                    </button>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
