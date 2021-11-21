<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\Orders\OrdersService;

class ApiOrderBaseController extends ApiBaseController
{
    protected function getOrderService()
    {
//        dd('tt');
        return app(OrdersService::class);
    }
}
