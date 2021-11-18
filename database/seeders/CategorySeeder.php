<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->create([
            'name'=>'Pizza'
        ]);
        Category::factory()->create([
            'name'=>'Pasta'
        ]);
        Category::factory()->create([
            'name'=>'Sushi'
        ]);
        Category::factory()->create([
            'name'=>'Soup'
        ]);
    }
}
