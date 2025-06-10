@extends('layouts.app')

<br>
<br>
@section('content')
<div class="container mt-5">
    <h2>🔐 Permisos de Usuario</h2>
    <ul class="list-group">
        @foreach ($permisos as $permiso)
            <li class="list-group-item">
                {{ $permiso['name'] ?? 'Sin nombre' }} - {{ $permiso['description'] ?? 'Sin descripción' }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
