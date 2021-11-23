<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\Order\Requests\ApiOrderCreateRequest;
use App\Http\Controllers\Controller;

class ApiOrderDetailController extends ApiOrderBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  App\Http\Controllers\Api\Order\Requests\ApiOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        return $this->getOrderService()->detail($id);
    }
}
