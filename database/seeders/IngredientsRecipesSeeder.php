<?php

namespace Database\Seeders;

use App\Models\IngredientsRecipes;
use Illuminate\Database\Seeder;

class IngredientsRecipesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TOTAL_RECIPES = 6; //TODO Create global constant
        $TOTAL_INGREDIENTS = 10;//TODO Create global constant

        $records = [];
        for ($i = 0; $i < $TOTAL_INGREDIENTS; $i++) {
            $ingredient_id = $i + 1;
            $recipe_id = ($i % $TOTAL_RECIPES) + 1;

            array_push($records, [
                "recipe_id" => $recipe_id,
                "quantity" => rand(1, 5),
                "ingredient_id" => $ingredient_id,
            ]);

        }

        IngredientsRecipes::insert($records);
    }
}
