@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <br>
        <h1>Crear Estado</h1>

        <form method="POST" action="{{ route('states.store') }}">
            @csrf

            <div class="mb-3">
                <label>ID del Estado</label>
                <input type="number" name="state_id" class="form-control" value="{{ old('state_id') }}">
                @error('state_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>País</label>
                <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                    @endforeach
                </select>
                @error('country_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nombre del Estado</label>
                <input type="text" name="state_name" class="form-control" value="{{ old('state_name') }}">
                @error('state_name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Código del Estado</label>
                <input type="text" name="state_code" class="form-control" value="{{ old('state_code') }}">
                @error('state_code') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-success">Guardar</button>
        </form>
@endsection
