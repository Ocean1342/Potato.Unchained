<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::factory()
            ->create([
                'user_id' => '1',
                'total' => 123,
            ]);
        Order::factory()
            ->create([
                'user_id' => '2',
                'total' => 300,
            ]);

        DB::table('dish_order')->insert([
            [
                'dish_id' => 1,
                'order_id' => 1
            ],
            [
                'dish_id' => 2,
                'order_id' => 1
            ],
            [
                'dish_id' => 3,
                'order_id' => 2
            ],
            [
                'dish_id' => 4,
                'order_id' => 2
            ]
        ]);
    }
}
