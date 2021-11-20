<?php

namespace App\Services\Restaurants;

use App\Services\AbstractServices\AbstractServices;
use App\Services\Restaurants\Handlers\DetailRestaurantHandler;
use App\Services\Restaurants\Handlers\IndexRestaurantHandler;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;

class RestaurantsService extends AbstractServices
{
    public function __construct(
        protected IndexRestaurantHandler $indexRestaurantHandler,
        protected DetailRestaurantHandler $detailRestaurantHandler
    )
    {

    }

    public function index(array $data): Collection
    {
        return $this->indexRestaurantHandler->handle($data);
    }

    public function detail($id,array $data)
    {
        return $this->detailRestaurantHandler->handle($id,$data);
    }
}
