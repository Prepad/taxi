<?php

namespace App\Services\TgKeyboard;

class TgKeyboardService
{
    private static array $testButton = [
        "text" => "первое меню",
        'callback_data' => '/firstmenu',
    ];

    private static array $mainButton = [
        "text" => "главное меню",
        'callback_data' => '/main',
    ];
    /**
     * @return array
     */
    static public function getTestButton() : array
    {
        return self::$testButton;
    }

    static public function getMainButton() : array
    {
        return self::$mainButton;
    }
}
