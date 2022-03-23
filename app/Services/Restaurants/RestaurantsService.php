<?php

namespace App\Services\Restaurants;

use App\Services\AbstractServices\AbstractServices;
use App\Services\Restaurants\Handlers\DetailRestaurantHandler;
use App\Services\Restaurants\Handlers\IndexRestaurantHandler;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class RestaurantsService extends AbstractServices
{
    /**
     * @param IndexRestaurantHandler $indexRestaurantHandler
     * @param DetailRestaurantHandler $detailRestaurantHandler
     */
    public function __construct(
        protected IndexRestaurantHandler $indexRestaurantHandler,
        protected DetailRestaurantHandler $detailRestaurantHandler
    )
    {

    }

    /**
     * @param array $data
     * @return Collection
     */
    public function index(array $data): Collection
    {
        return $this->indexRestaurantHandler->handle($data);
    }

    /**
     * @param $id
     * @return mixed
     * @throws \App\Exceptions\ApiExceptions\ApiDataNotFoundException
     */
    public function detail($id)
    {
        return $this->detailRestaurantHandler->handle($id);
    }
}
