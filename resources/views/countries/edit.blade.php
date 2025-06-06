@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-10">
        <div class="max-w-xl mx-auto px-4">
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">✏️ Editar País</h1>

                <form action="{{ route('countries.update', $country->country_id) }}" method="POST" class="space-y-5">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="country_name" class="block text-sm font-medium text-gray-700">Nombre del País</label>
                        <input type="text" name="country_name" value="{{ $country->country_name }}" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div>
                        <label for="phone_code" class="block text-sm font-medium text-gray-700">Código Telefónico</label>
                        <input type="text" name="phone_code" value="{{ $country->phone_code }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                    </div>

                    <div class="flex items-center">
                        <input id="is_active" type="checkbox" name="is_active" value="1"
                            {{ $country->is_active ? 'checked' : '' }}
                            class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                        <label for="is_active" class="ml-2 block text-sm text-gray-700">¿Activo?</label>
                    </div>

                    <div class="flex justify-end gap-4 pt-4">
                        <a href="{{ route('countries.index') }}"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
                            Cancelar
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
