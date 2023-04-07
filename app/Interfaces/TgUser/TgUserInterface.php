<?php

namespace App\Interfaces\TgUser;

interface TgUserInterface
{
    /**
     * @param string $id
     * @return bool
     */
    public function userIsExist(string $id) : bool;
}
