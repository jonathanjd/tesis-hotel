<div id="main" class="col-md-6" v-bind:style="loading.mainVisible">
    <br>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr v-if="formEvento.categoria == 'evento'">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                <tr v-if="formEvento.categoria == 'salones'">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
                <tr v-if="formEvento.categoria == 'montaje'">
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="formEvento.categoria == 'evento'" v-for="item in evento.listEvento">
                    <td>@{{ item.codigoevento }}</td>
                    <td>@{{ item.nombre }}</td>
                    <td>
                        <button class="btn btn-warning" @click="eventoEdit(item)"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" @click="eventoDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-evento"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr v-if="formEvento.categoria == 'salones'" v-for="item in salon.listSalon">
                    <td>@{{ item.codigops }}</td>
                    <td>@{{ item.nombre }}</td>
                    <td>@{{ item.precio }}</td>
                    <td>
                        <button class="btn btn-warning" @click="eventoEdit(item)"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" @click="eventoDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-evento"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
                <tr v-if="formEvento.categoria == 'montaje'" v-for="item in montaje.listMontaje">
                    <td>@{{ item.codigops }}</td>
                    <td>@{{ item.nombre }}</td>
                    <td>@{{ item.precio }}</td>
                    <td>@{{ item.tipo_montajes[0].tipomontaje }}</td>

                    <td>
                        <button class="btn btn-warning" @click="eventoEdit(item)"><i class="fa fa-pencil"></i></button>
                        <button class="btn btn-danger" @click="eventoDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-evento"><i class="fa fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table><!-- .table table-hover table-bordered -->
    </div><!-- .table-responsive -->
    <div>
        <form class="form-horizontal">
                <div class="form-group">
                    <div class="radio col-md-4">
                        <label for="todo">
                            <input type="radio" id="todo" @change="changeEventoBuscar" value="todo" v-model="formEventoBuscar.picked">
                            Todos
                        </label>
                    </div><!-- .radio -->
                    <div class="radio col-md-4">
                        <label for="codigo">
                            <input type="radio" id="codigo" @change="changeEventoBuscar" value="codigo" v-model="formEventoBuscar.picked">
                            Codigo
                        </label>
                    </div><!-- .radio -->
                    <div class="radio col-md-4">
                        <label for="nombre">
                            <input type="radio" id="nombre" @change="changeEventoBuscar" value="nombre" v-model="formEventoBuscar.picked">
                            Nombre
                        </label>
                    </div><!-- .radio -->
                </div><!-- .form-group -->
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" v-model="formEventoBuscar.text" class="form-control" value="" :disabled="disabled == 1 ? true : false">
                    </div><!-- .col-md-12 -->
                </div><!-- .form-group -->
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-primary btn-block" @click="onSubmitFormEventoBuscar">Buscar</button>
                    </div><!-- .col-md-12 -->
                </div><!-- .form-group -->
        </form><!-- .form-horizontal -->
    </div>
</div><!-- .col-md-6 -->
<div id="main" class="col-md-6" v-bind:style="loading.mainVisible">
    <br>
        <div v-if="mostrarMensajeEvento" v-bind:class="mensajeEvento.type" role="alert">
            <button v-on:click="cerrarMensajeEvento" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @{{ mensajeEvento.title }}
        </div>
    <form class="form-horizontal" method="post" @submit.prevent="onSubmitFormEvento">
        <legend>Guardar Evento/Salones/Montajes</legend>
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <select class="form-control" @change="selectEvento" v-model="formEvento.categoria">
                  <option disabled value="">Seleccione</option>
                  <option value="evento">Evento</option>
                  <option value="salones">Salones</option>
                  <option value="montaje">Montaje</option>
                </select><!-- .form-control -->
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Codigo:</label>
            <div class="col-md-8">
                <input v-if="disabledCodigo" type="text" class="form-control" disabled="disabled" v-model="formEvento.codigo" :value="formEvento.codigo">
                <input v-else type="text" class="form-control" v-model="formEvento.codigo" :value="formEvento.codigo">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Nombre:</label>
            <div class="col-md-8">
                <input type="text" class="form-control" v-model="formEvento.nombre" :value="formEvento.nombre">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Precio:</label>
            <div class="col-md-8">
                <input v-if="disabledPrecio" type="text" class="form-control" disabled="disabled" v-model="formEvento.precio" value="">
                <input v-else type="text" id="precioEvento" class="form-control" v-model="formEvento.precio" value="">
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <label for="" class="control-label col-md-4">Tipo:</label>
            <div class="col-md-8">
                <select v-if="disabledTipo" disabled="disabled" class="form-control" v-model="formEvento.tipo">
                    <option disabled value="">Seleccione</option>
                    <option>Pequeño</option>
                    <option>Grande</option>
                </select><!-- .form-control -->
                <select v-else class="form-control" v-model="formEvento.tipo">
                    <option disabled value="">Seleccione</option>
                    <option value="pequeño">Pequeño</option>
                    <option value="grande">Grande</option>
                </select><!-- .form-control -->
            </div>
        </div><!-- .form-group -->
        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <button v-if="showButtonEvento" type="submit" class="btn btn-success">Guardar</button>
                <button v-else type="button" disabled="disabled" class="btn btn-success">Guardar</button>
                <button @click="limpiarBtnEvento" class="btn btn-primary">Limpiar</button>
            </div><!-- .col-md-offset-4 -->
        </div><!-- .form-group -->
    </form><!-- .form-horizonta -->
</div><!-- .col-md-6 -->
