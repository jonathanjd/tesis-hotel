@extends('layouts.app')
@section('title', 'Crear Cliente')
@section('style')
    {!! Html::style('css/parsley.css') !!}
@endsection
@section('title-section','Crear Cliente')
@section('content')

<div class="container">

    <!-- Formulario para Buscar Clientes -->
    <div>
        {!! Form::open(['method' => 'POST', 'class' => 'form-horizonta well', 'data-parsley-validate' => '']) !!}
        <fieldset>
            <legend>Buscar Clientes</legend>
            <div>
                <div class="col-md-10">
                    <input class="form-control" type="text" name="" value="" required="" maxlength="25">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-success" type="button" name="button">Buscar</button>
                </div>
            </div>
        </fieldset>
        {!! Form::close() !!}
    </div>

    <!-- Formulario Clientes -->
    <div>
        {!! Form::open(['route' => 'cliente.store', 'method' => 'POST', 'class' => 'form-horizonta well', 'data-parsley-validate' => '']) !!}
        <fieldset>

            <legend>Datos del Clientes</legend>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cedula_cte">Cedula</label>
                    <input type="text" class="form-control" v-model="myData.cedula_cte" name="cedula_cte" value="" required maxlength="15">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" v-model="myData.nombre" name="nombre" value="" required maxlength="25">
                </div>

                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" v-model="myData.domicilio" name="domicilio" value="" required maxlength="25">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" v-model="myData.telefono" name="telefono" value="" required maxlength="15">
                </div>

                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" class="form-control" v-model="myData.fax" name="fax" value="" required maxlength="15">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" v-model="myData.email" name="email" value="" required maxlength="25">
                </div>
            </div>

            <div class="col-md-12 text-center form-group">
                <h3>Tipo de Cliente</h3>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="contado" v-model="myData.tipo_cte" checked> Contado
                </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" value="credito" v-model="myData.tipo_cte"> Credito
                </label>
            </div>

            <legend>Información de Contacto</legend>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="contacto_c1">Contacto 1</label>
                    <input type="text" class="form-control" v-model="myData.contacto_c1" name="contacto_c1" value="" required maxlength="25">
                </div>

                <div class="form-group">
                    <label for="cargo_dpto_c1">Cargo Departamento 1</label>
                    <input type="text" class="form-control" v-model="myData.cargo_dpto_c1" name="cargo_dpto_c1" value="" required maxlength="25">
                </div>

                <div class="form-group">
                    <label for="telefono_c1">Teléfono 1</label>
                    <input type="text" class="form-control" v-model="myData.telefono_c1" name="telefono_c1" value="" required maxlength="15">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="contacto_c2">Contacto 2</label>
                    <input type="text" class="form-control" v-model="myData.contacto_c2" name="contacto_c2" value="" maxlength="25">
                </div>

                <div class="form-group">
                    <label for="cargo_dpto_c2">Cargo Departamento 2</label>
                    <input type="text" class="form-control" v-model="myData.cargo_dpto_c2" name="cargo_dpto_c2" value="" maxlength="25">
                </div>

                <div class="form-group">
                    <label for="telefono_c2">Teléfono 2</label>
                    <input type="text" class="form-control" v-model="myData.telefono_c2" name="telefono_c2" value="" maxlength="15">
                </div>
            </div>

            <div class="form-group col-md-6">
                <button class="btn btn-success" type="submit" name="button">Guardar</button>
                <button class="btn btn-danger disabled" type="submit" name="button">Eliminar</button>
            </div>

        </fieldset>
        {!! Form::close() !!}
    </div>

    <pre>
        @{{ $data }}
    </pre>
</div>

@endsection
@section('script')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/vue.js') !!}
    {!! Html::script('js/vue-resource.js') !!}
    {!! Html::script('js/admin/cliente-vue.js') !!}
@endsection
