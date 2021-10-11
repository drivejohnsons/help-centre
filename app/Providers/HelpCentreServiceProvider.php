<?php

namespace App\Providers;

use App\Support\HelpCentre;
use Illuminate\Support\ServiceProvider;

class HelpCentreServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('helpCentre', function () {
            return new HelpCentre;
        });

        $this->app->singleton(Parsedown::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
