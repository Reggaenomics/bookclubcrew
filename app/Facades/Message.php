<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Discord\Message create(\Closure $callback)
 */
class Message extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'message';
    }
}
