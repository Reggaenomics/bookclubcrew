<?php

use App\Facades\Discord;
use Discord\WebSockets\Event;

Discord::on(Event::CHANNEL_CREATE, function (\Discord\Parts\Channel\Channel $channel, $discord) {
    $channel->sendMessage('created!');
});
