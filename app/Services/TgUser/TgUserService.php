<?php

namespace App\Services\TgUser;

use App\Interfaces\TgUser\TgUserInterface;
use App\Models\TgUser;
use Illuminate\Support\Facades\Cache;

class TgUserService implements TgUserInterface
{
    public function userIsExist(string $id): bool
    {
        if (Cache::store('redis')->has('id_' . $id)) {
            return true;
        }
        if (!is_null(TgUser::query()->find($id))) {
            Cache::store('redis')->set('id_' . $id, $id, 600);
            return true;
        }
        $newTgUser = new TgUser(['id' => $id]);
        $newTgUser->save();
        return true;
    }
}
