@extends('layouts.app')
@section('title', 'Productos y Servicios')
@section('title-section','Productos y Servicios')
@section('content')
	<div class="container">
		<div class="row">
			<div id="cargando" v-bind:style="loading.progressVisible">
				<div class="progress">
					<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
						<span class="sr-only">Cargando...</span>
					</div>
				</div>
			</div><!-- PROGRESS END -->

			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-heading">Registrar Productos/Servicios</h3>
					</div><!-- .PANEL-HEADING -->
					<div class="panel-body">
						<!-- Nav tabs -->
						<ul class="nav nav-tabs" role="tablist">
					  		<li role="presentation" class="active"><a href="#eventos" aria-controls="eventos" role="tab" data-toggle="tab">Eventos</a></li>
					  		<li role="presentation"><a href="#productos" aria-controls="productos" role="tab" data-toggle="tab">Productos</a></li>
					  		<li role="presentation"><a href="#servicios" aria-controls="servicios" role="tab" data-toggle="tab">Servicios</a></li>
						</ul><!-- .nav nav-tabs -->

						<!-- Tab panes -->
						<div class="tab-content">
					 		<div role="tabpanel" class="tab-pane fade in active" id="eventos">
					 			@include('productService.tabevento')
					 		</div>
					    	<div role="tabpanel" class="tab-pane fade" id="productos">
								@include('productService.tabproducto')
					    	</div><!-- .tabpanel -->
					    	<div role="tabpanel" class="tab-pane fade" id="servicios">
					    		@include('productService.tabservice')
					    	</div>
						</div><!-- .tab-content -->

					</div><!-- .PANEL-BODY -->
					<div class="panel-footer"></div>
				</div><!-- .PANEL PANEL-DEFAULT -->
			</div><!-- .COL-MD-12 -->
		</div><!-- .ROW -->
	</div><!-- .CONTAINER -->
	
	<!-- MODAL -->
	@include('productService.deleteProducto')
	@include('productService.deleteServicio')
	@include('productService.deleteEvento')
@endsection
@section('script')
	{!! Html::script('js/vue.js') !!}
    {!! Html::script('js/vue-resource.js') !!}
    {!! Html::script('js/admin/productoServicio-vue.js') !!}
	{!! Html::script('js/jquery.priceformat.min.js') !!}
	<script>
		$('#precioEvento').priceFormat({
			prefix: '',
			thousandsSeparator: '',
			limit: 9
		});
		$('#precioProducto').priceFormat({
			prefix: '',
			thousandsSeparator: '',
			limit: 9
		});
		$('#precioServicio').priceFormat({
			prefix: '',
			thousandsSeparator: '',
			limit: 9
		});
	</script>


@endsection
