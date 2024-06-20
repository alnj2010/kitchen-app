<?php
namespace App\Actions;

use App\Models\Order;
use App\Models\Recipe;
use Illuminate\Http\Request;

class GenerateRandomOrder
{
    public function handle()
    {
        $recipe = Recipe::with("ingredients")->inRandomOrder()->first();

        $order = Order::create([
            'recipe_id' => $recipe->id,
            'is_delivered' => false,
        ]);

        return [
            'id' => $order->id,
            'ingredients' => array_map(
                fn($value) => [
                    'name' => $value["name_ingredient"],
                    'quantity' => $value["pivot"]["quantity"],
                    'was_obtained' => false
                ],
                $recipe->ingredients->toArray()
            )
        ];
    }
}