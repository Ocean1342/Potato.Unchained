<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Dish;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *  @mixin Dish
 *  @mixin City
 * */
class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'city_id' => $this->city_id,
            'city_title'=>$this->city->name ,
            'title' => $this->title,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'dishes' => $this->dishes
        ];
    }
}
