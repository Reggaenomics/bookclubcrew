<?php

namespace App\Providers;

use App\Discord\Discord;
use Illuminate\Support\ServiceProvider;

class DiscordServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('discord', fn () => new Discord());

        $this->booted(function () {
            foreach (scandir(base_path('discord')) as $filename) {
                $path = base_path('discord') . '/' . $filename;
                if (is_file($path)) {
                    require $path;
                }
            }
        });
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
