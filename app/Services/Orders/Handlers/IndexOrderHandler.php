<?php

namespace App\Services\Orders\Handlers;

use App\Services\Orders\Repositories\OrdersRepositories;
use Illuminate\Database\Eloquent\Collection;

class IndexOrderHandler extends AbstractOrderHandler
{
    public function __construct(
        protected OrdersRepositories $ordersRepositories
    )
    {
    }

    public function handle(array $data): Collection
    {
        return $this->ordersRepositories->getWithDishes($data);
    }
}
