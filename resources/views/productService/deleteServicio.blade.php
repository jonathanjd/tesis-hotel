<!-- HIDDEN SIGNUP MODAL -->
    <div class="modal fade" id="modal-delete-servicio">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header background-danger text-white text-center">
                    <h3>Eliminar Servicio?</h3>
                </div><!-- modal-header -->
                <div class="modal-body">
                    <p><strong>Deseas eliminar a:</strong> @{{ formServicioDelete.nombre }}</p>
                    <form>
                        <button type="button" class="btn btn-danger btn-block" data-dismiss="modal" @click.prevent="onSubmitFormServicioDestroy">Eliminar</button>
                        <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Cerrar</button>
                    </form>
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div><!-- .modal-dialogo modal-sm -->
    </div><!-- .modal fade #modal-signup -->
    <!-- END HIDDEN SIGNUP MODAL -->
