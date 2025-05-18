<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


use App\Http\Controllers\Auth\LoginController;

Route::get('login/google', [LoginController::class, 'redirectToGoogle']);
Route::get('login/google/callback', [LoginController::class, 'handleGoogleCallback']);


Route::get('/auth/google', function () {
    return Socialite::driver('google')->redirect();
})->name('google.login');

Route::get('/auth/google/callback', function () {
    try {
        // Obtén los datos del usuario desde Google
        $googleUser = Socialite::driver('google')->user();

        // Verifica si el correo ya está registrado
        $user = User::where('email', $googleUser->getEmail())->first();

        if ($user) {
            Auth::login($user);
            Session::flash('error', 'Esta cuenta de Google ya está registrada. Por favor, inicie sesión.');

            return redirect()->route('login');
        }

        // Si no está registrado, crea el nuevo usuario
        $user = User::create([
            'nombre' => $googleUser->user['given_name'] ?? 'NombreGoogle',
            'apellido' => $googleUser->user['family_name'] ?? 'ApellidoGoogle',
            'email' => $googleUser->getEmail(),
            'password' => bcrypt(uniqid()), // Contraseña aleatoria
            'role_id' => 3, // Asume rol 3 para el nuevo usuario
            'estado_id' => 1, // Activo
            'genero_id' => 1, // Género por defecto
        ]);

        // Inicia sesión con el nuevo usuario
        Auth::login($user);

        // Redirige al dashboard o página de inicio
        return redirect()->route('home');

    } catch (Exception $e) {
        // Si hay algún error, redirige al login
        return redirect('/login')->with('error', 'Hubo un error al iniciar sesión con Google.');
    }
});



Route::get('/informacion', function () {
    return view('informacion');
})->name('informacion');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




Route::get('/usuarios', function () { return view('usuarios.index'); });
Route::get('/usuarios/create', function () { return view('usuarios.create'); });
Route::get('/usuarios/{id}/edit', function ($id) { return view('usuarios.edit', ['id' => $id]); });
Route::get('/usuarios/{id}', function ($id) {return view('usuarios.show', ['id' => $id]);});


Route::get('/productos', function () { return view('productos.index'); });
Route::get('/productos/create', function () { return view('productos.create'); });
Route::get('/productos/{id}/edit', function ($id) { return view('productos.edit', ['id' => $id]); });



use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updatePassword']);


use App\Http\Controllers\ControlEntradaSalidaController;

Route::get('/control-entradas-salidas', [ControlEntradaSalidaController::class, 'index'])->name('control_entradas_salidas.index');


