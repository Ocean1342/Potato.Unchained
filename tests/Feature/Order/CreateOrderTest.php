<?php

namespace Tests\Feature\Order;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Services\Routes\Providers\Api\ApiRoutes;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateOrderTest extends TestCase
{
    /**
     *
     * */
    public function dataProvider()
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

    /**
     * Проверяет корректное создание заказа
     *
     * @return void
     * @group createOrder
     *
     */
    public function test_create_order_right_user_assert_200()
    {
        $request = [
            'user' => [
                'id' => 1
            ],
            'dishes' => [
                1 => [
                    'dish_id' => 1,
                    'amount' => 2
                ]
            ]
        ];
        $headers = [
            'Authorization' => 'Bearer ' . User::find(1)->generateTestToken()
        ];
        $response = $this->postJson(
            route(ApiRoutes::API_ORDERS_CREATE),
            $request,
            $headers
        );
        $response->assertStatus(200);
    }
}
