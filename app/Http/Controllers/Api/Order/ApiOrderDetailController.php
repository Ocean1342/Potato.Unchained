<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Resources\OrderResource;

class ApiOrderDetailController extends ApiOrderBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Controllers\Api\Order\Requests\ApiOrderRequest  $request
     * @return \App\Http\Resources\OrderResource
     */
    public function __invoke($id)
    {
        return  OrderResource::collection($this->getOrderService()->detail($id));
    }
}
