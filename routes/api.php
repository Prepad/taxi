<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/hzrudblhluiofccyoytcbfszaedaipbbiltftizmqolbdwqlfx/webhook', function () {
    $update = Telegram::getWebhookUpdate();
    if ($update->has('callback_query')) {
        $callback = $update->callbackQuery->data;
        Telegram::triggerCommand(trim($callback, "/"), $update);
        return response('ok', 200);
    }
    $updates = Telegram::commandsHandler(true);
    return response('ok', 200);
});




