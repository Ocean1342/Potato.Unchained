<?php

namespace App\Services\Orders;

use App\Services\AbstractServices\AbstractServices;
use App\Services\Orders\Handlers\DetailOrderHandler;
use App\Services\Orders\Handlers\IndexOrderHandler;
use Illuminate\Database\Eloquent\Collection;

class OrdersService extends AbstractServices
{
    public function __construct(
        protected IndexOrderHandler $indexOrderHandler,
        protected DetailOrderHandler $detailOrderHandler
    )
    {

    }

    public function index(array $data): Collection
    {
        return $this->indexOrderHandler->handle($data);
    }

    public function detail($id,array $data)
    {
        return $this->detailOrderHandler->handle($id,$data);
    }
}
