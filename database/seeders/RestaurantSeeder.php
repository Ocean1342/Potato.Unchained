<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
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
            'city_id' => 1,
            'latitude' => '55.755793',
            'longitude' => '37.6171344'
        ]);
        Restaurant::factory()->create([
            'title' => 'Sushi Spb',
            'city_id' => 2,
            'latitude' => '59.939090',
            'longitude' => '30.315831'
        ]);
        Restaurant::factory()->create([
            'title' => 'Potatoman Tver',
            'city_id' => 3,
            'latitude' => '56.859617',
            'longitude' => '35.911755'
        ]);
        Restaurant::factory(5)->create();
        DB::table('category_restaurant')->insert($this->genPivotData());
    }

    protected function genPivotData(): array
    {
        $ar = [];
        foreach (Restaurant::all() as $rest) {
            $ar[] = [
                'category_id' => rand(1, Category::count()),
                'restaurant_id' => $rest->id
            ];
        }
        return $ar;
    }
}
