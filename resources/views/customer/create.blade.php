@extends('layouts.app')
@section('title', 'Crear Cliente')
@section('content')

<div class="container">
    <h3 class="text-center text-title-primary">Crear Cliente</h3>

    <div>
        {!! Form::open(['route' => 'cliente.store', 'method' => 'POST', 'class' => 'form-horizonta well']) !!}
        <fieldset>

            <legend>Datos del Clientes</legend>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="cedula_cte">Cedula</label>
                    <input type="text" class="form-control" name="cedula_cte" value="">
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="">
                </div>

                <div class="form-group">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" class="form-control" name="domicilio" value="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefono">Teléfono</label>
                    <input type="text" class="form-control" name="telefono" value="">
                </div>

                <div class="form-group">
                    <label for="fax">Fax</label>
                    <input type="text" class="form-control" name="fax" value="">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" value="">
                </div>
            </div>

            <div class="col-md-12 text-center form-group">
                <h3>Tipo de Cliente</h3>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" id="inlineRadio1" value="contado"> Contado
                </label>
                <label class="radio-inline">
                  <input type="radio" name="tipo_cte" id="inlineRadio2" value="credito"> Credito
                </label>
            </div>

            <legend>Información de Contacto</legend>


            <div class="col-md-6">
                <div class="form-group">
                    <label for="contacto_c1">Contacto 1</label>
                    <input type="text" class="form-control" name="contacto_c1" value="">
                </div>

                <div class="form-group">
                    <label for="cargo_dpto_c1">Cargo Departamento 1</label>
                    <input type="text" class="form-control" name="cargo_dpto_c1" value="">
                </div>

                <div class="form-group">
                    <label for="telefono_c1">Teléfono 1</label>
                    <input type="text" class="form-control" name="telefono_c1" value="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="contacto_c2">Contacto 2</label>
                    <input type="text" class="form-control" name="contacto_c2" value="">
                </div>

                <div class="form-group">
                    <label for="cargo_dpto_c2">Cargo Departamento 2</label>
                    <input type="text" class="form-control" name="cargo_dpto_c2" value="">
                </div>

                <div class="form-group">
                    <label for="telefono_c2">Teléfono 2</label>
                    <input type="text" class="form-control" name="telefono_c2" value="">
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success btn-block" type="submit" name="button">Crear</button>
            </div>

        </fieldset>
        {!! Form::close() !!}
    </div>
</div>

@endsection
