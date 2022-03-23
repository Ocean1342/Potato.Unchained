<?php

namespace App\Services\Orders;

use App\Services\AbstractServices\AbstractServices;
use App\Services\Orders\Handlers\CreateOrderHandler;
use App\Services\Orders\Handlers\DetailOrderHandler;
use App\Services\Orders\Handlers\IndexOrderHandler;
use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
class OrdersService extends AbstractServices
{
    /**
     * @param IndexOrderHandler $indexOrderHandler
     * @param DetailOrderHandler $detailOrderHandler
     * @param CreateOrderHandler $createOrderHandler
     */
    public function __construct(
        protected IndexOrderHandler  $indexOrderHandler,
        protected DetailOrderHandler $detailOrderHandler,
        protected CreateOrderHandler $createOrderHandler
    )
    {

    }

    /**
     * @param array $data
     * @return Collection
     */
    public function index(array $data): Collection
    {
        return $this->indexOrderHandler->handle($data);
    }

    /**
     * @param $id
     * @return Collection
     * @throws \App\Exceptions\ApiExceptions\ApiDataNotFoundException
     */
    public function detail($id)
    {
        return $this->detailOrderHandler->handle($id);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ApiExceptions\ApiDataNotFoundException
     */
    public function create($id)
    {
        return $this->createOrderHandler->handle($id);
    }
}
