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
            require base_path('discord/commands.php');
            require base_path('discord/messages.php');
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
