<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Discord\Channel create(\Closure $callback)
 */
class Channel extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'channel';
    }
}
