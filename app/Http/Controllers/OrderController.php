<?php

namespace App\Http\Controllers;

use App\Actions\GenerateRandomOrder;
use App\Jobs\RecipeIngredientsRequested;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'status' => Rule::in(['delivered', 'pending', 'all']),
            'perPage' => 'integer|gt:0',
        ]);

        $status = $request->query('status');
        $per_page = $request->query('perPage') ?? 10;

        $query = Order::with("recipe");

        if ($status == 'delivered' || $status == 'pending') {
            $query = $query->where("is_delivered", $status === "delivered");
        }

        return $query->orderBy("id", "desc")->paginate($per_page);
    }

    public function store(Request $request, GenerateRandomOrder $generateRandomOrder)
    {
        $order = $generateRandomOrder->handle();

        RecipeIngredientsRequested::dispatch($order);

        return response(["message" => "order created"], Response::HTTP_CREATED);
    }
}
