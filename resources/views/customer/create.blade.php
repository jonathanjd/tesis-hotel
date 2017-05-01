@extends('layouts.app')
@section('title', 'Crear Cliente')
@section('content')

<h3 class="text-center text-title-primary">Crear Cliente</h3>

<div>
    {!! Form::open(['route' => 'cliente.stor', 'method' => 'POST', 'class' => 'form-horizontal']) !!}
    <fieldset>
        <legend>Datos del Clientes</legend>
        <div class="form-group">
          {!! Form::label('cedula_rif', 'Cedula/Rif') !!}
          <input type="text" class="form-control" id="" placeholder="">
          {!! Form::text('cedula_rif', $customer->cedula_rif) !!}
        </div>
    </fieldset>
    {!! Form::close() !!}
</div>



@endsection
