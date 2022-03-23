<?php

namespace App\Services\Senders\Telegram;

use App\Services\Senders\Sender;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Laravel\TeleBot;

/**
 * Send messages to Telegram
 */
class TelegramSender implements Sender
{

    /**
     * Set user chat id
     *
     * @param mixed $chat_id
     * @return void
     */
    public function setChatId(mixed $chat_id): void
    {
        $this->chat_id = $chat_id;
    }

    /**
     * @param mixed $message
     * @return bool
     */
    public function sendMessage(mixed $message): bool
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
