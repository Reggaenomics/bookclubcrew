<?php

namespace App\Discord\Commands;

class Hello
{
    public string $signature = '!hello';

    public function handle($message, $params) {
        $message->reply('Params: '.implode(',', $params));
    }

}
