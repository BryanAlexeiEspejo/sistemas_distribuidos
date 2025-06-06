@extends('layouts.app')

@section('title', 'Agregar País')

@section('content')
    <div class="max-w-3xl mx-auto py-10 px-6">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-blue-600 px-6 py-4">
                <h2 class="text-white text-lg font-semibold">
                    ➕ Agregar País
                </h2>
            </div>

            <div class="p-6">
                @if ($errors->any())
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <strong>¡Ups! Hay errores:</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('countries.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label for="country_id" class="block text-sm font-medium text-gray-700">Código del País (ID)</label>
                        <input type="text" name="country_id" maxlength="2"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring focus:ring-blue-200"
                            value="{{ old('country_id') }}" required>
                    </div>


                    <div class="mb-4">
                        <label for="country_name" class="block text-sm font-medium text-gray-700">Nombre del País</label>
                        <input type="text" name="country_name" maxlength="100"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring focus:ring-blue-200"
                            value="{{ old('country_name') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="phone_code" class="block text-sm font-medium text-gray-700">Código Telefónico</label>
                        <input type="text" name="phone_code" maxlength="5"
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:ring focus:ring-blue-200"
                            value="{{ old('phone_code') }}">
                    </div>

                    <div class="mb-6">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="is_active" value="1" class="form-checkbox text-blue-600"
                                {{ old('is_active', true) ? 'checked' : '' }}>
                            <span class="ml-2 text-sm text-gray-700">¿Activo?</span>
                        </label>
                    </div>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('countries.index') }}"
                            class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">Cancelar</a>
                        <button type="submit"
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
