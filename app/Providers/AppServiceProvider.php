<?php

namespace App\Providers;

use App\Models\Usuario;
use App\Observers\UsuarioObsever;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Usuario::observe(UsuarioObsever::class);
    }
}
