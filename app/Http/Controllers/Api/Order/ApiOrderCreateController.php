<?php

namespace App\Http\Controllers\Api\Order;

use App\Http\Controllers\Api\Order\Requests\ApiOrderCreateRequest;

class ApiOrderCreateController extends ApiOrderBaseController
{
    public function __invoke(ApiOrderCreateRequest $request)
    {
        return $request->toArray();
    }
}
