<?php

namespace App\Http\Controllers;

use App\Jobs\RecipeIngredientsRequested;
use App\Models\Order;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
        return Order::with("recipe")->where("is_delivered", $status === "delivered")->simplePaginate(10);
    }

    public function store(Request $request)
    {
        $recipe_model = Recipe::with("ingredients")->inRandomOrder()->first();

        $order_model = Order::create([
            'recipe_id' => $recipe_model->id,
            'is_delivered' => false,
        ]);

        $order = [
            'id' => $order_model->id,
            'ingredients' => array_map(
                fn($value) => [
                    'name' => $value["name_ingredient"],
                    'quantity' => $value["pivot"]["quantity"]
                ],
                $recipe_model->ingredients->toArray()
            )
        ];



        RecipeIngredientsRequested::dispatch($order);

        return response(["message" => "order created"], Response::HTTP_CREATED);
    }
}
