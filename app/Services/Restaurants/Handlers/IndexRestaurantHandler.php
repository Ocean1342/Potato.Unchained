<?php

namespace App\Services\Restaurants\Handlers;

use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;

class IndexRestaurantHandler
{
    public function __construct(
        private RestaurantsRepositories $restaurantsRepositories
    )
    {
    }

    public function handle(array $data): Collection
    {
        return $this->restaurantsRepositories->getBy($data);
    }
}
