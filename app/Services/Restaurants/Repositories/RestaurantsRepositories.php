<?php

namespace App\Services\Restaurants\Repositories;

use App\Models\Restaurant;
use App\Services\AbstractRepositories\AbstractRepositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class RestaurantsRepositories extends AbstractRepositories
{
    protected function setModel()
    {
        return $this->model = app(Restaurant::class);
    }
}
