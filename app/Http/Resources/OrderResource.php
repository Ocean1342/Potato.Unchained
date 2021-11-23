<?php

namespace App\Http\Resources;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Order
 * @mixin Dish
 * */
class OrderResource extends JsonResource
{

    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'dishes' => DishResource::collection($this->dishes)

        ];
    }
}
