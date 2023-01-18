<?php

namespace App\Providers;

use App\Discord\Channel;
use App\Discord\Discord;
use App\Discord\Event;
use App\Discord\Listeners\Hello;
use App\Discord\Message;
use Illuminate\Support\ServiceProvider;

class DiscordServiceProvider extends ServiceProvider
{
    protected array $listen = [
        Event::MESSAGE_CREATE => [
            Hello::class,
        ],
    ];

    protected array $commands = [
        \App\Discord\Commands\Hello::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */

    public function register()
    {
        $this->app->singleton('discord', fn () => new Discord());

        $this->booted(function () {
            foreach ($this->getEvents() as $event => $listeners) {
                foreach ($listeners as $listener) {
                    \App\Facades\Discord::on($event, $listener);
                }
            }

            foreach ($this->getCommands() as $command) {
                \App\Facades\Discord::command($command);
            }
        });
    }

    public function getCommands() {
       return $this->commands;
    }

    public function getEvents() {
        return $this->listen;
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
