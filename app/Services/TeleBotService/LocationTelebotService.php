<?php

namespace App\Services\TeleBotService;


use App\Services\GeoService\GeoPoints;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Exception\TeleBotException;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

/**
 * Возвращает в Telegram отсортированные по расстоянию заведения
 * в зависимости от геопозиции пользователя
 */
class LocationTelebotService extends UpdateHandler
{
    /**
     * @param Update $update
     * @param TeleBot $bot
     * @return bool
     */
    public static function trigger(Update $update, TeleBot $bot): bool
    {
        return true;
    }

    /**
     * @return void
     */
    public function handle()
    {
        $update = $this->update;
        $bot = $this->bot;
        $ar = collect($update->message)->toArray();
        if (array_key_exists('location', $ar)) {
            $ar = GeoPoints::sortByClosest($update->message->location->latitude, $update->message->location->longitude);
            $message = GeoPoints::prettyPrint($ar);
        } else {
            $message = 'Send location';
        }
        $this->sendMessage([
            'text' => $message
        ]);
    }
}
