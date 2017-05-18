Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

new Vue({

    el: '#app',

    data:{

        formEvento: {
            categoria: '',
            codigo: '',
            nombre: '',
            precio: '',
            tipo: '',
        },

        formProducto: {
            categoria: '',
            codigo: '',
            nombre: '',
            precio: '',
        },

        formEventoDelete: {
            id: '',
            nombre: '',
        },

        formProductoDelete: {
            id: '',
            nombre: '',
        },

        formEventoEdit: {
            id: '',
            codigo: '',
            nombre: '',
            precio: '',
            tipo: '',
            existe: false,
        },

        formProductoEdit: {
            id: '',
            codigo: '',
            nombre: '',
            precio: '',
            tipo: '',
            existe: false,
        },

        formEventoBuscar: {
            picked: 'todo',
            text: '',
        },

        formProductoBuscar: {
            picked: 'todo',
            text: '',
        },

        evento: {
            codigoEvento: '',
            listEvento: [],
        },

        salon: {
            codigoSalon: '',
            listSalon: [],
        },

        montaje: {
            codigoMontaje: '',
            listMontaje: [],
        },

        alimento: {
            codigoAlimento: '',
            listAlimento: [],
        },

        bebida: {
            codigoBebida: '',
            listBebida: [],
        },

        material: {
            codigoMaterial: '',
            listMaterial: [],
        },

        mensajeEvento: {
            success: false,
            type: '',
            title: '',
        },

        mensajeProducto: {
            success: false,
            type: '',
            title: '',
        },

        loading: {
            mainVisible: '',
            progressVisible: '',
        },

    },

    computed: {

        //Montrar Mensaje Tab Evento
        mostrarMensajeEvento: function(){
            return this.mensajeEvento.success;
        },

        //Montrar Mensaje Tab Producto
        mostrarMensajeProducto: function(){
            return this.mensajeProducto.success;
        },

        //Mostrar Boton Tab Evento
        showButtonEvento: function(){
            if (this.formEvento.categoria == 'evento') {
                if (this.formEvento.nombre != '') {
                    return true;
                }else{
                    return false;
                }
            }else if (this.formEvento.categoria == 'salones') {
                if (this.formEvento.nombre != '' && this.formEvento.precio != '') {
                    return true;
                }else{
                    return false;
                }
            }else if (this.formEvento.categoria == 'montaje') {
                if (this.formEvento.nombre != '' && this.formEvento.precio != '' && this.formEvento.tipo != '') {
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        },

        //Mostrar Boton Tab Prodcuto
        showButtonProducto: function(){
            if (this.formProducto.categoria == 'alimento') {
                if (this.formProducto.nombre != '' && this.formProducto.precio != '') {
                    return true;
                }else{
                    return false;
                }
            }else if (this.formProducto.categoria == 'bebida') {
                if (this.formProducto.nombre != '' && this.formProducto.precio != '') {
                    return true;
                }else{
                    return false;
                }
            }else if (this.formProducto.categoria == 'material') {
                if (this.formProducto.nombre != '' && this.formProducto.precio != '' && this.formProducto.tipo != '') {
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        },

        //Disabled Codigo Tab Evento
        disabledCodigo: function(){
            if (this.formEvento.categoria == 'evento' || this.formEvento.categoria == 'salones' || this.formEvento.categoria == 'montaje') {
                return true;
            }else{
                return false;
            }
        },

        //Disabled Codigo Tab Producto
        disabledCodigoProducto: function(){
            if (this.formProducto.categoria == 'alimento' || this.formProducto.categoria == 'bebida' || this.formProducto.categoria == 'material') {
                return true;
            }else{
                return false;
            }
        },

        disabledPrecio: function(){
            if (this.formEvento.categoria == 'evento') {
                return true;
            }else{
                return false;
            }
        },

        disabledTipo: function(){
            if (this.formEvento.categoria == 'evento' || this.formEvento.categoria == 'salones') {
                return true;
            }else{
                return false;
            }
        },
    },

    mounted: function(){
        this.loading.mainVisible = 'display: block;';
        this.loading.progressVisible = 'display: none;';
    },

    methods: {


        //Codigo Alimento
        getCodigoAlimento: function(){
            this.$http.get('/admin/alimento/autoIncrementoAlimento').then(
                function(response){
                    this.alimento.codigoAlimento = response.data;
                    this.formProducto.codigo = 'CA00' + this.alimento.codigoAlimento;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Alimento
        getListAlimento: function(){
            this.$http.get('/admin/alimento').then(
                function(response){
                    this.alimento.listAlimento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Alimento
        getBuscarCodigoAlimento: function(){
            this.$http.get('/admin/alimento/buscarCodigoAlimento/' + this.formProductoBuscar.text).then(
                function(response){
                    this.alimento.listAlimento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Alimento
        getBuscarNombreAlimento: function(){
            this.$http.get('/admin/alimento/buscarNombreAlimento/' + this.formProductoBuscar.text).then(
                function(response){
                    this.alimento.listAlimento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Codigo Bebida
        getCodigoBebida: function(){
            this.$http.get('/admin/bebida/autoIncrementoBebida').then(
                function(response){
                    this.bebida.codigoBebida = response.data;
                    this.formProducto.codigo = 'CB00' + this.bebida.codigoBebida;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Bebida
        getListBebida: function(){
            this.$http.get('/admin/bebida').then(
                function(response){
                    this.bebida.listBebida = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Bebida
        getBuscarCodigoBebida: function(){
            this.$http.get('/admin/bebida/buscarCodigoBebida/' + this.formProductoBuscar.text).then(
                function(response){
                    this.bebida.listBebida = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Bebida
        getBuscarNombreBebida: function(){
            this.$http.get('/admin/bebida/buscarNombreBebida/' + this.formProductoBuscar.text).then(
                function(response){
                    this.bebida.listBebida = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Codigo Material
        getCodigoMaterial: function(){
            this.$http.get('/admin/material/autoIncrementoMaterial').then(
                function(response){
                    this.material.codigoMaterial = response.data;
                    this.formProducto.codigo = 'CT00' + this.material.codigoMaterial;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Material
        getListBebida: function(){
            this.$http.get('/admin/material').then(
                function(response){
                    this.material.listMaterial = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Material
        getBuscarCodigoMaterial: function(){
            this.$http.get('/admin/material/buscarCodigoMaterial/' + this.formProductoBuscar.text).then(
                function(response){
                    this.material.listMaterial = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Material
        getBuscarNombreMaterial: function(){
            this.$http.get('/admin/material/buscarNombreMaterial/' + this.formProductoBuscar.text).then(
                function(response){
                    this.material.listMaterial = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Codigo Montaje
        getCodigoMontaje: function(){
            this.$http.get('/admin/montaje/autoIncrementoMontaje').then(
                function(response){
                    this.montaje.codigoMontaje = response.data;
                    this.formEvento.codigo = 'CM00' + this.montaje.codigoMontaje;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Montaje
        getListMontaje: function(){
            this.$http.get('/admin/montaje').then(
                function(response){
                    this.montaje.listMontaje = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Montaje
        getBuscarCodigoMontaje: function(){
            this.$http.get('/admin/montaje/buscarCodigoMontaje/' + this.formEventoBuscar.text).then(
                function(response){
                    this.montaje.listMontaje = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Montaje
        getBuscarNombreMontaje: function(){
            this.$http.get('/admin/montaje/buscarNombreMontaje/' + this.formEventoBuscar.text).then(
                function(response){
                    this.montaje.listMontaje = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Codigo Salon
        getCodigoSalon: function(){
            this.$http.get('/admin/salon/autoIncrementoSalon').then(
                function(response){
                    this.salon.codigoSalon = response.data;
                    this.formEvento.codigo = 'CS00' + this.salon.codigoSalon;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Listar Salon
        getListSalon: function(){
            this.$http.get('/admin/salon').then(
                function(response){
                    this.salon.listSalon = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Salon
        getBuscarNombreSalon: function(){
            this.$http.get('/admin/salon/buscarNombreSalon/' + this.formEventoBuscar.text).then(
                function(response){
                    this.salon.listSalon = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Evento
        getBuscarCodigoSalon: function(){
            this.$http.get('/admin/salon/buscarCodigoSalon/' + this.formEventoBuscar.text).then(
                function(response){
                    this.salon.listSalon = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Codigo Evento
        getCodigoEvento: function(){
            this.$http.get('/admin/evento/autoIncrementoEvento').then(
                function(response){
                    this.evento.codigoEvento = response.data;
                    this.formEvento.codigo = 'CV00' + this.evento.codigoEvento;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },


        //Listar Evento
        getListEvento: function(){
            this.$http.get('/admin/evento').then(
                function(response){
                    this.evento.listEvento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Nombre Evento
        getBuscarNombre: function(){
            this.$http.get('/admin/evento/buscarNombreEvento/' + this.formEventoBuscar.text).then(
                function(response){
                    this.evento.listEvento = response.data;

                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //Buscar Codigo Evento
        getBuscarCodigo: function(){
            this.$http.get('/admin/evento/buscarCodigoEvento/' + this.formEventoBuscar.text).then(
                function(response){
                    this.evento.listEvento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },


        //Selector de Tab Evento
        selectEvento: function(){

            if (this.formEvento.categoria == 'evento') {
                this.getCodigoEvento();
                this.getListEvento();
            }else if (this.formEvento.categoria == 'salones') {
                this.getCodigoSalon();
                this.getListSalon();
            }else if (this.formEvento.categoria == 'montaje') {
                this.getCodigoMontaje();
                this.getListMontaje();
            }

        },

        //Selector de Tab Producto
        selectProducto: function(){

            if (this.formProducto.categoria == 'alimento') {
                this.getCodigoAlimento();
                this.getListAlimento();
            }else if (this.formProducto.categoria == 'bebida') {
                this.getCodigoBebida();
                this.getListBebida();
            }else if (this.formProducto.categoria == 'material') {
                this.getCodigoMaterial();
                this.getListMaterial();
            }

        },


        //***************************************
        //Save/Update Evento-Salon-Montaje
        //***************************************
        onSubmitFormEvento: function(){
            //Proceso Evento
            if (this.formEvento.categoria == 'evento') {

                if (this.formEventoEdit.existe) {
                    //========================================
                    //Update Evento
                    //========================================
                    var myData = {
                        id: this.formEventoEdit.id,
                        codigo: this.formEventoEdit.codigo,
                        nombre: this.formEvento.nombre,
                    }
                    this.$http.put('/admin/evento/' + myData.id, myData).then(
                        function(){
                            this.mensajeEvento.success = true;
                            this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                            this.mensajeEvento.title = 'Datos Actualizado';
                            this.formEvento.nombre = '';
                            this.formEvento.codigo = this.getCodigoEvento();
                            this.formEventoEdit.id = '';
                            this.formEventoEdit.codigo = '';
                            this.formEventoEdit.nombre = '';
                            this.formEventoEdit.existe = false;
                            this.getListEvento();
                        },
                        function(){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }else{
                    //========================================
                    //Save Evento
                    //========================================
                    var myData = {
                        codigo: this.formEvento.codigo,
                        nombre: this.formEvento.nombre,
                    }
                    this.$http.post('/admin/evento', myData).then(
                        function(){
                            this.mensajeEvento.success = true;
                            this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                            this.mensajeEvento.title = 'Datos Guardado';
                            this.formEvento.nombre = '';
                            this.formEvento.codigo = this.getCodigoEvento();
                            this.getListEvento();
                        },
                        function(response){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }
            }//Fin Proceso Evento

            //Proceso para Salon
            if (this.formEvento.categoria == 'salones') {

                if (this.formEventoEdit.existe) {
                    //Actualizar Salon
                    var myData = {
                        id: this.formEventoEdit.id,
                        codigo: this.formEventoEdit.codigo,
                        nombre: this.formEvento.nombre,
                        precio: this.formEvento.precio,
                    }
                    this.$http.put('/admin/salon/' + myData.id, myData).then(
                        function(){
                            this.mensajeEvento.success = true;
                            this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                            this.mensajeEvento.title = 'Datos Actualizado';
                            this.formEvento.nombre = '';
                            this.formEvento.precio = '';
                            this.formEvento.codigo = this.getCodigoSalon();
                            this.formEventoEdit.id = '';
                            this.formEventoEdit.codigo = '';
                            this.formEventoEdit.nombre = '';
                            this.formEventoEdit.precio = '';
                            this.formEventoEdit.existe = false;
                            this.getListSalon();
                        },
                        function(){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }else {
                    //Guardar Salon
                    var myData = {
                        codigo: this.formEvento.codigo,
                        categoria: this.formEvento.categoria,
                        nombre: this.formEvento.nombre,
                        precio: this.formEvento.precio,
                    }
                    this.$http.post('/admin/salon', myData).then(
                        function(){
                            this.mensajeEvento.success = true;
                            this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                            this.mensajeEvento.title = 'Datos Guardado';
                            this.formEvento.nombre = '';
                            this.formEvento.precio = '';
                            this.formEvento.codigo = this.getCodigoSalon();
                            this.getListSalon();
                        },
                        function(response){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }

            }//Fin Proceo Salon

            //Proceo Montaje
            if (this.formEvento.categoria == 'montaje') {

                if (this.formEventoEdit.existe){
                     //Actualizar Montaje
                    var myData = {
                        id: this.formEventoEdit.id,
                        codigo: this.formEventoEdit.codigo,
                        nombre: this.formEvento.nombre,
                        precio: this.formEvento.precio,
                        tipo: this.formEvento.tipo,
                    }
                    this.$http.put('/admin/montaje/' + myData.id, myData).then(
                        function(){
                            this.mensajeEvento.success = true;
                            this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                            this.mensajeEvento.title = 'Datos Actualizado';
                            this.formEvento.nombre = '';
                            this.formEvento.precio = '';
                            this.formEvento.codigo = this.getCodigoMontaje();
                            this.formEventoEdit.id = '';
                            this.formEventoEdit.codigo = '';
                            this.formEventoEdit.nombre = '';
                            this.formEventoEdit.precio = '';
                            this.formEventoEdit.existe = false;
                            this.getListMontaje();
                        },
                        function(){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }else{
                    //Guardar Montaje
                    var myData = {
                    codigo: this.formEvento.codigo,
                    categoria: this.formEvento.categoria,
                    nombre: this.formEvento.nombre,
                    precio: this.formEvento.precio,
                    tipo: this.formEvento.tipo,
                }
                this.$http.post('/admin/montaje', myData).then(
                    function(){
                        this.mensajeEvento.success = true;
                        this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                        this.mensajeEvento.title = 'Datos Guardado';
                        this.formEvento.nombre = '';
                        this.formEvento.precio = '';
                        this.formEvento.codigo = this.getCodigoMontaje();
                        this.getListMontaje();
                    },
                    function(response){
                        console.log('RESPONSE ERROR AJAX');
                    });
                }
                
            }//Fin Proceo Montaje

        },

        //***************************************
        //Save/Update Alimento-Bebida-Material
        //***************************************
        onSubmitFormProducto: function(){
            //Proceso Alimento
            if (this.formProducto.categoria == 'alimento') {

                if (this.formProductoEdit.existe) {
                    //========================================
                    //Update Alimento
                    //========================================
                    var myData = {
                        id: this.formProductoEdit.id,
                        codigo: this.formProductoEdit.codigo,
                        nombre: this.formProducto.nombre,
                        precio: this.formProducto.precio,
                    }
                    this.$http.put('/admin/alimento/' + myData.id, myData).then(
                        function(){
                            this.mensajeProducto.success = true;
                            this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                            this.mensajeProducto.title = 'Datos Actualizado';
                            this.formProducto.nombre = '';
                            this.formProducto.precio = '';
                            this.formProducto.codigo = this.getCodigoAlimento();
                            this.formProductoEdit.id = '';
                            this.formProductoEdit.codigo = '';
                            this.formProductoEdit.nombre = '';
                            this.formProductoEdit.precio = '';
                            this.formProductoEdit.existe = false;
                            this.getListAlimento();
                        },
                        function(){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }else{
                    //========================================
                    //Save Alimento
                    //========================================
                    var myData = {
                        codigo: this.formProducto.codigo,
                        categoria: this.formProducto.categoria,
                        nombre: this.formProducto.nombre,
                        precio: this.formProducto.precio,
                    }
                    this.$http.post('/admin/alimento', myData).then(
                        function(){
                            this.mensajeProducto.success = true;
                            this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                            this.mensajeProducto.title = 'Datos Guardado';
                            this.formProducto.nombre = '';
                            this.formProducto.precio = '';
                            this.formProducto.codigo = this.getCodigoAlimento();
                            this.getListAlimento();
                        },
                        function(response){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }
            }//Fin Proceso Alimento

            //Proceso Bebida
            if (this.formProducto.categoria == 'bebida') {

                if (this.formProductoEdit.existe) {
                    //========================================
                    //Update Bebida
                    //========================================
                    var myData = {
                        id: this.formProductoEdit.id,
                        codigo: this.formProductoEdit.codigo,
                        nombre: this.formProducto.nombre,
                        precio: this.formProducto.precio,
                    }
                    this.$http.put('/admin/bebida/' + myData.id, myData).then(
                        function(){
                            this.mensajeProducto.success = true;
                            this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                            this.mensajeProducto.title = 'Datos Actualizado';
                            this.formProducto.nombre = '';
                            this.formProducto.precio = '';
                            this.formProducto.codigo = this.getCodigoBebida();
                            this.formProductoEdit.id = '';
                            this.formProductoEdit.codigo = '';
                            this.formProductoEdit.nombre = '';
                            this.formProductoEdit.precio = '';
                            this.formProductoEdit.existe = false;
                            this.getListBebida();
                        },
                        function(){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }else{
                    //========================================
                    //Save Bebida
                    //========================================
                    var myData = {
                        codigo: this.formProducto.codigo,
                        categoria: this.formProducto.categoria,
                        nombre: this.formProducto.nombre,
                        precio: this.formProducto.precio,
                    }
                    this.$http.post('/admin/bebida', myData).then(
                        function(){
                            this.mensajeProducto.success = true;
                            this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                            this.mensajeProducto.title = 'Datos Guardado';
                            this.formProducto.nombre = '';
                            this.formProducto.precio = '';
                            this.formProducto.codigo = this.getCodigoBebida();
                            this.getListBebida();
                        },
                        function(response){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }
            }//Fin Proceso Bebida
            
            //Proceso Material
            if (this.formProducto.categoria == 'material') {

                if (this.formProductoEdit.existe) {
                    //========================================
                    //Update Material
                    //========================================
                    var myData = {
                        id: this.formProductoEdit.id,
                        codigo: this.formProductoEdit.codigo,
                        nombre: this.formProducto.nombre,
                        precio: this.formProducto.precio,
                    }
                    this.$http.put('/admin/material/' + myData.id, myData).then(
                        function(){
                            this.mensajeProducto.success = true;
                            this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                            this.mensajeProducto.title = 'Datos Actualizado';
                            this.formProducto.nombre = '';
                            this.formProducto.precio = '';
                            this.formProducto.codigo = this.getCodigoMaterial();
                            this.formProductoEdit.id = '';
                            this.formProductoEdit.codigo = '';
                            this.formProductoEdit.nombre = '';
                            this.formProductoEdit.precio = '';
                            this.formProductoEdit.existe = false;
                            this.getListMaterial();
                        },
                        function(){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }else{
                    //========================================
                    //Save Material
                    //========================================
                    var myData = {
                        codigo: this.formProducto.codigo,
                        categoria: this.formProducto.categoria,
                        nombre: this.formProducto.nombre,
                        precio: this.formProducto.precio,
                    }
                    this.$http.post('/admin/material', myData).then(
                        function(){
                            this.mensajeProducto.success = true;
                            this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                            this.mensajeProducto.title = 'Datos Guardado';
                            this.formProducto.nombre = '';
                            this.formProducto.precio = '';
                            this.formProducto.codigo = this.getCodigoMaterial();
                            this.getListMaterial();
                        },
                        function(response){
                            console.log('RESPONSE ERROR AJAX');
                        });
                }
            }//Fin Proceso Alimento

        },

        //**************
        //Edit Evento
        //**************
        eventoEdit: function(item){
            //Editar Evento
            if (this.formEvento.categoria == 'evento') {
                this.formEventoEdit.id = item.id;
                this.formEventoEdit.codigo = item.codigoevento;
                this.formEventoEdit.nombre = item.nombre;
                this.$http.get('/admin/evento/' + this.formEventoEdit.id + '/edit').then(
                    function(response){
                        if (response.data.existe) {
                            this.formEventoEdit.existe = true;
                            this.formEvento.codigo = this.formEventoEdit.codigo;
                            this.formEvento.nombre = this.formEventoEdit.nombre;
                        }else{
                            this.formEventoEdit.existe = false;
                        }
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }


            //Editar Salon
            if (this.formEvento.categoria == 'salones') {
                this.formEventoEdit.id = item.id;
                this.formEventoEdit.codigo = item.codigops;
                this.formEventoEdit.nombre = item.nombre;
                this.formEventoEdit.precio = item.precio;
                this.$http.get('/admin/salon/' + this.formEventoEdit.id + '/edit').then(
                    function(response){
                        if (response.data.existe) {
                            this.formEventoEdit.existe = true;
                            this.formEvento.codigo = this.formEventoEdit.codigo;
                            this.formEvento.nombre = this.formEventoEdit.nombre;
                            this.formEvento.precio = this.formEventoEdit.precio;
                        }else{
                            this.formEventoEdit.existe = false;
                        }
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

            //Editar Montaje
            if (this.formEvento.categoria == 'montaje') {
                this.formEventoEdit.id = item.id;
                this.formEventoEdit.codigo = item.codigops;
                this.formEventoEdit.nombre = item.nombre;
                this.formEventoEdit.precio = item.precio;
                this.formEventoEdit.tipo = item.tipo_montajes[0].tipomontaje;
                this.$http.get('/admin/salon/' + this.formEventoEdit.id + '/edit').then(
                    function(response){
                        if (response.data.existe) {
                            this.formEventoEdit.existe = true;
                            this.formEvento.codigo = this.formEventoEdit.codigo;
                            this.formEvento.nombre = this.formEventoEdit.nombre;
                            this.formEvento.precio = this.formEventoEdit.precio;
                            this.formEvento.tipo = this.formEventoEdit.tipo;
                        }else{
                            this.formEventoEdit.existe = false;
                        }
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }
        },

                //**************
        //Edit Evento
        //**************
        eventoEdit: function(item){
            
            //Editar Alimento
            if (this.formProducto.categoria == 'alimento') {
                this.formProductoEdit.id = item.id;
                this.formProductoEdit.codigo = item.codigops;
                this.formProductoEdit.nombre = item.nombre;
                this.formProductoEdit.precio = item.precio;
                this.$http.get('/admin/alimento/' + this.formProductoEdit.id + '/edit').then(
                    function(response){
                        if (response.data.existe) {
                            this.formProductoEdit.existe = true;
                            this.formProducto.codigo = this.formProductoEdit.codigo;
                            this.formProducto.nombre = this.formProductoEdit.nombre;
                            this.formProducto.precio = this.formProductoEdit.precio;
                        }else{
                            this.formProductoEdit.existe = false;
                        }
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

            //Editar Bebida
            if (this.formProducto.categoria == 'bebida') {
                this.formProductoEdit.id = item.id;
                this.formProductoEdit.codigo = item.codigops;
                this.formProductoEdit.nombre = item.nombre;
                this.formProductoEdit.precio = item.precio;
                this.$http.get('/admin/bebida/' + this.formProductoEdit.id + '/edit').then(
                    function(response){
                        if (response.data.existe) {
                            this.formProductoEdit.existe = true;
                            this.formProducto.codigo = this.formProductoEdit.codigo;
                            this.formProducto.nombre = this.formProductoEdit.nombre;
                            this.formProducto.precio = this.formProductoEdit.precio;
                        }else{
                            this.formProductoEdit.existe = false;
                        }
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

            //Editar Material
            if (this.formProducto.categoria == 'material') {
                this.formProductoEdit.id = item.id;
                this.formProductoEdit.codigo = item.codigops;
                this.formProductoEdit.nombre = item.nombre;
                this.formProductoEdit.precio = item.precio;
                this.$http.get('/admin/material/' + this.formProductoEdit.id + '/edit').then(
                    function(response){
                        if (response.data.existe) {
                            this.formProductoEdit.existe = true;
                            this.formProducto.codigo = this.formProductoEdit.codigo;
                            this.formProducto.nombre = this.formProductoEdit.nombre;
                            this.formProducto.precio = this.formProductoEdit.precio;
                        }else{
                            this.formProductoEdit.existe = false;
                        }
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

           
        },

        //**********************
        //Destroy Tab Evento
        //**********************
        onSubmitFormEventoDestroy: function(){
            //Eliminar Evento
            if (this.formEvento.categoria == 'evento') {
                var getId = this.formEventoDelete.id;
                this.$http.delete('/admin/evento/' + getId).then(
                    function(){
                        this.mensajeEvento.success = true;
                        this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                        this.mensajeEvento.title = 'Datos Eliminado';
                        this.formEventoDelete.id = '';
                        this.formEventoDelete.nombre = '';
                        this.getCodigoEvento();
                        this.getListEvento();
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

            //Eliminar Salon
            if (this.formEvento.categoria == 'salones') {
                var getId = this.formEventoDelete.id;
                this.$http.delete('/admin/salon/' + getId).then(
                    function(){
                        this.mensajeEvento.success = true;
                        this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                        this.mensajeEvento.title = 'Datos Eliminado';
                        this.formEventoDelete.id = '';
                        this.formEventoDelete.nombre = '';
                        this.getCodigoSalon();
                        this.getListSalon();
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

            //Eliminar Montaje
            if (this.formEvento.categoria == 'montaje') {
                var getId = this.formEventoDelete.id;
                this.$http.delete('/admin/montaje/' + getId).then(
                    function(){
                        this.mensajeEvento.success = true;
                        this.mensajeEvento.type = 'alert alert-success alert-dismissable';
                        this.mensajeEvento.title = 'Datos Eliminado';
                        this.formEventoDelete.id = '';
                        this.formEventoDelete.nombre = '';
                        this.getCodigoMontaje();
                        this.getListMontaje();
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }
        },

        //**********************
        //Destroy Tab Producto
        //**********************
        onSubmitFormProductoDestroy: function(){
            
            //Eliminar Alimento
            if (this.formProducto.categoria == 'alimento') {
                var getId = this.formProductoDelete.id;
                this.$http.delete('/admin/alimento/' + getId).then(
                    function(){
                        this.mensajeProducto.success = true;
                        this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                        this.mensajeProducto.title = 'Datos Eliminado';
                        this.formProductoDelete.id = '';
                        this.formProductoDelete.nombre = '';
                        this.getCodigoAlimento();
                        this.getListAlimento();
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

             //Eliminar Bebida
            if (this.formProducto.categoria == 'bebida') {
                var getId = this.formProductoDelete.id;
                this.$http.delete('/admin/bebida/' + getId).then(
                    function(){
                        this.mensajeProducto.success = true;
                        this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                        this.mensajeProducto.title = 'Datos Eliminado';
                        this.formProductoDelete.id = '';
                        this.formProductoDelete.nombre = '';
                        this.getCodigoBebida();
                        this.getListBebida();
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

             //Eliminar Material
            if (this.formProducto.categoria == 'material') {
                var getId = this.formProductoDelete.id;
                this.$http.delete('/admin/material/' + getId).then(
                    function(){
                        this.mensajeProducto.success = true;
                        this.mensajeProducto.type = 'alert alert-success alert-dismissable';
                        this.mensajeProducto.title = 'Datos Eliminado';
                        this.formProductoDelete.id = '';
                        this.formProductoDelete.nombre = '';
                        this.getCodigoMaterial();
                        this.getListMaterial();
                    },
                    function(){
                        console.log('RESPONSE ERROR AJAX');
                    });
            }

        },

        //Delete Evento/Salon/Montaje
        eventoDelete: function(id, nombre){
            this.formEventoDelete.id = id;
            this.formEventoDelete.nombre = nombre;
        },

        //Delete Alimento/Bebida/Material
        eventoDeleteProducto: function(id, nombre){
            this.formProductoDelete.id = id;
            this.formProductoDelete.nombre = nombre;
        },

        //Buscar Tab Evento
        onSubmitFormEventoBuscar: function(){
            //Buscar Evento
            if (this.formEvento.categoria == 'evento') {
                if (this.formEventoBuscar.picked == 'todo') {

                    this.getListEvento();

                }else if (this.formEventoBuscar.picked == 'codigo') {

                    this.getBuscarCodigo();

                }else if (this.formEventoBuscar.picked == 'nombre') {

                    this.getBuscarNombre();

                }
            }
            //Buscar Salon
            if (this.formEvento.categoria == 'salones') {
                if (this.formEventoBuscar.picked == 'todo') {

                    this.getListSalon();

                }else if (this.formEventoBuscar.picked == 'codigo') {

                    this.getBuscarCodigoSalon();

                }else if (this.formEventoBuscar.picked == 'nombre') {

                    this.getBuscarNombreSalon();

                }
            }
            //Buscar Montaje
            if (this.formEvento.categoria == 'montaje') {
                if (this.formEventoBuscar.picked == 'todo') {

                    this.getListMontaje();

                }else if (this.formEventoBuscar.picked == 'codigo') {

                    this.getBuscarCodigoMontaje();

                }else if (this.formEventoBuscar.picked == 'nombre') {

                    this.getBuscarNombreMontaje();

                }
            }
        },

        //Buscar Tab Producto
        onSubmitFormProductoBuscar: function(){
            
            //Buscar Alimento
            if (this.formProducto.categoria == 'alimento') {
                if (this.formProductoBuscar.picked == 'todo') {

                    this.getListAlimento();

                }else if (this.formProductoBuscar.picked == 'codigo') {

                    this.getBuscarCodigoAlimento();

                }else if (this.formProductoBuscar.picked == 'nombre') {

                    this.getBuscarNombreAlimento();

                }
            }

            //Buscar Bebida
            if (this.formProducto.categoria == 'bebida') {
                if (this.formProductoBuscar.picked == 'todo') {

                    this.getListBebida();

                }else if (this.formProductoBuscar.picked == 'codigo') {

                    this.getBuscarCodigoBebida();

                }else if (this.formProductoBuscar.picked == 'nombre') {

                    this.getBuscarNombreBebida();

                }
            }

            //Buscar Material
            if (this.formProducto.categoria == 'material') {
                if (this.formProductoBuscar.picked == 'todo') {

                    this.getListMaterial();

                }else if (this.formProductoBuscar.picked == 'codigo') {

                    this.getBuscarCodigoMaterial();

                }else if (this.formProductoBuscar.picked == 'nombre') {

                    this.getBuscarNombreMaterial();

                }
            }
           
        },

        //Cerrar Mensaje Tab Evento
        cerrarMensajeEvento: function(){
            this.mensajeEvento.success = false;
            this.mensajeEvento.type = '';
            this.mensajeEvento.title = '';
        },

        //Cerrar Mensaje Tab Producto
        cerrarMensajeProducto: function(){
            this.mensajeProducto.success = false;
            this.mensajeProducto.type = '';
            this.mensajeProducto.title = '';
        },

    },
});
