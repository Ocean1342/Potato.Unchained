<?php

namespace App\Services\Orders\Repositories;

use App\Models\Order;
use App\Services\AbstractRepositories\AbstractRepositories;

class OrdersRepositories extends AbstractRepositories
{
    protected function setModel()
    {
        return $this->model = app(Order::class);
    }
}

