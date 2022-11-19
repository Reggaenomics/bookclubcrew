<?php

namespace App\Discord;

use App\Facades\Discord;

class Channel
{
    public function create(\Closure $handler): void
    {
        Discord::on(Event::CHANNEL_CREATE, $handler);
    }
}
