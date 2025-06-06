@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Eventos</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Descripción Corta</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Organizador</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Fecha Límite Registro</th>
                    <th>Capacidad</th>
                    <th>Privado</th>
                    <th>Gratuito</th>
                    <th>Precio Base</th>
                    <th>Moneda</th>
                    <th>Imagen</th>
                    <th>Miniatura</th>
                    <th>URL Externa</th>
                    <th>Términos y Condiciones</th>
                    <th>Activo</th>
                    <th>Creado en</th>
                    <th>Actualizado en</th>
                    <th>Creado por</th>
                    <th>Actualizado por</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $event->event_id }}</td>
                        <td>{{ $event->event_name }}</td>
                        <td>{{ $event->description }}</td>
                        <td>{{ $event->short_description }}</td>
                        <td>{{ $event->event_type_id }}</td>
                        <td>{{ $event->status_id }}</td>
                        <td>{{ $event->location_id }}</td>
                        <td>{{ $event->organizer_id }}</td>
                        <td>{{ $event->start_datetime }}</td>
                        <td>{{ $event->end_datetime }}</td>
                        <td>{{ $event->registration_deadline }}</td>
                        <td>{{ $event->capacity }}</td>
                        <td>{{ $event->is_private ? 'Sí' : 'No' }}</td>
                        <td>{{ $event->is_free ? 'Sí' : 'No' }}</td>
                        <td>{{ number_format($event->base_price, 2) }}</td>
                        <td>{{ $event->currency }}</td>
                        <td>
                            @if($event->image_url)
                                <img src="{{ $event->image_url }}" alt="Imagen" style="max-width: 100px;">
                            @endif
                        </td>
                        <td>
                            @if($event->thumbnail_url)
                                <img src="{{ $event->thumbnail_url }}" alt="Miniatura" style="max-width: 60px;">
                            @endif
                        </td>
                        <td>
                            @if($event->external_url)
                                <a href="{{ $event->external_url }}" target="_blank">Ver</a>
                            @endif
                        </td>
                        <td>{{ $event->terms_conditions }}</td>
                        <td>{{ $event->is_active ? 'Sí' : 'No' }}</td>
                        <td>{{ $event->created_at }}</td>
                        <td>{{ $event->updated_at }}</td>
                        <td>{{ $event->created_by }}</td>
                        <td>{{ $event->updated_by }}</td>
                        <td>
                            {{-- Aquí puedes agregar los botones de acción --}}
                            <a href="{{ route('events.show', $event->event_id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('events.edit', $event->event_id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('events.destroy', $event->event_id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este evento?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
