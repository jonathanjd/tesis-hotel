Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({

    el: '#app',

    data:{
        'myData': {
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
    },

    computed: {
        mostrarMensaje: function(){
            return this.msjSuccess;
        },
    },

    methods:{

        onSubmitForm: function(){
            var getData = this.myData;
            this.$http.post('/admin/cliente', getData).then(
                function(){
                    this.msjSuccess = true;
                    this.cleanData();
                },
                function(response){
                    this.msjSuccess = false;
                    this.formErrors = response.data;
            });
        },

        buscarCliente: function(){
            this.$http.get('/admin/cliente/buscar/' + this.buscar).then(
                function(response){
                    this.result = response.data;
                    this.asignarValores(this.result);
                },
                function(response){
                    console.log(response.data);
                });

        },

        asignarValores: function(item){
            //Cusmoter Data
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
                cedula_rif: '', nombre: '', domicilio: '',
                telefono: '', fax: '', email: '', tipo_cte: 'contado',
                contacto_c1: '', cargo_dpto_c1: '', telefono_c1: '',
                contacto_c2: '', cargo_dpto_c2: '', telefono_c2: '',
            };

        },

        cerrarMensaje: function(){
            this.msjSuccess = false;

        },
    }


});
