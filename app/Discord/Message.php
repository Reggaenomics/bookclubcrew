<?php

namespace App\Discord;

use App\Facades\Discord;

class Message
{
    public function create(\Closure $handler): void
    {
        Discord::on(Event::MESSAGE_CREATE, $handler);
    }
}
