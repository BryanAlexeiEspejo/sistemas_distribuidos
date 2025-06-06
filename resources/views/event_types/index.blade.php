@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <h2>Tipos de Eventos</h2>
        <a href="{{ route('event_types.create') }}" class="btn btn-primary mb-3">Crear nuevo tipo de evento</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventTypes as $type)
                    <tr>
                        <td>{{ $type->event_type_id }}</td>
                        <td>{{ $type->type_name }}</td>
                        <td>{{ $type->description }}</td>
                        <td>{{ $type->is_active ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('event_types.edit', $type->event_type_id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('event_types.destroy', $type->event_type_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
