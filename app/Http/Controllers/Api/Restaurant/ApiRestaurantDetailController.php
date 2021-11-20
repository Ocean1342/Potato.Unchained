<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Api\Restaurant\Requests\ApiRestaurantRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ApiRestaurantDetailController extends ApiRestaurantBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id,ApiRestaurantRequest $request)
    {
        $ret = $this->getRestaurantsService()->detail($id,$request->toArray());
        return RestaurantResource::collection($ret);
    }
}
