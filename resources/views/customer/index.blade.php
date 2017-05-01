@extends('layouts.app')
@section('title', 'Clientes')
@section('content')


<div class="container">
    <h3 class="text-center text-title-primary">Clientes</h3>

    <div>
        <a href="{{ route('cliente.create') }}" class="btn btn-primary btn-block">Crear Cliente</a>
    </div>

    <table class="table-hover">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Cedula
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Telefono
                </th>
                <th>
                    Email
                </th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <div>
        <a href="{{ route('cliente.create') }}" class="btn btn-primary btn-block">Crear Cliente</a>
    </div>

    <div>
        {{ $customers->links() }}
    </div>
</div>


@endsection
