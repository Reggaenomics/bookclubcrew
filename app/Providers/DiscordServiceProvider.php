<?php

namespace App\Providers;

use App\Discord\Channel;
use App\Discord\Discord;
use App\Discord\Message;
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
        $this->app->singleton('message', fn () => new Message());
        $this->app->singleton('channel', fn () => new Channel());

        $this->booted(function () {
            require base_path('discord/commands.php');
            require base_path('discord/listeners.php');
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
