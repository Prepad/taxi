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
class FirstMenuCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected string $name = 'first';

    /**
     * @var array Command Aliases
     */
    protected array $aliases = ['firstmenu'];

    /**
     * @var string Command Description
     */
    protected string $description = 'First menu';

    /**
     * {@inheritdoc}
     */
    public function handle()

    {
        $response = $this->getUpdate();
        $tgUserService = new TgUserService();
        $id = $response->getChat()->id;
        $tgUserService->userIsExist($id);
        $text = 'Первое меню';
        $keyboard = [
            'inline_keyboard' => [
                [
                    ButtonsEnum::firstMenu()->getData(),
                ]
            ],
            'one_time_keyboard' => true,
        ];
        $this->replyWithMessage([
            'text' => $text,
            'reply_markup' => json_encode($keyboard),
        ]);
    }
}
