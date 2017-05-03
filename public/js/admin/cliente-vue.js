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
