Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({

    el: '#app',

    data:{

        budget:{
            codigo: '',
            fechaEmision: '',
            fechaConfirmacion: '',
        },

        total:{
            subTotal: '0',
            iva: '0',
            totalGeneral: '0',
        },

        cliente:{
            buscar: {
                cedula: '',
            },
            codigo: '',
            telefono: '',
            fax: '',
            nombreContacto: '',
            cargoContacto: '',
            telefonoContacto: '',
        },

        input:{
            evento:{
                nombre: 'seleccionar',
                fechaDesde: '',
                fechaHasta: '',
                hora: '',
                nPersonas: '0',
                comentarios: '',
            },

            salon: {
                nombre: 'seleccionar',
                fechaDesde: '',
                fechaHasta: '',
                dias: '0',
                descuento: 0,
                total: 0,
                totalDescuento: 0,
                cantidad: '1',
            },

            montaje: {
                picked: 'pequeño',
                nombre: '',
                cantidad: '1',
                dias: '0',
                total: '0',
                btnImperial: 'btn btn-primary sizeButtonMiddle',
                btnEscuela: 'btn btn-primary sizeButtonMiddle',
                btnCoctel: 'btn btn-primary sizeButtonMiddle',
                btnBanquete: 'btn btn-primary sizeButtonMiddle',
                btnAuditorio: 'btn btn-primary sizeButtonMiddle',
                btnTipoT: 'btn btn-primary sizeButtonMiddle',
                btnTipoU: 'btn btn-primary sizeButtonMiddle',
                btnOtro: 'btn btn-primary sizeButtonMiddle',
            },

            producto: {
                codigo: '',
                nombre: '',
                precio: '',
                cantidad: '',
                fechaInicio: '',
                fechaFin: '',
                dias: '',
                hora: '',
                list: [],
                categoria: 'seleccione',
                buscar: '',
                picked: '',
            },

            servicio: {
                codigo: '',
                nombre: '',
                precio: '',
                cantidad: '',
                fechaInicio: '',
                fechaFin: '',
                dias: '',
                hora: '',
                list: [],
                categoria: 'seleccione',
                buscar: '',
                picked: '',
            },
        },

        disabled: 1,
        disabledServicio: 1,

    },

    mounted: function(){

        this.autoIncrementoBudget();

        //Tab Evento
        $("#eventoFechaDesde").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.evento.fechaDesde = $('#eventoFechaDesde').val()});

        $("#eventoFechaHasta").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.evento.fechaHasta = $('#eventoFechaHasta').val()});

        $("#horaEvento").timepicker({
            template: false,
            showInputs: false,
            minuteStep: 5,
            defaultTime: false
        }).on("change", () => {this.input.evento.hora = $("#horaEvento").val()});

        $("#salonFechaDesde").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.salon.fechaDesde = $("#salonFechaDesde").val()});

        $("#salonFechaHasta").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.salon.fechaHasta = $("#salonFechaHasta").val()});

        //Tab Producto
        $("#productoFechaInicio").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.producto.fechaInicio = $("#productoFechaInicio").val()});

        $("#productoFechaFin").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.producto.fechaFin = $("#productoFechaFin").val()});

        $("#productoHora").timepicker({
            template: false,
            showInputs: false,
            minuteStep: 5,
            defaultTime: false
        }).on("change", () => {this.input.producto.hora = $("#productoHora").val()});

        //Tab Servicio
        $("#servicioFechaInicio").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.servicio.fechaInicio = $("#servicioFechaInicio").val()});

        $("#servicioFechaFin").datepicker({
            todayBtn: "linked",
            todayHighlight: true
        }).on("changeDate", () => {this.input.servicio.fechaFin = $("#servicioFechaFin").val()});

        $("#servicioHora").timepicker({
            template: false,
            showInputs: false,
            minuteStep: 5,
            defaultTime: false
        }).on("change", () => {this.input.servicio.hora = $("#servicioHora").val()});
    },

    methods: {

        //AutoIncremento para Budget
        autoIncrementoBudget: function(){
            this.$http.get('/admin/presupuesto/autoIncrementoPresupuesto').then(
                function(response){
                    this.budget.codigo = response.data.codigo;
                    this.budget.fechaEmision = response.data.fechaActual;
                    this.budget.fechaConfirmacion = response.data.fechaActual;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Cliente
        buscarCliente: function(){
            var codigo = this.cliente.buscar.cedula
            this.$http.get('/admin/cliente/buscar/' + codigo).then(
                function(response){
                    //Asignar Valores
                    this.cliente.codigo = response.data.codigo_cte;
                    this.cliente.telefono = response.data.telefono;
                    this.cliente.fax = response.data.fax;
                    this.cliente.nombreContacto = response.data.contact.contacto_c1;
                    this.cliente.cargoContacto = response.data.contact.cargo_dpto_c1;
                    this.cliente.telefonoContacto = response.data.contact.telefono_c1;
                },
                function(response){
                    console.log('RESPONSE ERROR AJAX');
                }
            );
        },

        //getPrecioSalon
        getPrecioSalon: function(){

            this.$http.get('/admin/presupuesto/precioSalon/' + this.input.salon.nombre).then(
                function(response){
                    this.input.salon.total = response.data.precio;
                    this.input.salon.totalDescuento = this.input.salon.total
                },
                function(response){
                    console.log('RESPONSE ERROR AJAX');
                }
            );

        },

        //getPrecioMontaje
        getPrecioMontaje: function(){

            this.$http.get('/admin/presupuesto/precioMontaje/'
                + this.input.montaje.nombre + '/'
                + this.input.montaje.picked).then(
                    function(response){
                        this.input.montaje.total = response.data.precio;
                    },
                    function(response){
                        console.log('RESPONSE ERROR AJAX');
            });

        },

        descuentoSalon: function(){
            var descuento = this.input.salon.descuento * this.input.salon.total / 100;
            var total = this.input.salon.total - descuento;
            this.input.salon.totalDescuento = total;
        },

        //Montaje BTN
        changeButtonMontaje: function(name){
            if(name == 'Imperial'){
                this.input.montaje.nombre = 'Imperial';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'Escuela'){
                this.input.montaje.nombre = 'Escuela';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'Coctel'){
                this.input.montaje.nombre = 'Coctel';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'Banquete'){
                this.input.montaje.nombre = 'Banquete';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'Auditorio'){
                this.input.montaje.nombre = 'Auditorio';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'TipoT'){
                this.input.montaje.nombre = 'TipoT';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'TipoU'){
                this.input.montaje.nombre = 'TipoU';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-success sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-primary sizeButtonMiddle';
            }
            if(name == 'Otro'){
                this.input.montaje.nombre = 'Otro';
                this.getPrecioMontaje();
                this.input.montaje.btnImperial = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnEscuela = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnCoctel = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnBanquete = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnAuditorio = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoT = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnTipoU = 'btn btn-primary sizeButtonMiddle';
                this.input.montaje.btnOtro = 'btn btn-success sizeButtonMiddle';
            }
        },

        //Listar Alimentos
        getListEquipos: function(){

            this.$http.get('/admin/presupuesto/listarEquipos').then(
                (response) => {
                    this.input.servicio.list = response.data;
                    console.log(response.data);
                },
                (response) => {
                    console.log('RESPONSE ERROR AJAX');
                }
            );

        },

        //Buscar Codigo Equipo
        getBuscarCodigoEquipo: function(){
            this.$http.get('/admin/equipo/buscarCodigoEquipo/' + this.input.servicio.buscar).then(
                function(response){
                    this.input.servicio.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Equipo
        getBuscarNombreEquipo: function(){
            this.$http.get('/admin/equipo/buscarNombreEquipo/' + this.input.servicio.buscar).then(
                function(response){
                    this.input.servicio.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Alimentos
        getListAlimentos: function(){

            this.$http.get('/admin/presupuesto/listarAlimentos').then(
                (response) => {
                    this.input.producto.list = response.data;
                },
                (response) => {
                    console.log('RESPONSE ERROR AJAX');
                }
            );

        },

        //Buscar Codigo Alimento
        getBuscarCodigoAlimento: function(){
            this.$http.get('/admin/alimento/buscarCodigoAlimento/' + this.input.producto.buscar).then(
                function(response){
                    this.input.producto.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Alimento
        getBuscarNombreAlimento: function(){
            this.$http.get('/admin/alimento/buscarNombreAlimento/' + this.input.producto.buscar).then(
                function(response){
                    this.input.producto.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Bebidas
        getListBebidas: function(){

            this.$http.get('/admin/presupuesto/listarBebidas').then(
                (response) => {
                    this.input.producto.list = response.data;
                },
                (response) => {
                    console.log('RESPONSE ERROR AJAX');
                }
            );
        },

        //Buscar Codigo Bebida
        getBuscarCodigoBebida: function(){
            this.$http.get('/admin/bebida/buscarCodigoBebida/' + this.input.producto.buscar).then(
                function(response){
                    this.input.producto.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Bebida
        getBuscarNombreBebida: function(){
            this.$http.get('/admin/bebida/buscarNombreBebida/' + this.input.producto.buscar).then(
                function(response){
                    this.input.producto.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Materiales
        getListMateriales: function(){

            this.$http.get('/admin/presupuesto/listarMateriales').then(
                (response) => {
                    this.input.producto.list = response.data;
                },
                (response) => {
                    console.log('RESPONSE ERROR AJAX');
                }
            );

        },

        //Buscar Codigo Material
        getBuscarCodigoMaterial: function(){
            this.$http.get('/admin/material/buscarCodigoMaterial/' + this.input.producto.buscar).then(
                function(response){
                    this.input.producto.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Material
        getBuscarNombreMaterial: function(){
            this.$http.get('/admin/material/buscarNombreMaterial/' + this.input.producto.buscar).then(
                function(response){
                    this.input.producto.list = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Seleccionar Categoria Producto
        selectProducto: function(){

            var categoria = this.input.producto.categoria;

            if(categoria == 'alimentos'){
                this.getListAlimentos();
            }

            if(categoria == 'bebidas'){
                this.getListBebidas();
            }

            if(categoria == 'materiales'){
                this.getListMateriales();
            }

        },

        //Seleccionar Categoria Servicio
        selectServicio: function(){

            var categoria = this.input.servicio.categoria;

            if(categoria == 'equipos'){
                this.getListEquipos();
            }

        },

        takeProducto: function(item) {

            this.input.producto.codigo = item.codigops;
            this.input.producto.nombre = item.nombre;
            this.input.producto.precio = item.precio;

        },

        takeServicio: function(item) {

            this.input.servicio.codigo = item.codigops;
            this.input.servicio.nombre = item.nombre;
            this.input.servicio.precio = item.precio;

        },

        changeProductoBuscar: function(){

            if (this.input.producto.picked == 'todo') {
                 this.input.producto.buscar = '';
                 this.disabled = 1;
            }

            if (this.input.producto.picked == 'codigo') {
                 this.input.producto.buscar = '';
                 this.disabled = 0;
            }

            if (this.input.producto.picked == 'nombre') {
                this.input.producto.buscar = '';
                this.disabled = 0;
            }
        },

        changeServicioBuscar: function(){

            if (this.input.servicio.picked == 'todo') {
                 this.input.servicio.buscar = '';
                 this.disabledServicio = 1;
            }

            if (this.input.servicio.picked == 'codigo') {
                 this.input.servicio.buscar = '';
                 this.disabledServicio = 0;
            }

            if (this.input.servicio.picked == 'nombre') {
                this.input.servicio.buscar = '';
                this.disabledServicio = 0;
            }
        },

        buscarServicio: function(){
            //Buscar Alimento
            if (this.input.servicio.categoria == 'equipos') {
                if (this.input.servicio.picked == 'todo') {

                    this.getListEquipos();

                }else if (this.input.servicio.picked == 'codigo') {

                    this.getBuscarCodigoEquipo();

                }else if (this.input.servicio.picked == 'nombre') {

                    this.getBuscarNombreEquipo();

                }
            }
        },

        buscarProducto: function(){

            //Buscar Alimento
            if (this.input.producto.categoria == 'alimentos') {
                if (this.input.producto.picked == 'todo') {

                    this.getListAlimentos();

                }else if (this.input.producto.picked == 'codigo') {

                    this.getBuscarCodigoAlimento();

                }else if (this.input.producto.picked == 'nombre') {

                    this.getBuscarNombreAlimento();

                }
            }

            //Buscar Bebida
            if (this.input.producto.categoria == 'bebidas') {
                if (this.input.producto.picked == 'todo') {

                    this.getListBebidas();

                }else if (this.input.producto.picked == 'codigo') {

                    this.getBuscarCodigoBebida();

                }else if (this.input.producto.picked == 'nombre') {

                    this.getBuscarNombreBebida();

                }
            }

            //Buscar Material
            if (this.input.producto.categoria == 'materiales') {
                if (this.input.producto.picked == 'todo') {

                    this.getListMateriales();

                }else if (this.input.producto.picked == 'codigo') {

                    this.getBuscarCodigoMaterial();

                }else if (this.input.producto.picked == 'nombre') {

                    this.getBuscarNombreMaterial();

                }
            }

        },

    },

});
