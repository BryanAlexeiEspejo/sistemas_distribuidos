<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;  // Importar el evento Logout
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Models\ControlEntradaSalida;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for your application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        // Escuchar cuando un usuario inicia sesión
        Event::listen(Login::class, function ($event) {
            ControlEntradaSalida::create([
                'email' => $event->user->email, // Se obtiene el email del usuario
                'tipo' => 'entrada', // Tipo de acción
                'fecha_hora' => now(), // Fecha y hora actual
            ]);
        });

        // Escuchar cuando un usuario cierra sesión
        Event::listen(Logout::class, function ($event) {
            ControlEntradaSalida::create([
                'email' => $event->user->email, // Se obtiene el email del usuario
                'tipo' => 'salida', // Tipo de acción
                'fecha_hora' => now(), // Fecha y hora actual
            ]);
        });
    }
}
