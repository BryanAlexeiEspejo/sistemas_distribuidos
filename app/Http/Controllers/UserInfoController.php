<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserInfoController extends Controller
{
    public function mostrarPerfil($userId)
    {
        $url = config('services.users_api.base_url') . "/users/{$userId}/profiles";
        $response = Http::get($url);

        if ($response->successful()) {
            $perfil = $response->json();
            return view('usuarios.perfil', compact('perfil'));
        }

        abort(500, 'Error al recuperar perfil del usuario');
    }
}
