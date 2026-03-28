<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Auth\Events\Login;
use App\Models\GuardSession;

class LogGuardSession
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */

    //sirve para manejar el evento de login y registrar una sesión de guardia en la base de datos si no existe una sesión reciente para el usuario
    public function handle(Login $event): void
    {
        $userId = $event->user->id;

        $exists = GuardSession::where('user_id', $userId)
            ->where('start_datetime', '>=', now()->subSeconds(5))
            ->exists();

        if (!$exists) {
            GuardSession::create([
                'user_id' => $userId,
                'start_datetime' => now(),
                'state' => 'active',
            ]);
        }
    }
}
