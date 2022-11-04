<?php

use \App\Facades\Discord;

Discord::message(function ($message) {
    // Ignore messages from any Bots
    if ($message->author->bot) return;

    // If message is "discordstatus"
    if ($message->content == 'hello') {
        $message->reply('Hello!');
    }
});
