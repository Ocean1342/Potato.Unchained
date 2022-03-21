<?php

namespace Tests\Feature\Order;

use App\Models\User;
use App\Services\Routes\Providers\Api\ApiRoutes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    use RefreshDataBase;

    protected $seed = true;

    public function dataProvider(): array
    {
        return [
            'wrong Token' => [1, 2, 400],
            'without dishes' => [1, 1, 400]
        ];
    }

    /**
     * Тест должен проверять соответствие айди юзера в заказе и айди юзера,
     * которому принадлежит токен авторизации
     *
     * @return void
     * @group createOrder
     * @dataProvider dataProvider
     */
    public function test_create_order_wrong_user_assert_400($firstUserId, $secondUserId, $assertStatus)
    {
        $request = [
            'user' => [
                'id' => $firstUserId
            ]
        ];
        $headers = [
            'Authorization' => 'Bearer ' . User::find($secondUserId)->generateTestToken()
        ];
        $response = $this->postJson(
            route(ApiRoutes::API_ORDERS_CREATE),
            $request,
            $headers
        );
        $response->assertStatus($assertStatus);
    }

    public function dataDishesProvider(): array
    {
        return [
            'dishes from not same restaurant' => [
                400,
                'dishesIds' => [1, 5]
            ],
            'valid one right dish' => [
                'status' => 200,
                'dishesIds' => [1]

            ],
            'wrong one dish' => [
                'status' => 400,
                'dishesIds' => [99999]
            ],
        ];

    }


    /**
     * Проверяет создание заказа
     *
     * @return void
     * @group createOrder
     ** @dataProvider dataDishesProvider
     */
    public function test_create_order($expectedStatus, $arDishes)
    {
        $requestArrayDishes = [];
        foreach ($arDishes as $k => $dishId) {
            $requestArrayDishes[$k] = [
                'dish_id' => $dishId,
                'amount' => rand(1, 10)
            ];
        }
        $request = [
            'user' => [
                'id' => 1
            ],
            'dishes' => $requestArrayDishes
        ];
        $headers = [
            'Authorization' => 'Bearer ' . User::find(1)->generateTestToken()
        ];
        $response = $this->postJson(
            route(ApiRoutes::API_ORDERS_CREATE),
            $request,
            $headers
        );
        $response->assertStatus($expectedStatus);
    }
}
