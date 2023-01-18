<?php

namespace App\Discord;

class Discord
{
    private array $commands = [];

    private array $events = [];

    public function command($command): void
    {
        $this->commands[] = $command;
    }


    public function on($event, $listener): void
    {
        $this->events[$event] = $listener;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }


    public function getEvents(): array
    {
        return $this->events;
    }
}
