<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    public function perfiles($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/profiles");
        if ($response->successful()) {
            $perfil = $response->json();
            return view('user_profiles.perfiles', compact('perfil'));
        }
        abort(404, 'Perfil no encontrado');
    }

    public function sesiones($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/sessions");
        if ($response->successful()) {
            $sesiones = $response->json();
            return view('user_profiles.sesiones', compact('sesiones'));
        }
        abort(404, 'Sesiones no encontradas');
    }

    public function permisos($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/permissions");
        if ($response->successful()) {
            $permisos = $response->json();
            return view('user_profiles.permisos', compact('permisos'));
        }
        abort(404, 'Permisos no encontrados');
    }

    public function historial($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/password-history");
        if ($response->successful()) {
            $historial = $response->json();
            return view('user_profiles.historial', compact('historial'));
        }
        abort(404, 'Historial no encontrado');
    }

    public function actividad($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/activity");
        if ($response->successful()) {
            $actividad = $response->json();
            return view('user_profiles.actividad', compact('actividad'));
        }
        abort(404, 'Actividad no encontrada');
    }

    public function empleado($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/employee-details");
        if ($response->successful()) {
            $empleado = $response->json();
            return view('user_profiles.empleado', compact('empleado'));
        }
        abort(404, 'Datos del empleado no encontrados');
    }

    public function resumen($id)
    {
        $response = Http::get(config('services.users_api.base_url') . "/users/{$id}/summary");
        if ($response->successful()) {
            $resumen = $response->json();
            return view('user_profiles.resumen', compact('resumen'));
        }
        abort(404, 'Resumen no disponible');
    }
}
