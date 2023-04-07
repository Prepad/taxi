<?php
namespace App\Telegram\Buttons;

class BackButton extends Button
{
    protected string $caption = 'Главное меню';
    protected string $action = '/main';
}
