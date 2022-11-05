<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Discord\Discord command(string $name, \Closure $callback)
 * @method static \App\Discord\Discord getCommands(): array
 * @method static \App\Discord\Discord message(\Closure $callback)
 * @method static \App\Discord\Discord getMessages(): array
 */
class Discord extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'discord';
    }
}
