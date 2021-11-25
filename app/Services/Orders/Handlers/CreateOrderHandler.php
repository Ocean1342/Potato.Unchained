<?php
declare(strict_types=1);

namespace App\Services\Orders\Handlers;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Models\Dish;
use App\Models\Order;
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
//        проверка на то, что user_id в заказе и токен одинаковые
        $this->validateToken((int)$request->toArray()['user']['id'], $request);

        //проверка на то, что все блюда из одного ресторана
        if (count($request->toArray()['dishes']) > 1)
            $this->checkRestaurantId($request->toArray()['dishes']);

        $createdOrder = $this->ordersRepositories->createOrder($request);
        if (array_key_exists('chat_id', $request->all()['user'])) {
            //отправить уведомление в телеграм
            $this->sendTelegramMessage($request->all()['user']['chat_id'], $createdOrder);
        }
        return response()->json([
            'success' => true,
            'message' => 'Order Created. Order ID: ' . $createdOrder->id,
        ]);
    }

    /**
     * @param mixed $chat_id
     * @param Order $createdOrder
     */
    protected function sendTelegramMessage(mixed $chat_id, Order $createdOrder): void
    {
        try {
            TeleBot::sendMessage([
                'chat_id' => $chat_id,
                'text' => 'Order created. Order ID:' . $createdOrder->id
            ]);
        } catch (Exception $e) {
            Log::warning('Error when send to telegram', collect($e)->toArray());
        }
    }

    /**
     * @param array $arDishes
     * @throws ApiDataNotFoundException
     */
    protected function checkRestaurantId(array $arDishes): void
    {
        $firstDishCategory = $this->validateDish($arDishes[1]['dish_id']);
        foreach ($arDishes as $dish) {
            $curDishRestaurantId = $this->validateDish($dish['dish_id'])->restaurant_id;
            if ($firstDishCategory->restaurant_id !== $curDishRestaurantId) {

                throw new HttpResponseException(response()->json(
                    [
                        'success' => 'false',
                        'message' => 'Dishes must be from the same restaurant'
                    ],
                    400)
                );
            }
        }
    }

    /**
     * @param mixed $curDishId
     * @return Dish
     * @throws ApiDataNotFoundException
     */
    protected function validateDish(mixed $curDishId): Dish
    {
        //выбросить исключение, если такого продукта нет
        $curDish = Dish::find($curDishId);
        if (!$curDish) {
            throw new ApiDataNotFoundException('There is no dish with ID: ' . $curDishId);
        }
        return $curDish;
    }

    /**
     * Проверяет соответствие
     *
     * @param int $userIdFromOrder
     * @param ApiOrderRequest $request
     */
    protected function validateToken(int $userIdFromOrder, ApiOrderRequest $request): void
    {
        if ($userIdFromOrder !== $request->user()->id)
            throw new HttpResponseException(response()->json([
                'message' => 'You should use your token. Please login and get your own '], 401)
            );
    }
}
