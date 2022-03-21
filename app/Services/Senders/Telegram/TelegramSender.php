<?php

namespace App\Services\Senders\Telegram;

use App\Services\Senders\Sender;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Laravel\TeleBot;

class TelegramSender extends Sender
{
    public function __construct(protected mixed $chat_id)
    {
    }

    public function sendMessage($message): bool
    {
        try {
            TeleBot::sendMessage([
                'chat_id' => $this->chat_id,
                'text' => $message
            ]);
        } catch (Exception $e) {
            Log::warning('Error when send to telegram', collect($e)->toArray());
            return false;
        }
        return true;
    }
}
