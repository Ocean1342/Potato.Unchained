<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;

class ApiOrderCreateController extends ApiOrderBaseController
{
    /**
     * @param ApiOrderRequest $request
     * @return mixed
     */
    public function __invoke(ApiOrderRequest $request)
    {

        return $this->getOrderService()->create($request);
    }
}
