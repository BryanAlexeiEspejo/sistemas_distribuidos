@extends('layouts.app')


<br>
<br>

@section('content')
    <div class="container">
        <h1 class="text-xl font-bold mb-4">🕒 Horarios de Eventos</h1>
        @foreach($horarios as $horario)
            <div class="border p-3 mb-3 rounded">
                <strong>Evento ID:</strong> {{ $horario['event_id'] }}<br>
                <strong>Fecha:</strong> {{ $horario['scheduleDate'] }}<br>
                <strong>Inicio:</strong> {{ $horario['startTime'] }}<br>
                <strong>Fin:</strong> {{ $horario['endTime'] }}
            </div>
        @endforeach
    </div>
@endsection
