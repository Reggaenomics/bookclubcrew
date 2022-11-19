<?php

namespace App\Discord;

use Discord\WebSockets\Event as DiscordEvent;

enum Event
{
    case MESSAGE_CREATE;
    case CHANNEL_CREATE;

    public function name(): string
    {
        return match ($this) {
            Event::MESSAGE_CREATE => DiscordEvent::MESSAGE_CREATE,
            Event::CHANNEL_CREATE => DiscordEvent::CHANNEL_CREATE,
        };
    }
}
