<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Api\Restaurant\Requests\ApiRestaurantRequest;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use App\Services\Restaurants\RestaurantsService;

class ApiRestaurantIndexController extends ApiRestaurantBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(ApiRestaurantRequest $request)
    {
        $ret = $this->getRestaurantsService()->index($request->toArray());
        return RestaurantResource::collection($ret);
    }
}
