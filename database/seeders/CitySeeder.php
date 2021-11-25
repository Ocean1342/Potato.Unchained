<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()->create(['name'=>'Moscow']);
        City::factory()->create(['name'=>'Saint-Petersburg']);
        City::factory()->create(['name'=>'Tver']);
        City::factory(8)->create();
    }
}
