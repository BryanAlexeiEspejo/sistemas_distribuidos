@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <br>
        <h1>Lista de Estados</h1>
        <a href="{{ route('states.create') }}" class="btn btn-primary mb-3">Crear Estado</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>País</th>
                    <th>Nombre</th>
                    <th>Código</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($states as $state)
                    <tr>
                        <td>{{ $state->state_id }}</td>
                        <td>{{ $state->country_id }}</td>
                        <td>{{ $state->state_name }}</td>
                        <td>{{ $state->state_code }}</td>
                        <td>
                            <a href="{{ route('states.edit', $state->state_id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('states.destroy', $state->state_id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection

