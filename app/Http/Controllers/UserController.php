<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Estado;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
public function index(Request $request)
{
    $search = $request->input('search', '');
    $users = User::with(['role', 'estado', 'genero'])
        ->where('nombre', 'LIKE', "%{$search}%")
        ->orWhere('apellido', 'LIKE', "%{$search}%")
        ->orWhere('email', 'LIKE', "%{$search}%")
        ->paginate(3);

    return response()->json($users);
}


    public function create()
    {
        $roles = Role::all();
        $estados = Estado::all();
        $generos = Genero::all();
        return response()->json([
            'roles' => $roles,
            'estados' => $estados,
            'generos' => $generos,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:8',
            'role_id' => 'required|exists:roles,id',
            'estado_id' => 'required|exists:estados,id',
            'genero_id' => 'required|exists:generos,id_genero',
        ]);

        $user = User::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'estado_id' => $request->estado_id,
            'genero_id' => $request->genero_id,
            'errores_usuario' => 0,
        ]);

        return response()->json($user, 201);
    }

public function edit($id)
{
    $user = User::findOrFail($id);
    $roles = Role::all();
    $estados = Estado::all();
    $generos = Genero::all();

    return response()->json([
        'user' => $user,
        'roles' => $roles,
        'estados' => $estados,
        'generos' => $generos,
    ]);
}


    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'estado_id' => 'required|exists:estados,id',
            'genero_id' => 'required|exists:generos,id_genero',
        ]);

        $user->update([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'role_id' => $request->role_id,
            'estado_id' => $request->estado_id,
            'genero_id' => $request->genero_id,
        ]);

        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }

        return response()->json($user);
    }

    public function show($id)
    {
        $user = User::with(['role', 'estado', 'genero'])->findOrFail($id);
        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente.']);
    }
}
