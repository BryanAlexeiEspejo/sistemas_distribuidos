@extends('layouts.app')

<br>
<br>

@section('content')
<div class="container mt-5">
    <h2>💻 Sesiones Activas</h2>
    <ul class="list-group">
        @foreach ($sesiones as $sesion)
            <li class="list-group-item">
                {{ $sesion['device_name'] ?? 'Dispositivo desconocido' }} - {{ $sesion['ip_address'] ?? 'IP no disponible' }}
            </li>
        @endforeach
    </ul>
</div>
@endsection
