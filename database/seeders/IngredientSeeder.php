<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingredient::insert([
            ['name_ingredient' => 'tomato'],
            ['name_ingredient' => 'lemon'],
            ['name_ingredient' => 'potato'],
            ['name_ingredient' => 'rice'],
            ['name_ingredient' => 'ketchup'],
            ['name_ingredient' => 'lettuce'],
            ['name_ingredient' => 'onion'],
            ['name_ingredient' => 'cheese'],
            ['name_ingredient' => 'meat'],
            ['name_ingredient' => 'chicken'],
        ]);

    }
}
