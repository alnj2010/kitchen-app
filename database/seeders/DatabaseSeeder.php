<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\RecipeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(
            [
                IngredientSeeder::class,
                RecipeSeeder::class,
                IngredientRecipeSeeder::class
            ]
        );
    }
}
