@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <br>
        <br>

        <br><br>
        <h2>Ciudades</h2>
        <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Nueva Ciudad</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Código Postal</th>
                    <th>Estado</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                    <tr>
                        <td>{{ $city->city_id }}</td>
                        <td>{{ $city->city_name }}</td>
                        <td>{{ $city->postal_code }}</td>
                        <td>{{ $city->state_name }}</td>
                        <td>{{ $city->is_active ? 'Sí' : 'No' }}</td>
                        <td>
                            <a href="{{ route('cities.edit', $city->city_id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('cities.destroy', $city->city_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Estás seguro?')"
                                    class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
