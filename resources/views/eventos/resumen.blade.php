@extends('layouts.app')

<br>
<br>
@section('content')
<div class="container mt-5">
    <h2>📋 Resumen del Usuario</h2>
    <p><strong>Nombre:</strong> {{ $resumen['username'] ?? '-' }}</p>
    <p><strong>Email:</strong> {{ $resumen['email'] ?? '-' }}</p>
    <p><strong>Estado:</strong> {{ $resumen['status_name'] ?? '-' }}</p>
</div>
@endsection
