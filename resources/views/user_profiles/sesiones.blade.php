@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Sesiones Activas</h1>
    <pre>{{ print_r($sesiones, true) }}</pre>
</div>
@endsection
