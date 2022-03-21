<?php
declare(strict_types=1);

namespace App\Services\Orders\Handlers;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Models\Dish;
use App\Models\Order;
use App\Services\Senders\Telegram\TelegramSender;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use WeStacks\TeleBot\Laravel\TeleBot;

/**
 * @mixin Dish
 * */
class CreateOrderHandler extends AbstractOrderHandler
{

    /**
     * @param ApiOrderRequest $request
     * @return JsonResponse
     * @throws ApiDataNotFoundException
     */
    public function handle(ApiOrderRequest $request): JsonResponse
    {
        $createdOrder = $this->ordersRepositories->createOrder($request);
        if (array_key_exists('chat_id', $request->all()['user'])) {
            //отправить уведомление в телеграм
            $sender = new TelegramSender($request->all()['user']['chat_id']);
            $sender->sendMessage('Order created. Order ID:' . $createdOrder->id);
        }
        return response()->json([
            'success' => true,
            'message' => 'Order Created. Order ID: ' . $createdOrder->id,
            'order_id' => $createdOrder->id
        ]);
    }

}
