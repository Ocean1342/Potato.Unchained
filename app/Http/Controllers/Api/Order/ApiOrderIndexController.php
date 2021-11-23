<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class ApiOrderIndexController extends ApiOrderBaseController
{
    public function __invoke(Request $request)
    {
        return OrderResource::collection($this->getOrderService()->index($request->all()));
    }
}
