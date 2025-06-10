@extends('layouts.app')

<br>
<br>

@section('content')
<div class="container mt-5">
    <h2>👤 Perfiles de Usuario</h2>
    <ul class="list-group">
        @foreach ($perfiles as $perfil)
            <li class="list-group-item">
                {{ $perfil['username'] ?? 'Sin nombre' }} - {{ $perfil['email'] ?? 'Sin correo' }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
