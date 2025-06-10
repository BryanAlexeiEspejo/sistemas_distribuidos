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
use App\Http\Controllers\Auth\RegisterController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');


//API

use App\Http\Controllers\EventController;

Route::get('/eventos', [EventController::class, 'index'])->name('eventos.index');
Route::get('/eventos/reporte', [EventController::class, 'reporte'])->name('eventos.reporte');
Route::get('/eventos/horarios', [EventController::class, 'horarios'])->name('eventos.horarios');
Route::get('/eventos/{id}', [EventController::class, 'show'])->name('eventos.show');
Route::get('/eventos/{id}/asistencia', [EventController::class, 'asistencia'])->name('eventos.asistencia');


use App\Http\Controllers\UserController;

// Usuarios
Route::prefix('usuarios/{id}')->group(function () {
    Route::get('/perfiles', [UserController::class, 'perfiles']);
    Route::get('/sesiones', [UserController::class, 'sesiones']);
    Route::get('/permisos', [UserController::class, 'permisos']);
    Route::get('/historial', [UserController::class, 'historial']);
    Route::get('/actividad', [UserController::class, 'actividad']);
    Route::get('/empleado', [UserController::class, 'empleado']);
    Route::get('/resumen', [UserController::class, 'resumen']);
});

// routes/web.php


Route::get('/eventos', [EventController::class, 'index'])->name('eventos.index');



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


use App\Http\Controllers\CountryController;
Route::resource('countries', CountryController::class);




use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
Route::post('/profile', [ProfileController::class, 'updatePassword']);


use App\Http\Controllers\ControlEntradaSalidaController;

Route::get('/control-entradas-salidas', [ControlEntradaSalidaController::class, 'index'])->name('control_entradas_salidas.index');





//API1
Route::get('/events', [EventController::class, 'index'])->name('events.index');




use App\Http\Controllers\StateController;

Route::resource('states', StateController::class);

use App\Http\Controllers\CityController;

Route::resource('cities', CityController::class);

use App\Http\Controllers\LocationTypeController;

Route::resource('location_types', LocationTypeController::class);


use App\Http\Controllers\EventTypeController;

Route::resource('event_types', EventTypeController::class);


use App\Http\Controllers\EventStatusController;

Route::resource('event_statuses', EventStatusController::class);




Route::get('/ticket', function () {
    return view('ticket');
})->name('ticket.view');







use App\Http\Controllers\UserProfileController;

Route::get('/mi-perfil', [UserProfileController::class, 'showAuthenticated'])
    ->middleware('auth')
    ->name('perfil.usuario');
