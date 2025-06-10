@extends('layouts.app')

<br>
<br>

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold mb-4">👥 Asistencia al Evento</h1>
        @if(count($asistencia))
            <ul>
                @foreach($asistencia as $asistente)
                    <li>{{ $asistente['user_id'] }} - {{ $asistente['guest_email'] ?? 'Sin email' }}</li>
                @endforeach
            </ul>
        @else
            <p>No se registró asistencia para este evento.</p>
        @endif
    </div>
@endsection
