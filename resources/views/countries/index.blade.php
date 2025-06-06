@extends('layouts.app')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">🌍 Gestión de Países</h1>

        <form method="GET" action="{{ route('countries.index') }}" class="flex flex-col md:flex-row gap-4 mb-6">
            <input type="text" name="search" value="{{ $search ?? '' }}"
                class="w-full md:w-2/3 px-4 py-2 border rounded-md shadow-sm focus:ring-2 focus:ring-blue-400"
                placeholder="🔍 Buscar por nombre de país...">

            <button type="submit"
                class="w-full md:w-1/3 px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition duration-200">
                Buscar
            </button>
        </form>

        <div class="mb-4">
            <a href="{{ route('countries.create') }}"
                class="inline-block px-4 py-2 bg-green-600 text-white font-medium rounded hover:bg-green-700 transition duration-200">
                ➕ Agregar País
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 shadow-sm rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="px-6 py-3 text-left border-b">ID</th>
                        <th class="px-6 py-3 text-left border-b">Nombre</th>
                        <th class="px-6 py-3 text-left border-b">Código Teléfono</th>
                        <th class="px-6 py-3 text-left border-b">Activo</th>
                        <th class="px-6 py-3 text-left border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @forelse($countries as $country)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-3 border-b">{{ $country->country_id }}</td>
                            <td class="px-6 py-3 border-b">{{ $country->country_name }}</td>
                            <td class="px-6 py-3 border-b">{{ $country->phone_code }}</td>
                            <td class="px-6 py-3 border-b">
                                <span
                                    class="inline-block px-2 py-1 rounded-full text-xs font-semibold
                                            {{ $country->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ $country->is_active ? 'Sí' : 'No' }}
                                </span>
                            </td>
                            <td class="px-6 py-3 border-b flex flex-wrap gap-2">
                                <a href="{{ route('countries.edit', $country->country_id) }}"
                                    class="inline-block px-3 py-1 text-sm bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                    ✏️ Editar
                                </a>
                                <form action="{{ route('countries.destroy', $country->country_id) }}" method="POST"
                                    onsubmit="return confirm('¿Eliminar este país?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition">
                                        🗑️ Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No se encontraron países.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $countries->appends(['search' => request('search')])->links() }}
        </div>
    </div>
@endsection
