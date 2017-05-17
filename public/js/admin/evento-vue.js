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

        formEventoDelete: {
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

        formEventoBuscar: {
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

        mensajeEvento: {
            success: false,
            type: '',
            title: '',
        },


    },

    computed: {

        mostrarMensajeEvento: function(){
            return this.mensajeEvento.success;
        },

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

        disabledCodigo: function(){
            if (this.formEvento.categoria == 'evento' || this.formEvento.categoria == 'salones' || this.formEvento.categoria == 'montaje') {
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

    methods: {


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

        //Buscar Codigo Montaje
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


        //Selector de Tabs Evento
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

        //**********************
        //Destroy Evento
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

        //Delete Evento/Salon/Montaje
        eventoDelete: function(id, nombre){
            this.formEventoDelete.id = id;
            this.formEventoDelete.nombre = nombre;
        },

        //Buscar
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

        //Cerrar Mensaje
        cerrarMensajeEvento: function(){
            this.mensajeEvento.success = false;
            this.mensajeEvento.type = '';
            this.mensajeEvento.title = '';
        },



    },
});
