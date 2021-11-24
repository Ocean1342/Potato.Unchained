<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;

class ApiOrderDetailController extends ApiOrderBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Controllers\Api\Order\Requests\ApiOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        return  OrderResource::collection($this->getOrderService()->detail($id));
    }
}
