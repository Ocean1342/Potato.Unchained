<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Api\ApiBaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\RestaurantResource;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class ApiRestaurantIndexController extends ApiBaseController
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Restaurant $restaurant)
    {
        return RestaurantResource::collection(Restaurant::all());
    }
}
