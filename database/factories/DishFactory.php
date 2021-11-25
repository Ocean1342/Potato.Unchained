<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

class DishFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'restaurant_id' => rand(1,Restaurant::count()),
            'category_id' => rand(1,Category::count()),
            'image' => 'https://images.potato.test/'.$this->faker->regexify('[a-z]{5}').'.jpg',
            'price' => rand(100,400),
            'title' => $this->faker->country(),
            'description' => $this->faker->text()
        ];
    }
}
