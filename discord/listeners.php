<?php

use App\Facades\Channel;
use App\Facades\Message;

Channel::create(function ($channel) {
    $channel->sendMessage('created!');
});

Message::create(function ($message) {
    // Ignore messages from any Bots
    if ($message->author->bot) {
        return;
    }

    // If message is "discordstatus"
    if ($message->content == 'hello') {
        $message->reply('Hello!');
    }
});
