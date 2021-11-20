<?php

namespace App\Services\Restaurants\Handlers;

use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractRestaurantHandler
{
    public function __construct(
        protected RestaurantsRepositories $restaurantsRepositories
    )
    {
    }
}
