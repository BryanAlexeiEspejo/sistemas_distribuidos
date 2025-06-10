@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Historial de Contraseñas</h1>
    <pre>{{ print_r($historial, true) }}</pre>
</div>
@endsection
