<div id="main" class="col-md-6" v-bind:style="loading.mainVisible">
	<br>
	<div class="table-responsive">
		<table class="table table-hover table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Precio</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				
				<tr v-if="formProducto.categoria == 'alimento'" v-for="item in alimento.listAlimento">
        	<td>@{{ item.codigops }}</td>
        	<td>@{{ item.nombre }}</td>
        	<td>@{{ item.precio }}</td>
        	<td>
          	<button class="btn btn-warning" @click="productoEdit(item)"><i class="fa fa-pencil"></i></button>
          	<button class="btn btn-danger" @click="productoDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-producto"><i class="fa fa-trash"></i></button>
        	</td>
      	</tr>

				<tr v-if="formProducto.categoria == 'bebida'" v-for="item in bebida.listBebida">
        	<td>@{{ item.codigops }}</td>
        	<td>@{{ item.nombre }}</td>
        	<td>@{{ item.precio }}</td>
        	<td>
          	<button class="btn btn-warning" @click="productoEdit(item)"><i class="fa fa-pencil"></i></button>
          	<button class="btn btn-danger" @click="productoDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-producto"><i class="fa fa-trash"></i></button>
        	</td>
      	</tr>

				<tr v-if="formProducto.categoria == 'material'" v-for="item in material.listMaterial">
        	<td>@{{ item.codigops }}</td>
        	<td>@{{ item.nombre }}</td>
        	<td>@{{ item.precio }}</td>
        	<td>
          	<button class="btn btn-warning" @click="productoEdit(item)"><i class="fa fa-pencil"></i></button>
          	<button class="btn btn-danger" @click="productoDelete(item.id, item.nombre)" data-toggle="modal" data-target="#modal-delete-producto"><i class="fa fa-trash"></i></button>
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
						<input type="radio" id="todo" value="todo" @change="changeProductoBuscar" v-model="formProductoBuscar.picked">
						Todos
					  </label>
					</div><!-- .radio -->
					<div class="radio col-md-4">
					  <label>
						<input type="radio" id="codigo" value="codigo" @change="changeProductoBuscar" v-model="formProductoBuscar.picked">
						Codigo
					  </label>
					</div><!-- .radio -->
					<div class="radio col-md-4">
					  <label>
						<input type="radio" id="nombre" value="nombre" @change="changeProductoBuscar" v-model="formProductoBuscar.picked">
						Nombre
					  </label>
					</div><!-- .radio -->
				</div><!-- .form-group -->
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" v-model="formProductoBuscar.text" class="form-control" value="" :disabled="disabled == 1 ? true : false">
					</div><!-- .col-md-12 -->
				</div><!-- .form-group -->
				<div class="form-group">
					<div class="col-md-12">
						<button type="button" class="btn btn-primary btn-block" @click="onSubmitFormProductoBuscar">Buscar</button>
					</div><!-- .col-md-12 -->
				</div><!-- .form-group -->
		</form><!-- .form-horizontal -->
	</div>
</div><!-- .col-md-6 -->
<div id="main" class="col-md-6" v-bind:style="loading.mainVisible">
	<br>
	<div v-if="mostrarMensajeProducto" v-bind:class="mensajeProducto.type" role="alert">
  	<button v-on:click="cerrarMensajeProducto" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  	@{{ mensajeProducto.title }}
  </div>
	<form class="form-horizontal" method="post" @submit.prevent="onSubmitFormProducto">
		<legend>Guardar Alimento/Bebida/Material</legend>
		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<select class="form-control" @change="selectProducto" v-model="formProducto.categoria">
				  <option disabled value="">Seleccione</option>
					<option value="alimento">Alimentos</option>
				  <option value="bebida">Bebidas</option>
				  <option value="material">Materiales</option>
				</select><!-- .form-control -->
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<label for="" class="control-label col-md-4">Codigo:</label>
			<div class="col-md-8">
				 <input v-if="disabledCodigoProducto" type="text" class="form-control" disabled="disabled" v-model="formProducto.codigo" :value="formProducto.codigo">
        <input v-else type="text" class="form-control" v-model="formProducto.codigo" :value="formProducto.codigo">
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<label for="" class="control-label col-md-4">Nombre:</label>
			<div class="col-md-8">
				<input type="text" class="form-control" v-model="formProducto.nombre" :value="formProducto.nombre">
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<label for="" class="control-label col-md-4">Precio:</label>
			<div class="col-md-8">
				<input type="text" class="form-control" id="precioProducto" v-model="formProducto.precio" :value="formProducto.precio">
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<button v-if="showButtonProducto" type="submit" class="btn btn-success">Guardar</button>
        		<button v-else type="button" disabled="disabled" class="btn btn-success">Guardar</button>
        		<button class="btn btn-primary" @click="limpiarBtnProducto">Limpiar</button>
			</div><!-- .col-md-offset-4 -->
		</div><!-- .form-group -->
	</form><!-- .form-horizonta -->
</div><!-- .col-md-6 -->
