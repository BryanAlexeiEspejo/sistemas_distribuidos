<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Genero;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $generos = Genero::all();
        return view('auth.register', compact('generos'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        auth()->login($user);
        return redirect()->route('home');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nombre' => ['required', 'string', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', 'max:50'],
            'apellido' => ['required', 'string', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'genero_id' => ['required', 'exists:generos,id_genero'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 3,
            'estado_id' => 1,
            'genero_id' => $data['genero_id'],
        ]);
    }
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $email = $googleUser->getEmail();

            $user = User::where('email', $email)->first();

            if ($user) {
                // Usuario ya existe, redirige al login con flag para modal
                Session::flash('google_registered_email', true);
                return redirect()->route('login');
            }

            // Si no existe, lo registramos
            $user = User::create([
                'nombre' => $googleUser->user['given_name'] ?? 'NombreGoogle',
                'apellido' => $googleUser->user['family_name'] ?? 'ApellidoGoogle',
                'email' => $email,
                'password' => bcrypt(uniqid()),
                'role_id' => 3,
                'estado_id' => 1,
                'genero_id' => 1,
            ]);

            Auth::login($user);
            return redirect()->route('home');

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Hubo un error al iniciar sesión con Google.');
        }
    }




}
