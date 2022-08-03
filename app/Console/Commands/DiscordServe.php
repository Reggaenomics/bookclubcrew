<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Discord\Discord;
use Discord\Parts\Channel\Message;

class DiscordServe extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discord:serve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        // Create a $discord BOT
        $discord = new Discord([
            'token' => config('discord.token')
        ]);


        // When the Bot is ready
        $discord->on('ready', function (Discord $discord) {

            // Listen for messages
            $discord->on('message', function (Message $message, Discord $discord) {

                // Ignore messages from any Bots
                if ($message->author->bot) return;

                // If message is "discordstatus"
                if ($message->content == 'hello') {
                    $message->reply('Hello!');
                }

            });

        });

        // Start the Bot (must be at the bottom)
        $discord->run();
    }
}
