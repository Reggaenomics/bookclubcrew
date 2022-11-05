<?php

use App\Facades\Discord;

Discord::command('helloworld', function ($message, $params) {
    $message->reply('Params: '.implode(',', $params));
});
