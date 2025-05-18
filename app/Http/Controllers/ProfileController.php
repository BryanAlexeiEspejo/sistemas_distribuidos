<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        $generos = Genero::all();
        return view('profile', compact('user', 'generos'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'genero_id' => 'required|exists:generos,id_genero',
        ]);

        $user = auth()->user();

        if (Hash::check($request->password, $user->password)) {
            return redirect()->route('profile')->with('error', 'La nueva contraseña no puede ser igual a la actual');
        }

        $user->password = Hash::make($request->password);
        $user->genero_id = $request->genero_id;
        $user->save();

        return redirect()->route('profile')->with('success', 'Contraseña y género actualizados con éxito');
    }
}
