<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestaurantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->streetName() . ' Bar',
            'city_id' => $this->faker->numberBetween(4, 10),
//            'geo_position' => $this->faker->latitude(20, 70).' '.$this->faker->longitude(20, 60),
            'latitude' => $this->faker->latitude(20, 70),
            'longitude' => $this->faker->longitude(20, 60)
        ];
    }
}
