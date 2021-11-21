<?php

namespace App\Services\Orders\Handlers;


use App\Services\Orders\Repositories\OrdersRepositories;

abstract class AbstractOrderHandler
{
    public function __construct(
        protected OrdersRepositories $ordersRepositories
    )
    {
    }
}
