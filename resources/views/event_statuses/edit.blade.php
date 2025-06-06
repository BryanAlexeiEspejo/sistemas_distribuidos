@extends('layouts.app')

@section('title', 'Editar Estado')

@section('content')
    <div class="max-w-2xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Editar Estado: {{ $status->status_name }}</h1>

        <form action="{{ route('event_statuses.update', $status->status_id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nombre</label>
                <input type="text" name="status_name" value="{{ old('status_name', $status->status_name) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400" required>
                @error('status_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block font-medium">Descripción</label>
                <textarea name="description"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-400"
                    maxlength="255">{{ old('description', $status->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_system" id="is_system" class="mr-2" {{ old('is_system', $status->is_system) ? 'checked' : '' }}>
                <label for="is_system" class="text-sm">¿Estado de sistema?</label>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
                <a href="{{ route('event_statuses.index') }}"
                    class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
