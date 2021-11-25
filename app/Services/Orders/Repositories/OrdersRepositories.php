<?php

namespace App\Services\Orders\Repositories;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Models\Dish;
use App\Models\Order;
use App\Services\AbstractRepositories\AbstractRepositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class OrdersRepositories extends AbstractRepositories
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function setModel()
    {
        return $this->model = app(Order::class);
    }


    /**
     * @param Builder $qb
     * @param array $filters
     */
    protected function applyFilters(Builder $qb, array $filters): void
    {
        parent::applyFilters($qb, $filters);
    }

    /**
     * @param array $filters
     * @param int $limit
     * @param int $offset
     * @return Collection
     */
    public function getWithDishes(array $filters = [], int $limit = 50, int $offset = 0): Collection
    {
        return $this->getBy($filters, $limit, $offset)->load('dishes');
    }

    /**
     * @param ApiOrderRequest $request
     * @return Order
     * @throws ApiDataNotFoundException
     */
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

