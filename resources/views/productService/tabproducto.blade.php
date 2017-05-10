<div class="col-md-6">
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
				<tr>
					<td>CB001</td>
					<td>Cerveza</td>
					<td>1000</td>
					<td>
						<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
						<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-producto"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<tr>
					<td>CB002</td>
					<td>Malta</td>
					<td>1000</td>
					<td>
						<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
						<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-producto"><i class="fa fa-trash"></i></button>
					</td>
				</tr>
				<tr>
					<td>CB003</td>
					<td>Jugo</td>
					<td>1000</td>
					<td>
						<button class="btn btn-warning"><i class="fa fa-pencil"></i></button>
						<button class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-producto"><i class="fa fa-trash"></i></button>
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
						<input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
						Todos
					  </label>
					</div><!-- .radio -->
					<div class="radio col-md-4">
					  <label>
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						Codigo
					  </label>
					</div><!-- .radio -->
					<div class="radio col-md-4">
					  <label>
						<input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
						Nombre
					  </label>
					</div><!-- .radio -->
				</div><!-- .form-group -->
				<div class="form-group">
					<div class="col-md-12">
						<input type="text" class="form-control">
					</div><!-- .col-md-12 -->
				</div><!-- .form-group -->
				<div class="form-group">
					<div class="col-md-12">
						<button class="btn btn-primary btn-block">Buscar</button>
					</div><!-- .col-md-12 -->
				</div><!-- .form-group -->
		</form><!-- .form-horizontal -->
	</div>
</div><!-- .col-md-6 -->
<div class="col-md-6">
	<br>
	<form class="form-horizontal">
		<legend>Guardar Producto</legend>
		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<select class="form-control">
				  <option>Alimentos</option>
				  <option>Bebidas</option>
				  <option>Materiales</option>
				</select><!-- .form-control -->
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<label for="" class="control-label col-md-4">Codigo:</label>
			<div class="col-md-8">
				<input type="text" class="form-control">
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<label for="" class="control-label col-md-4">Nombre:</label>
			<div class="col-md-8">
				<input type="text" class="form-control">
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<label for="" class="control-label col-md-4">Precio:</label>
			<div class="col-md-8">
				<input type="text" class="form-control">
			</div>
		</div><!-- .form-group -->
		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<button class="btn btn-success">Guardar</button>
				<button class="btn btn-primary">Limpiar</button>
			</div><!-- .col-md-offset-4 -->
		</div><!-- .form-group -->
	</form><!-- .form-horizonta -->
</div><!-- .col-md-6 -->
