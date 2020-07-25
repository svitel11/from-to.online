<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class ForceHttpsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(UrlGenerator $url)
    {
        if (app()->environment('production')) {
            $url->forceScheme('https');
        }
    }
}
