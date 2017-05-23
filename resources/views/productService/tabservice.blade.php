<div id="main" class="col-md-6" v-bind:style="loading.mainVisible">
    <br>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr v-if="formServicio.categoria == 'habitacion'">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <tr v-if="formServicio.categoria == 'otroServicio'">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <tr v-if="formServicio.categoria == 'equipo'">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="formServicio.categoria == 'habitacion'" v-for="item in habitacion.listHabitacion">
                    <td>@{{ item.codigops }}</td>
                    <td>@{{ item.nombre }}</td>
                    <td>@{{ item.precio }}</td>
                    <td>
                        <button class="btn btn-warning" @click="servicioEdit(item)"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" @click="servicioDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-servicio"><i class="fa fa-trash"></i></button>
                    </td>
      	        </tr>
                <tr v-if="formServicio.categoria == 'otroServicio'" v-for="item in otroServicio.listOtroServicio">
                    <td>@{{ item.codigops }}</td>
                    <td>@{{ item.nombre }}</td>
                    <td>@{{ item.precio }}</td>
                    <td>
                        <button class="btn btn-warning" @click="servicioEdit(item)"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" @click="servicioDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-servicio"><i class="fa fa-trash"></i></button>
                    </td>
      	        </tr>
                <tr v-if="formServicio.categoria == 'equipo'" v-for="item in equipo.listEquipo">
                    <td>@{{ item.codigops }}</td>
                    <td>@{{ item.nombre }}</td>
                    <td>@{{ item.precio }}</td>
                    <td>@{{ item.inventario_equipos[0].cantidad }}</td>
                    <td>
                        <button class="btn btn-warning" @click="servicioEdit(item)"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" @click="servicioDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-servicio"><i class="fa fa-trash"></i></button>
                    </td>
      	        </tr>
            </tbody>
        </table><!-- .table table-hover table-bordered -->
    </div><!-- .table-responsive -->
    <div>
        <form class="form-horizontal">
                <div class="form-group">
                    <div class="radio col-md-4">
                      <label>
                        <input type="radio" id="todo" value="todo" @change="changeServicioBuscar" v-model="formServicioBuscar.picked">
                        Todos
                      </label>
                    </div><!-- .radio -->
                    <div class="radio col-md-4">
                      <label>
                        <input type="radio" id="codigo" value="codigo" @change="changeServicioBuscar" v-model="formServicioBuscar.picked">
                        Codigo
                      </label>
                    </div><!-- .radio -->
                    <div class="radio col-md-4">
                      <label>
                        <input type="radio" id="nombre" value="nombre" @change="changeServicioBuscar" v-model="formServicioBuscar.picked">
                        Nombre
                      </label>
                    </div><!-- .radio -->
                </div><!-- .form-group -->
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" v-model="formServicioBuscar.text" class="form-control" value="" :disabled="disabled == 1 ? true : false">
                    </div><!-- .col-md-12 -->
                </div><!-- .form-group -->
                <div class="form-group">
                    <div class="col-md-12">
                        <button class="btn btn-primary btn-block" @click="onSubmitFormServicioBuscar">Buscar</button>
                    </div><!-- .col-md-12 -->
                </div><!-- .form-group -->
        </form><!-- .form-horizontal -->
    </div>
</div><!-- .col-md-6 -->
<div id="main" class="col-md-6" v-bind:style="loading.mainVisible">
    <br>
    <div v-if="mostrarMensajeServicio" v-bind:class="mensajeServicio.type" role="alert">
  	<button v-on:click="cerrarMensajeServicio" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	@{{ mensajeServicio.title }}
  </div>
    <form class="form-horizontal">
        <legend>Guardar Servicio</legend>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <select class="form-control"  @change="selectServicio" v-model="formServicio.categoria">
                    <option disabled value="">Seleccione</option>
                    <option value="equipo">Equipos</option>
                    <option value="habitacion">Habitaciones</option>
                    <option value="otroServicio">Otros Servicios</option>
                </select><!-- .form-control -->
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Codigo:</label>
            <div class="col-md-8">
                <input v-if="disabledCodigoServicio" type="text" class="form-control" disabled="disabled" v-model="formServicio.codigo" :value="formServicio.codigo">
                <input v-else type="text" class="form-control" v-model="formServicio.codigo" :value="formServicio.codigo">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Nombre:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" v-model="formServicio.nombre" :value="formServicio.nombre">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Precio:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" id="precioServicio" v-model="formServicio.precio" :value="formServicio.precio">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Cantidad:</label>
            <div class="col-md-8">
                <input v-if="disabledCantidadServicio" type="text" class="form-control" disabled="disabled">
                <input v-else type="text" class="form-control" v-model="formServicio.cantidad" :value="formServicio.cantidad">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button v-if="showButtonServicio" type="button" class="btn btn-success" @click.prevent="onSubmitFormServicio">Guardar</button>
                <button v-else type="button" disabled="disabled" class="btn btn-success">Guardar</button>
                <button class="btn btn-primary">Limpiar</button>
            </div><!-- .col-md-offset-4 -->
        </div><!-- .form-group -->
    </form><!-- .form-horizonta -->
</div><!-- .col-md-6 -->
