<?php

namespace App\Http\Resources;

use App\Models\Dish;
use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{

    /**
     * @mixin Dish
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'restaurant_id' => $this->restaurant_id,
            'category_id' => $this->category_id,
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $this->image,
            'amount' => $this->pivot->amount
        ];
    }
}
