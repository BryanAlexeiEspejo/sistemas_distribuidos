@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-10 px-4">
        <h1 class="text-3xl font-bold mb-6">Tipos de Ubicación</h1>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-4">
            <form method="GET" action="{{ route('location_types.index') }}" class="flex gap-2">
                <input type="text" name="search" value="{{ $search }}" placeholder="Buscar por nombre..."
                    class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Buscar</button>
            </form>
            <a href="{{ route('location_types.create') }}"
                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">Crear Tipo</a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border rounded-md">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border-b">ID</th>
                        <th class="px-4 py-2 border-b">Nombre</th>
                        <th class="px-4 py-2 border-b">Descripción</th>
                        <th class="px-4 py-2 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($locationTypes as $type)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border-b">{{ $type->location_type_id }}</td>
                            <td class="px-4 py-2 border-b">{{ $type->type_name }}</td>
                            <td class="px-4 py-2 border-b">{{ $type->description }}</td>
                            <td class="px-4 py-2 border-b flex gap-2">
                                <a href="{{ route('location_types.edit', $type->location_type_id) }}"
                                    class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Editar</a>
                                <form action="{{ route('location_types.destroy', $type->location_type_id) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar este tipo de ubicación?')">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-4 text-center text-gray-500">No se encontraron resultados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $locationTypes->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
