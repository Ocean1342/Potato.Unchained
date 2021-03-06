<?php

namespace App\Services\Orders\Handlers;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DetailOrderHandler extends AbstractOrderHandler
{
    /**
     * @throws ApiDataNotFoundException
     */
    public function handle($id)
    {
        $data['id'] = $id;
        $ret = $this->ordersRepositories->getWithDishes($data);
        if (!$ret->count())
            throw new ApiDataNotFoundException('Not found orders by ID: '.$id);
        return $ret;
    }
}
