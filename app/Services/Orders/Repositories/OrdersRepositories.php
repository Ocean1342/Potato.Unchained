<?php

namespace App\Services\Orders\Repositories;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Models\Dish;
use App\Models\Order;
use App\Services\AbstractRepositories\AbstractRepositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OrdersRepositories extends AbstractRepositories
{
    protected function setModel()
    {
        return $this->model = app(Order::class);
    }


    protected function applyFilters(Builder $qb, array $filters): void
    {
        parent::applyFilters($qb, $filters);
    }

    public function getWithDishes(array $filters = [], int $limit = 50, int $offset = 0): Collection
    {
        return $this->getBy($filters, $limit, $offset)->load('dishes');
    }

    public function createOrder(ApiOrderRequest $request): Order
    {
        $order = Order::factory()->create([
            'user_id' => $request->all()['user']['id'],
            'total' => 0
        ]);
//        dump($order->id);
        $total = 0;
        foreach ($request->all()['dishes'] as $dish) {

            //получить конкретный продукт
            $curDish = Dish::find($dish['dish_id']);

            //выбросить исключение, если такого продукта нет
            if (!$curDish) {
                $order->delete();
                throw new ApiDataNotFoundException('There is no dish with ID: ' . $dish['dish_id']);
            }

            //сделать стоимость продукта цена*колличество и записать в тотал
            $total += $curDish->price * $dish['amount'];

            //прикрепить данные к сводной таблице
            $order->dishes()->attach($order->id,
                [
                    'dish_id' => $dish['dish_id'],
                    'amount' => $dish['amount']
                ]
            );

        }
        $order->total = $total;
        $order->save();
        return $order;
    }

}

