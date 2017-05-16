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
                if (this.formEvento.nombre != '' && this.formEvento.precio != '') {
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

        //***************************
        //Proceso para Eventos START
        //***************************
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

        getListEvento: function(){
            this.$http.get('/admin/evento').then(
                function(response){
                    this.evento.listEvento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        getBuscarNombre: function(){
            this.$http.get('/admin/evento/buscarNombreEvento/' + this.formEventoBuscar.text).then(
                function(response){
                    this.evento.listEvento = response.data;

                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        getBuscarCodigo: function(){
            this.$http.get('/admin/evento/buscarCodigoEvento/' + this.formEventoBuscar.text).then(
                function(response){
                    this.evento.listEvento = response.data;
                },
                function(){
                    console.log('RESPONSE ERROR AJAX');
                });
        },

        //*************************
        //Proceso para Eventos END
        //*************************

        selectEvento: function(){
            this.getCodigoEvento();
            this.getListEvento();
        },


        //***************************************
        //Save/Update Evento
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


            }


        },

        //**************
        //Edit Evento
        //**************
        eventoEdit: function(item){

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
        },

        //**********************
        //Destroy Evento
        //**********************
        onSubmitFormEventoDestroy: function(){
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
        },

        //Delete Evento
        eventoDelete: function(id, nombre){
            this.formEventoDelete.id = id;
            this.formEventoDelete.nombre = nombre;
        },

        //Buscar Evento
        onSubmitFormEventoBuscar: function(){
            if (this.formEvento.categoria == 'evento') {
                if (this.formEventoBuscar.picked == 'todo') {

                    this.getListEvento();

                }else if (this.formEventoBuscar.picked == 'codigo') {

                    this.getBuscarCodigo();

                }else if (this.formEventoBuscar.picked == 'nombre') {
                    console.log('Nombre');
                    this.getBuscarNombre();

                }
            }
        },

        cerrarMensajeEvento: function(){
            this.mensajeEvento.success = false;
            this.mensajeEvento.type = '';
            this.mensajeEvento.title = '';
        },



    },
});
