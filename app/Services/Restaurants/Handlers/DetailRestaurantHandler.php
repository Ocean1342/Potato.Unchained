<?php

namespace App\Services\Restaurants\Handlers;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DetailRestaurantHandler extends AbstractRestaurantHandler
{
    /**
     * @throws ApiDataNotFoundException
     */
    public function handle($id, array $data)
    {
        $data['id'] = $id;
        $ret = $this->restaurantsRepositories->getBy($data);
        if (!$ret->count())
            throw new ApiDataNotFoundException('Not found restaraunts by ID: '.$id);
        return $ret;
    }
}
