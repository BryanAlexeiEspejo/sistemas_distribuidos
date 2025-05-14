@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Control de Entradas y Salidas</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Fecha y Hora</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entradasSalidas as $registro)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $registro->email }}</td>
                    <td>{{ ucfirst($registro->tipo) }}</td>
                    <td>{{ $registro->fecha_hora }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
