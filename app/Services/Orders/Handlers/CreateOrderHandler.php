<?php

namespace App\Services\Orders\Handlers;

use App\Exceptions\ApiExceptions\ApiDataNotFoundException;
use App\Services\Restaurants\Repositories\RestaurantsRepositories;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class CreateOrderHandler extends AbstractOrderHandler
{
    public function handle($id)
    {
        $this->ordersRepositories->createOrder();
    }
}
