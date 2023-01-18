<?php

namespace App\Console\Commands;

use App\Facades\Discord;
use App\Providers\DiscordServiceProvider;
use App\Providers\EventServiceProvider;
use Discord\Discord as DiscordClient;
use Discord\DiscordCommandClient;
use Discord\Parts\Channel\Message;
use Discord\WebSockets\Event;
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

        foreach (Discord::getCommands() as $command) {
            $instance = new $command();
            $discord->registerCommand($instance->signature, function (Message $message, $params) use ($instance) {
                coroutine(function (Message $message, $params) use ($instance) {
                    // Ignore messages from any Bots
                    if ($message->author->bot) {
                        return;
                    }

                    $instance->handle($message, $params);
                }, $message, $params);
            });
        }



        $discord->on('ready', function (DiscordClient $discord) {
            foreach (Discord::getEvents() as $event => $listener) {
                $discord->on($event, function($entity, $discord) use ($listener) {
                    (new $listener())->handle($entity, $discord);
                });
            }
        });

        $discord->run();
    }
}
