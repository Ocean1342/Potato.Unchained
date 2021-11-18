<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestoranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::factory()->create([
            'title' => 'Resto Bar Mosсow',
            'city_id' => 1
        ]);
        Restaurant::factory()->create([
            'title' => 'Sushi Spb',
            'city_id' => 1
        ]);
        DB::table('category_restaurant')->insert([
            [
                'category_id' => 1,
                'restaurant_id' => 1
            ],
            [
                'category_id' => 2,
                'restaurant_id' => 1
            ],
            [
                'category_id' => 3,
                'restaurant_id' => 2
            ],
            [
                'category_id' => 4,
                'restaurant_id' => 2
            ]
        ]);
    }
}
