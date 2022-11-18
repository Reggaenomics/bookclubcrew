<?php

use App\Facades\Discord;
use Discord\WebSockets\Event;

Discord::on(Event::CHANNEL_CREATE, function (\Discord\Parts\Channel\Channel $channel, $discord) {
    $channel->sendMessage('created!');
});

Discord::message(function ($message) {
    // Ignore messages from any Bots
    if ($message->author->bot) {
        return;
    }

    // If message is "discordstatus"
    if ($message->content == 'hello') {
        $message->reply('Hello!');
    }
});
