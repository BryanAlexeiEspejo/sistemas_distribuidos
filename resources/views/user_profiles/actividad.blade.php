@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-2xl font-bold mb-4">Actividad del Usuario</h1>
    <pre>{{ print_r($actividad, true) }}</pre>
</div>
@endsection
