@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <h2>Editar Ciudad</h2>
        <form action="{{ route('cities.update', $city->city_id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="city_name" value="{{ $city->city_name }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select name="state_id" class="form-control">
                    <option value="">Seleccione</option>
                    @foreach($states as $state)
                        <option value="{{ $state->state_id }}" {{ $city->state_id == $state->state_id ? 'selected' : '' }}>
                            {{ $state->state_name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Código Postal</label>
                <input type="text" name="postal_code" value="{{ $city->postal_code }}" class="form-control">
            </div>
            <div class="form-check">
                <input type="checkbox" name="is_active" class="form-check-input" {{ $city->is_active ? 'checked' : '' }}>
                <label class="form-check-label">Activo</label>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Actualizar</button>
        </form>
    </div>
@endsection
