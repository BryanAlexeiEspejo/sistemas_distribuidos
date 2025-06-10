@extends('layouts.app')

@section('content')
<div class="container">
    <h1>👤 Perfil del Usuario</h1>
    @if($perfil)
        <ul class="list-group">
            <li class="list-group-item"><strong>Nombre:</strong> {{ $perfil['full_name'] ?? 'N/D' }}</li>
            <li class="list-group-item"><strong>Email:</strong> {{ $perfil['email'] ?? 'N/D' }}</li>
            <li class="list-group-item"><strong>Teléfono:</strong> {{ $perfil['phone'] ?? 'N/D' }}</li>
        </ul>
    @else
        <p>No se encontró el perfil.</p>
    @endif
</div>
@endsection
