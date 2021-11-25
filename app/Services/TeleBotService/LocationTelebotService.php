<?php

namespace App\Services\TeleBotService;


use App\Services\GeoService\GeoPoints;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Exception\TeleBotException;
use WeStacks\TeleBot\Interfaces\UpdateHandler;
use WeStacks\TeleBot\Objects\Update;
use WeStacks\TeleBot\TeleBot;

class LocationTelebotService extends UpdateHandler
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
