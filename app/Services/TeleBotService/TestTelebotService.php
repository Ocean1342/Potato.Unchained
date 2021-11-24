<?php

namespace App\Services\TeleBotService;


use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class TestTelebotService extends UpdateHandler
{
    public static function trigger(Update $update, TeleBot $bot): bool
    {
//        return isset($update->message); // handle regular messages (example)
        return true;
    }

    public function handle()
    {
        $update = $this->update;
        $bot = $this->bot;
        Log::warning('FromTG', collect($update)->toArray());
//         chat_id => $this->update->message->chat->id
        $this->sendMessage([
            'text' => 'Hello, World!123'
        ]);
    }
}
