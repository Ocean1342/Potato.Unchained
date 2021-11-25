<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Order;
use App\Models\User;
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
        foreach (User::all() as $user) {
            $dish1 = Dish::find(rand(1, 4));
            $dish1Amount = rand(1, 3);
            $dish2 = Dish::find(rand(1, 4));
            $dish2Amount = rand(1, 3);

            $factory = Order::factory()
                ->create([
                    'user_id' => $user->id,
                    'total' => $dish1->price * $dish1Amount + $dish2->price * $dish2Amount,
                ]);
            DB::table('dish_order')->insert([
                [
                    'dish_id' => $dish1->id,
                    'order_id' => $factory->id,
                    'amount' => $dish1Amount
                ],
                [
                    'dish_id' => $dish2->id,
                    'order_id' => $factory->id,
                    'amount' => $dish2Amount
                ]
            ]);
        }
    }
}
