@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <h2>Editar Tipo de Evento</h2>

        <form action="{{ route('event_types.update', $eventType->event_type_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="type_name" value="{{ $eventType->type_name }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Descripción</label>
                <textarea name="description" class="form-control">{{ $eventType->description }}</textarea>
            </div>

            <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" {{ $eventType->is_active ? 'checked' : '' }}>
                <label class="form-check-label">Activo</label>
            </div>

            <div class="form-group">
                <label>Actualizado por</label>
                <input type="text" name="updated_by" value="{{ $eventType->updated_by }}" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        </form>
    </div>
@endsection
