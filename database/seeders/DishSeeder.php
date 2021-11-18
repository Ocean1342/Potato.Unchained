<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dish::factory()->create([
            'restoran_id' => 1,
            'category_id' => 1,
            'image' => 'test',
            'price' => 150,
            'title' => 'pizza peperoni',
            'description' => 'supper pizza descr'
        ]);

        Dish::factory()->create([
            'restoran_id' => 1,
            'category_id' => 2,
            'image' => 'test',
            'price' => 200,
            'title' => 'pasta carbonara',
            'description' => 'hot descr pasta carbonara hit'
        ]);
        Dish::factory()->create([
            'restoran_id' => 1,
            'category_id' => 3,
            'image' => 'test',
            'price' => 400,
            'title' => 'sushi california',
            'description' => 'big and well'
        ]);
        Dish::factory()->create([
            'restoran_id' => 1,
            'category_id' => 4,
            'image' => 'test',
            'price' => 100,
            'title' => 'russia borsh',
            'description' => 'with pampushka'
        ]);

    }
}
