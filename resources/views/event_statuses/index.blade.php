@extends('layouts.app')

@section('title', 'Listado de Estados')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Listado de Estados</h1>
        <a href="{{ route('event_statuses.create') }}" class="btn btn-primary">Crear Estado</a>
    </div>

    @if($statuses->isEmpty())
        <p>No hay estados registrados.</p>
    @else
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Sistema</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($statuses as $status)
                    <tr>
                        <td>{{ $status->status_id }}</td>
                        <td>{{ $status->status_name }}</td>
                        <td>{{ $status->description }}</td>
                        <td>{{ $status->is_system ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('event_statuses.edit', $status->status_id) }}"
                                class="btn btn-sm btn-warning">Editar</a>

                            <form action="{{ route('event_statuses.destroy', $status->status_id) }}" method="POST"
                                style="display:inline-block" onsubmit="return confirm('¿Está seguro de eliminar este estado?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">Eliminar</button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
