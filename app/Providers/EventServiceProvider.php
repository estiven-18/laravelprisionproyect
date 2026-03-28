<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Auth\Events\Login;
use App\Listeners\LogGuardSession;

class EventServiceProvider extends ServiceProvider
{
    //sirve para registrar los eventos y listeners de la aplicación
    protected $listen = [
        Login::class => [
            LogGuardSession::class,
        ],
    ];

    public function boot(): void
    {
        //
    }
}