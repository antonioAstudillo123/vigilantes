<?php

namespace App\Providers\RegistrarRondas;

use Illuminate\Support\ServiceProvider;
use App\repositories\registrarRonda\RegistrarRondaInterface;
use App\repositories\registrarRonda\RegistrarRondaRepository;


class RegistrarRondas extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(RegistrarRondaInterface::class, RegistrarRondaRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
