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
                                            <td>Acciones</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in input.producto.list">
                                            <td>@{{ item.codigops }}</td>
                                            <td>@{{ item.nombre }}</td>
                                            <td>@{{ item.precio }}</td>
                                            <td class="text-center">
                                                <button :class="{'btn btn-primary': true, 'btn btn-success': item.nombre == input.producto.nombre}" @click="takeProducto(item)">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <select class="form-control" @change="selectProducto" v-model="input.producto.categoria">
                                    <option disabled value="seleccione">Seleccione</option>
                                    <option value="alimentos">Alimentos</option>
                                    <option value="bebidas">Bebidas</option>
                                    <option value="materiales">Materiales</option>
                                </select>
                            </div>
                            <form>
                                <div class="form-group">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" v-model="input.producto.picked" @change="changeProductoBuscar" name="optionsRadios" value="codigo" checked>
                                            Codigo
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" v-model="input.producto.picked" @change="changeProductoBuscar" name="optionsRadios" value="nombre">
                                                Nombre
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" v-model="input.producto.picked" @change="changeProductoBuscar" name="optionsRadios" value="todo">
                                                Todo
                                        </label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" type="text" v-model="input.producto.buscar" value="" :disabled="disabled == 1 ? true : false">
                                    </div>
                                    <div class="col-md-2">
                                        <button class="btn btn-success" type="button" @click.prevent="buscarProducto"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-md-4">
                                <p><strong>Cantidad</strong></p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" v-model="input.producto.cantidad" type="number" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <p><strong>F. Inicio</strong></p>
                            </div>
                            <div class="col-md-8">
                                <input id="productoFechaInicio" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <p><strong>F. Fin.</strong></p>
                            </div>
                            <div class="col-md-8">
                                <input id="productoFechaFin" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <p><strong>Días.</strong></p>
                            </div>
                            <div class="col-md-8">
                                <input class="form-control" v-model="input.producto.dias" type="number" name="" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-4">
                                <p><strong>Hora</strong></p>
                            </div>
                            <div class="col-md-8">
                                <input id="productoHora" class="form-control" type="text">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="well text-center">
                        <button class="btn btn-primary btn-lg fa-2x" type="button" name="button" :disabled="changeDisabledTabServicio">
                            <i class="fa fa-level-down"></i>
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-primary btn-lg fa-2x" type="button" name="button">
                            <i class="fa fa-refresh"></i>
                        </button>
                        <br>
                        <br>
                        <button class="btn btn-primary btn-lg fa-2x" data-dismiss="modal" type="button" name="button">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
