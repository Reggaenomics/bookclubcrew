<?php

namespace App\Discord\Listeners;

class Hello
{
    public function handle($message) {
        // Ignore messages from any Bots
        if ($message->author->bot) {
            return;
        }

        // If message is "discordstatus"
        if ($message->content == 'hello') {
            $message->reply('Hello!');
        }
    }
}
