<?php

namespace App\Discord;

use Discord\WebSockets\Event as DiscordEvent;

class Event
{
    const MESSAGE_CREATE = DiscordEvent::MESSAGE_CREATE;
    const CHANNEL_CREATE = DiscordEvent::CHANNEL_CREATE;

//    public function name(): string
//    {
//        return match ($this) {
//            Event::MESSAGE_CREATE => DiscordEvent::MESSAGE_CREATE,
//            Event::CHANNEL_CREATE => DiscordEvent::CHANNEL_CREATE,
//        };
//    }
}
