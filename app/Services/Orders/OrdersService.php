<?php

namespace App\Services\Orders;

use App\Services\AbstractServices\AbstractServices;
use App\Services\Orders\Handlers\CreateOrderHandler;
use App\Services\Orders\Handlers\DetailOrderHandler;
use App\Services\Orders\Handlers\IndexOrderHandler;
use Illuminate\Database\Eloquent\Collection;

class OrdersService extends AbstractServices
{
    public function __construct(
        protected IndexOrderHandler $indexOrderHandler,
        protected DetailOrderHandler $detailOrderHandler,
        protected CreateOrderHandler $createOrderHandler
    )
    {

    }

    public function index(array $data): Collection
    {
        return $this->indexOrderHandler->handle($data);
    }

    public function detail($id)
    {
        return $this->detailOrderHandler->handle($id);
    }
    public function create($id)
    {
        return $this->createOrderHandler->handle($id);
    }
}
