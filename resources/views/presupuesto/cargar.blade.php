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

                    @include('presupuesto.cargarTabEvento')
                    
                    @include('presupuesto.cargarTabProducto')

                    @include('presupuesto.cargarTabServicio')

                </div>
            </div>

          </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
