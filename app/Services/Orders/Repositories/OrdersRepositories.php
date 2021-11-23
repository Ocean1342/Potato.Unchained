<?php

namespace App\Services\Orders\Repositories;

use App\Models\Order;
use App\Services\AbstractRepositories\AbstractRepositories;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class OrdersRepositories extends AbstractRepositories
{
    protected function setModel()
    {
        return $this->model = app(Order::class);
    }


    protected function applyFilters(Builder $qb, array $filters): void
    {
        parent::applyFilters($qb, $filters);
    }

    public function getWithDishes(array $filters = [], int $limit = 50, int $offset = 0): Collection
    {
        return $this->getBy($filters, $limit, $offset)->load('dishes');
    }

    public function createOrder()
    {

    }

}

