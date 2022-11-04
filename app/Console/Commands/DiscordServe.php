<?php

namespace App\Console\Commands;

use App\Facades\Discord;
use Illuminate\Console\Command;
use Discord\Discord as DiscordPHP;
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
        $discord = new DiscordPHP([
            'token' => config('discord.token')
        ]);



        // When the Bot is ready
        $discord->on('ready', function (DiscordPHP $discord) {

            // Listen for messages
            $discord->on('message', function (Message $message, DiscordPHP $discord) {

                foreach (Discord::getMessages() as $handler) {
                    $handler($message, $discord);
                }

            });

        });

        // Start the Bot (must be at the bottom)
        $discord->run();
    }
}
