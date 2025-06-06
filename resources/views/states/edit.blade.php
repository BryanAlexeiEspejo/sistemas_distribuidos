@extends('layouts.app')

@section('content')
    <br>
    <br>
    <br>
    <br>
        <h1>Editar Estado</h1>

        <form method="POST" action="{{ route('states.update', $state->state_id) }}">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>País</label>
                <select name="country_id" class="form-control">
                    @foreach($countries as $country)
                        <option value="{{ $country->country_id }}" {{ $country->country_id == $state->country_id ? 'selected' : '' }}>
                            {{ $country->country_name }}
                        </option>
                    @endforeach
                </select>
                @error('country_id') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Nombre del Estado</label>
                <input type="text" name="state_name" class="form-control" value="{{ old('state_name', $state->state_name) }}">
                @error('state_name') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label>Código del Estado</label>
                <input type="text" name="state_code" class="form-control" value="{{ old('state_code', $state->state_code) }}">
                @error('state_code') <div class="text-danger">{{ $message }}</div> @enderror
            </div>

            <button class="btn btn-primary">Actualizar</button>
        </form>
@endsection
