@extends('layouts.app')

<br>
<br>

@section('content')
    <div class="container">
        <h1 class="text-3xl font-bold mb-4">🎤 Eventos Próximos</h1>

        @if(count($eventos) > 0)
            <ul class="space-y-4">
                @foreach($eventos as $evento)
                    <li class="p-4 border rounded shadow">
                        <h2 class="text-xl font-semibold">{{ $evento['title'] }}</h2>
                        <p><strong>Descripción:</strong> {{ $evento['description'] }}</p>
                        <p><strong>Inicio:</strong> {{ $evento['start_datetime'] }}</p>
                        <p><strong>Fin:</strong> {{ $evento['end_datetime'] }}</p>
                        <a href="{{ route('eventos.show', $evento['event_id']) }}" class="text-blue-500">Ver detalles</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-600">No hay eventos disponibles por el momento.</p>
        @endif
    </div>
@endsection
