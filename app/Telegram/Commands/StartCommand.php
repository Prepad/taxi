<?php

namespace App\Telegram\Commands;

use Illuminate\Support\Facades\Log;
use Telegram\Bot\Commands\Command;
use Telegram;

/**
 * Class StartCommand.
 */
class StartCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'start';

    /**
     * @var array Command Aliases
     */
    protected array $aliases = ['listcommands'];

    /**
     * @var string Command Description
     */
    protected string $description = 'Start command, Get a list of all commands';

    /**
     * {@inheritdoc}
     */
    public function handle()

    {
        $response = $this->getUpdate();
        $text = 'Hey stranger, thanks for visiting me.'.chr(10).chr(10);
        $text .= 'I am a bot and working for'.chr(10);
        $text .= env('APP_URL').chr(10).chr(10);
        $text .= 'Please come and visit me there.'.chr(10);
        $this->replyWithMessage(compact('text'));
    }
}
