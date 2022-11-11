<?php

namespace App\Discord;

class Discord
{
    private array $commands = [];

    private array $messages = [];

    private array $events = [];

    public function command(string $name, \Closure $callback): void
    {
        $this->commands[$name] = $callback;
    }

    public function message(\Closure $callback): void
    {
        $this->messages[] = $callback;
    }

    public function on(string $event, \Closure $callback): void
    {
       $this->events[$event] = $callback;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }

    public function getMessages(): array
    {
        return $this->messages;
    }

    public function getEvents():array
    {
        return $this->events;
    }
}
