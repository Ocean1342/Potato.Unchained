<?php
declare(strict_types=1);

namespace App\Services\Orders\Handlers;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Notifications\TelegramTeleBotNotification;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Laravel\TeleBot;

class CreateOrderHandler extends AbstractOrderHandler
{
    public function handle(ApiOrderRequest $request)
    {
        $createdOrder = $this->ordersRepositories->createOrder($request);
            if (array_key_exists('chat_id',$request->all()['user'])) {
                //отправить уведомление
                try {
                    TeleBot::sendMessage([
                        'chat_id' => $request->all()['user']['chat_id'],
                        'text'=>'Order created. Order ID:'.$createdOrder->id
                    ]);
                } catch (\Exception $e) {
                    Log::warning('Error when send to telegram',collect($e)->toArray());
                }
            }
        return response()->json([
            'success' => true,
            'message' => 'Order Created. Order ID: '.$createdOrder->id,
        ], 200);
    }
}
