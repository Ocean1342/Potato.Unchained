<?php

namespace App\Http\Controllers\Api\Order;

use Illuminate\Http\Request;

class ApiOrderIndexController extends ApiOrderBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return $this->getOrderService()->index($request->all());
    }
}
