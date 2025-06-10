@extends('layouts.app')


<br>
<br>

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">{{ $evento['title'] }}</h1>
        <p>{{ $evento['description'] ?? 'Sin descripción' }}</p>
        <p><strong>Inicio:</strong> {{ $evento['startDateTime'] }}</p>
        <p><strong>Fin:</strong> {{ $evento['endDateTime'] }}</p>
    </div>
@endsection
