<?php

namespace App\Http\Controllers\Api\Restaurant;

use App\Http\Controllers\Api\ApiBaseController;
use App\Services\Restaurants\RestaurantsService;

class ApiRestaurantBaseController extends ApiBaseController
{
    protected function getRestaurantsService()
    {
        return app(RestaurantsService::class);
    }
}
