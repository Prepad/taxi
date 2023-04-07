<?php

namespace App\Telegram\Commands;

use App\Services\TgKeyboard\TgKeyboardService;
use App\Services\TgUser\TgUserService;
use App\Telegram\Enum\ButtonsEnum;
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
        $tgUserService = new TgUserService();
        $id = $response->getChat()->id;
        $tgUserService->userIsExist($id);
        if ($this->update->has('callbackQuery')) {
            $callback = $this->update->callbackQuery->data;
        } else {
            $response = '';
            $commands = $this->getTelegram()->getCommands();
            foreach ($commands as $name => $command) {
                $response .= sprintf('/%s - %s' . PHP_EOL, $name, $command->getDescription());
            }
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ButtonsEnum::mainMenu()->getData(),
                    ]
                ],
                'one_time_keyboard' => true,
            ];
            $this->replyWithMessage([
                'text' => $response,
                'reply_markup' => json_encode($keyboard),
            ]);
        }
    }
}
