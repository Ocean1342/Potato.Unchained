<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;

class ApiOrderCreateController extends ApiOrderBaseController
{
    public function __invoke(ApiOrderRequest $request)
    {
        //return $request->toArray();
        return $this->getOrderService()->create($request);
    }
}
