<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\Orders\OrdersService;

/**
 *
 */
class ApiOrderBaseController extends ApiBaseController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    protected function getOrderService()
    {
        return app(OrdersService::class);
    }
}
