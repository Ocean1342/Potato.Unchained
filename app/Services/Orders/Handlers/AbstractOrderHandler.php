<?php

namespace App\Services\Orders\Handlers;


use App\Services\Orders\Repositories\OrdersRepositories;

/**
 *
 */
abstract class AbstractOrderHandler
{
    /**
     * @param OrdersRepositories $ordersRepositories
     */
    public function __construct(
        protected OrdersRepositories $ordersRepositories
    )
    {
    }
}
