@extends('layouts.app')

@section('title', 'Crear Estado')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Crear Nuevo Estado</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('event_statuses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="status_id" class="form-label">ID</label>
                <input type="number" name="status_id" id="status_id" value="{{ old('status_id') }}"
                    class="form-control @error('status_id') is-invalid @enderror" required>
                @error('status_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status_name" class="form-label">Nombre</label>
                <input type="text" name="status_name" id="status_name" value="{{ old('status_name') }}"
                    class="form-control @error('status_name') is-invalid @enderror" required maxlength="100">
                @error('status_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descripción (opcional)</label>
                <textarea name="description" id="description"
                    class="form-control @error('description') is-invalid @enderror"
                    maxlength="255">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-check mb-3">
                <input type="checkbox" name="is_system" id="is_system" class="form-check-input" {{ old('is_system') ? 'checked' : '' }}>
                <label for="is_system" class="form-check-label">¿Estado de sistema?</label>
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a href="{{ route('event_statuses.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
