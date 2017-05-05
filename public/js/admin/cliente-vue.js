Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({

    el: '#app',

    data:{
        'myData': {
            id: '',
            cedula_rif: '',
            nombre: '',
            domicilio: '',
            telefono: '',
            fax: '',
            email: '',
            tipo_cte: 'contado',
            contacto_c1: '',
            cargo_dpto_c1: '',
            telefono_c1: '',
            contacto_c2: '',
            cargo_dpto_c2: '',
            telefono_c2: '',
        },

        msjSuccess: false,

        formErrors: {},

        result: {},

        buscar: '',

        existeCliente: false,

        css : {
            mainVisible: '',
            progressVisible: '',
            ajaxProcesoVisible: 'display: none;',
        },

        buttonDelete: {
            modo: 'btn btn-danger disabled',
            modal: '',
        },

        buttonBuscar: {
            active: 'btn btn-success',
            disabled: 'btn btn-success disabled',
            submit: 'submit',
            button: 'button',
        },

        mensaje: {
            type: '',
            title: '',
        },

    },

    computed: {
        mostrarMensaje: function(){
            return this.msjSuccess;
        },

        buttonBuscarActive: function(){
            return this.buscar != '';
        },
    },

    mounted: function(){
        this.css.mainVisible = 'display: block;';
        this.css.progressVisible = 'display: none;';
    },

    methods:{

        onSubmitForm: function(){
            this.css.ajaxProcesoVisible = 'display: block;';
            var getData = this.myData;
            if (this.existeCliente) {
                //Actualizar registro
                this.$http.put('/admin/cliente/' + this.myData.id, getData).then(
                    function(){
                        this.mensaje.type = 'alert alert-success alert-dismissable';
                        this.mensaje.title = 'Datos Guardado';
                        this.msjSuccess = true;
                        this.cleanData();
                        this.existeCliente = false;
                        this.css.ajaxProcesoVisible = 'display: none;';
                        this.buttonDelete.modo = "btn btn-danger disabled";
                    },
                    function(response){
                        this.msjSuccess = false;
                        this.mensaje.type = '';
                        this.formErrors = response.data;
                        this.existeCliente = false;
                        this.css.ajaxProcesoVisible = 'display: none;';
                        this.buttonDelete.modo = "btn btn-danger disabled";
                });
            }else{
                //Nuevo Registro
                this.$http.post('/admin/cliente', getData).then(
                    function(){
                        this.msjSuccess = true;
                        this.mensaje.type = 'alert alert-success alert-dismissable';
                        this.mensaje.title = 'Datos Guardado';
                        this.cleanData();
                        this.css.ajaxProcesoVisible = 'display: none;';
                    },
                    function(response){
                        this.msjSuccess = false;
                        this.mensaje.type = '';
                        this.formErrors = response.data;
                        this.css.ajaxProcesoVisible = 'display: none;';
                });
            }
        },

        onSubmitFormDelete: function(){
            this.css.ajaxProcesoVisible = 'display: block;';
            var getId = this.myData.id;
            this.$http.delete('/admin/cliente/' + getId).then(
                function(){
                    this.msjSuccess = true;
                    this.mensaje.type = 'alert alert-success alert-dismissable';
                    this.mensaje.title = 'Datos Eliminado';
                    this.cleanData();
                    this.existeCliente = false;
                    this.css.ajaxProcesoVisible = 'display: none;';
                },
                function(response){
                    this.msjSuccess = false;
                    this.mensaje.type = '';
                    console.log(response);
                    this.existeCliente = false;
                    this.css.ajaxProcesoVisible = 'display: none;';
                });
        },

        buscarCliente: function(){
            this.css.ajaxProcesoVisible = 'display: block;';
            this.$http.get('/admin/cliente/buscar/' + this.buscar).then(
                function(response){
                    var getResponse = response.data;
                    if (getResponse) {
                        this.result = response.data;
                        this.asignarValores(this.result);
                        this.existeCliente = true;
                        this.css.ajaxProcesoVisible = 'display: none;';
                        this.buttonDelete.modo = 'btn btn-danger';
                        this.buttonDelete.modal = '#modal-delete-customer'
                    }else{
                        this.msjSuccess = true;
                        this.mensaje.type = 'alert alert-warning alert-dismissable';
                        this.mensaje.title = 'Datos No Encontrado';
                    }
                },
                function(response){
                    console.log(response.data);
                    this.css.ajaxProcesoVisible = 'display: none;';
                });

        },

        asignarValores: function(item){
            //Cusmoter Data
            this.myData.id = item.id;
            this.myData.cedula_rif = item.cedula_rif;
            this.myData.nombre = item.nombre;
            this.myData.domicilio = item.domicilio;
            this.myData.telefono = item.telefono;
            this.myData.fax = item.fax;
            this.myData.email = item.email;
            this.myData.tipo_cte = item.tipo_cte;
            //Contact Data
            this.myData.contacto_c1 = item.contact.contacto_c1;
            this.myData.cargo_dpto_c1 = item.contact.cargo_dpto_c1;
            this.myData.telefono_c1 = item.contact.telefono_c1;
            this.myData.contacto_c2 = item.contact.contacto_c2;
            this.myData.cargo_dpto_c2 = item.contact.cargo_dpto_c2;
            this.myData.telefono_c2 = item.contact.telefono_c2;
        },

        cleanData: function(){
            this.myData = {
                id: '', cedula_rif: '', nombre: '', domicilio: '',
                telefono: '', fax: '', email: '', tipo_cte: 'contado',
                contacto_c1: '', cargo_dpto_c1: '', telefono_c1: '',
                contacto_c2: '', cargo_dpto_c2: '', telefono_c2: '',
            };

            this.buscar = '';

            this.existeCliente = false;

            this.buttonDelete.modo = "btn btn-danger disabled";

            this.buttonDelete.modal = '';

            this.result = {};

        },

        cerrarMensaje: function(){
            this.msjSuccess = false;

        },
    }


});
