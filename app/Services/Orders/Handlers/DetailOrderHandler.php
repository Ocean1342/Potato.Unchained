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
    public function handle($id, array $data)
    {
        $data['id'] = $id;
        $ret = $this->ordersRepositories->getBy($data);
        if (!$ret->count())
            throw new ApiDataNotFoundException('Not found orders by ID: '.$id);
        return $ret;
    }
}
