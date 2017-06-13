<div role="tabpanel" class="tab-pane fade in active" id="evento">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Evento/Salón/Montaje</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Fecha:</strong></p>
                        <p><strong>Desde:</strong><input id="eventoFechaDesde" class="form-control" type="text"></p>
                        <p><strong>Hasta:</strong><input id="eventoFechaHasta" class="form-control" type="text"></p>
                        <p><strong>Evento:</strong></p>
                        <select class="form-control" v-model="input.evento.nombre" @change="getCodigoEvento">
                            <option disabled selected value="seleccionar">Seleccionar</option>
                                @foreach($listEvento as $item)
                                    <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                @endforeach
                        </select>
                        <br>
                    </div>
                    <div class="col-md-6">
                        <p><strong>N° Pax:</strong><input v-model="input.evento.nPersonas" class="form-control" type="number"
                                name="" value="0"></p>
                        <p><strong>Hora:</strong><input id="horaEvento" class="form-control" type="text"></p>
                        <p><strong>Observación:</strong><textarea v-model="input.evento.comentarios" class="form-control" name="name"
                                rows="4" cols="100"></textarea></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Salones/Áreas</h3>
                            </div>
                            <div class="panel-body">
                                <select class="form-control" v-model="input.salon.nombre" @change="getPrecioSalon">
                                    <option disabled selected value="seleccionar">Seleccionar</option>
                                        @foreach ($listSalones as $item)
                                            <option value="{{ $item->nombre }}">{{ $item->nombre }}</option>
                                        @endforeach
                                </select>
                                <br>
                                <p class="text-center"><strong>Fecha:</strong></p>
                                <p><strong>Desde:</strong><input id="salonFechaDesde" class="form-control" type="text"></p>
                                <p><strong>Hasta:</strong><input id="salonFechaHasta" class="form-control" type="text"></p>
                                <p><strong>Días:</strong><input v-model="input.salon.dias" class="form-control" type="number"
                                        value="1"></p>
                                <p><strong>Descuento(%):</strong><input @change="descuentoSalon" v-model="input.salon.descuento"
                                        class="form-control" type="text" name="" value="5"></p>
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
                                        <input type="radio" v-model="input.montaje.picked"  name="optionsRadios" value="pequeño">
                                            Pequeño
                                        </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" v-model="input.montaje.picked" name="optionsRadios" value="grande">
                                            Grande
                                        </label>
                                </div>
                                <hr>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnImperial" @click="changeButtonMontaje('Imperial')" type="button" name="button">Imperial</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnEscuela" @click="changeButtonMontaje('Escuela')" type="button" name="button">Escuela</button>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnCoctel" @click="changeButtonMontaje('Coctel')" type="button" name="button">Coctel</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnBanquete" @click="changeButtonMontaje('Banquete')" type="button" name="button">Banquete</button>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnAuditorio" @click="changeButtonMontaje('Auditorio')" type="button" name="button">Auditorio</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnTipoT" @click="changeButtonMontaje('TipoT')" type="button" name="button">Tipo T</button>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnTipoU" @click="changeButtonMontaje('TipoU')" type="button" name="button">Tipo U</button>
                                    </div>
                                    <div class="col-md-6">
                                        <button :class="input.montaje.btnOtro" @click="changeButtonMontaje('Otro')" type="button" name="button">Otro</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div>
                            <p><strong>Precio Salón/Área:</strong> <input type="text" v-model="input.salon.totalDescuento" class="form-control text-center"
                                    disabled value=""></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <p><strong>Precio Montaje:</strong> <input type="text" v-model="input.montaje.total" class="form-control text-center"
                                    disabled value=""></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
                <div class="well text-center">
                    <button class="btn btn-primary btn-lg fa-2x" type="button" name="button" @click="cargarItemEvento" :disabled="changeDisabledTabEvento">
                                            <i class="fa fa-level-down"></i>
                                        </button>
                    <br>
                    <br>
                    <button class="btn btn-primary btn-lg fa-2x" type="button" name="button" @click="btnLimpiarTabEvento">
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