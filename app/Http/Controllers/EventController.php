<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class EventController extends Controller
{
    // Mostrar eventos próximos
    public function index()
    {
        $response = Http::get(config('services.events_api.base_url') . '/events/upcoming');

        if ($response->successful()) {
            $eventos = $response->json();
            return view('eventos.index', compact('eventos'));
        }

        abort(500, 'Error al conectar con API de eventos');
    }

    // Detalles de un evento
    public function show($id)
    {
        $response = Http::get(config('services.events_api.base_url') . "/events/{$id}/details");

        if ($response->successful()) {
            $evento = $response->json();
            return view('eventos.show', compact('evento'));
        }

        abort(404, 'Evento no encontrado');
    }

    // Reporte de eventos
    public function reporte()
    {
        $response = Http::get(config('services.events_api.base_url') . '/events/report');

        if ($response->successful()) {
            $reporte = $response->json();
            return view('eventos.reporte', compact('reporte'));
        }

        abort(500, 'Error al obtener reporte');
    }

    // Horarios de eventos
    public function horarios()
    {
        $response = Http::get(config('services.events_api.base_url') . '/events/schedules');

        if ($response->successful()) {
            $horarios = $response->json();
            return view('eventos.horarios', compact('horarios'));
        }

        abort(500, 'Error al obtener horarios');
    }

    // Asistencia por evento
    public function asistencia($id)
    {
        $response = Http::get(config('services.events_api.base_url') . "/events/{$id}/attendance");

        if ($response->successful()) {
            $asistencia = $response->json();
            return view('eventos.asistencia', compact('asistencia'));
        }

        abort(404, 'Asistencia no disponible');
    }

    // Perfil de usuario
    public function perfil($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/profiles");

        if ($response->successful()) {
            $perfil = $response->json();
            return view('usuarios.perfil', compact('perfil'));
        }

        abort(404, 'Perfil no encontrado');
    }

    // Sesiones activas del usuario
    public function sesiones($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/sessions");

        if ($response->successful()) {
            $sesiones = $response->json();
            return view('usuarios.sesiones', compact('sesiones'));
        }

        abort(404, 'Sesiones no encontradas');
    }

    // Permisos del usuario
    public function permisos($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/permissions");

        if ($response->successful()) {
            $permisos = $response->json();
            return view('usuarios.permisos', compact('permisos'));
        }

        abort(404, 'Permisos no encontrados');
    }

    // Historial de contraseñas
    public function historial($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/password-history");

        if ($response->successful()) {
            $historial = $response->json();
            return view('usuarios.historial', compact('historial'));
        }

        abort(404, 'Historial no encontrado');
    }

    // Actividad del usuario
    public function actividad($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/activity");

        if ($response->successful()) {
            $actividad = $response->json();
            return view('usuarios.actividad', compact('actividad'));
        }

        abort(404, 'Actividad no encontrada');
    }

    // Detalles del empleado
    public function empleado($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/employee-details");

        if ($response->successful()) {
            $empleado = $response->json();
            return view('usuarios.empleado', compact('empleado'));
        }

        abort(404, 'Empleado no encontrado');
    }

    // Resumen del usuario
    public function resumen($userId)
    {
        $response = Http::get(config('services.events_api.base_url') . "/users/{$userId}/summary");

        if ($response->successful()) {
            $resumen = $response->json();
            return view('usuarios.resumen', compact('resumen'));
        }

        abort(404, 'Resumen no encontrado');
    }
}
