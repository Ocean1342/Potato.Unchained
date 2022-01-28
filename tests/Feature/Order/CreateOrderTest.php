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
     * Тест должен проверять соответствие айди юзера в заказе и айди юзера,
     * которому принадлежит токен авторизации
     *
     * @return void
     * @group createOrder
     */
    public function test_create_order_wrong_user_assert_400()
    {
        $request = [
            'user' => [
                'id' => 1
            ]
        ];
        $headers = [
            'Authorization' => 'Bearer '. User::find(2)->generateTestToken()
        ];
        $response = $this->postJson(
            route(ApiRoutes::API_ORDERS_CREATE),
            $request,
            $headers
        );
        $response->assertStatus(400);
    }
}
