<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TOTAL_RECIPES = 6; // TODO Create global constant
        Recipe::factory($TOTAL_RECIPES)->create();
    }
}

