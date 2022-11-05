<?php

namespace App\Console\Commands;

use App\Facades\Discord;
use Discord\DiscordCommandClient;
use Discord\Parts\Channel\Message;
use Illuminate\Console\Command;
use function React\Async\coroutine;

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
     * @throws \Exception
     */
    public function handle()
    {
        $discord = new DiscordCommandClient([
            'token' => config('discord.token'),
        ]);

        foreach (Discord::getCommands() as $name => $callback) {
            $discord->registerCommand($name, function (Message $message, $params) use ($callback) {
                coroutine(function (Message $message, $params) use ($callback) {
                    // Ignore messages from any Bots
                    if ($message->author->bot) {
                        return;
                    }

                    $callback($message, $params);
                }, $message, $params);
            });
        }

        $discord->on('ready', function (DiscordPHP $discord) {
            $discord->on('message', function (Message $message, DiscordPHP $discord) {
                foreach (Discord::getMessages() as $callback) {
                    $callback($message, $discord);
                }
            });
        });

        $discord->run();
    }
}
