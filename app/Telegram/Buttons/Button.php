<?php
namespace App\Telegram\Buttons;

class Button
{
    protected string $caption = '';
    protected string $action = '';

    public function getData(): array
    {
        return ['text' => $this->caption, 'callback_data' => $this->action];
    }
}
