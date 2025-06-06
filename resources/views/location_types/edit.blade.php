@extends('layouts.app')

@section('content')
    <div class="max-w-xl mx-auto py-10 px-4">
        <h1 class="text-2xl font-bold mb-6">Editar Tipo de Ubicación</h1>

        <form method="POST" action="{{ route('location_types.update', $locationType->location_type_id) }}"
            class="space-y-4">
            @csrf @method('PUT')

            <div>
                <label class="block mb-1 font-medium">Nombre</label>
                <input type="text" name="type_name" value="{{ old('type_name', $locationType->type_name) }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500" required>
                @error('type_name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block mb-1 font-medium">Descripción</label>
                <textarea name="description"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring focus:border-blue-500">{{ old('description', $locationType->description) }}</textarea>
            </div>

            <div class="flex gap-2">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Actualizar</button>
                <a href="{{ route('location_types.index') }}"
                    class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Cancelar</a>
            </div>
        </form>
    </div>
@endsection
