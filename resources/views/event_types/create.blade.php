@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <br>
        <h1>Crear Tipo de Evento</h1>
        <form action="{{ route('event_types.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>ID</label>
                <input type="number" name="event_type_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="type_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea name="description" class="form-control"></textarea>
            </div>
            <div class="form-check mt-2">
                <input type="checkbox" name="is_active" class="form-check-input" checked>
                <label class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-success mt-2">Guardar</button>
        </form>
@endsection
