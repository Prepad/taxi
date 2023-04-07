<?php
namespace App\Telegram\Enum;

use App\Telegram\Buttons\BackButton;
use App\Telegram\Buttons\Button;
use App\Telegram\Buttons\MainMenuButton;

enum ButtonsEnum: string
{
    case BACK = BackButton::class;
    case HOME = MainMenuButton::class;

    private static function make(self $button): Button
    {
        return new ($button->value)();
    }

    public static function firstMenu()
    {
        return self::make(self::BACK);
    }

    public static function mainMenu()
    {
        return self::make(self::HOME);
    }
}
