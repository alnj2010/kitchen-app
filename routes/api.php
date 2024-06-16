<?php

use App\Jobs\RecipeIngredientsRequested;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    RecipeIngredientsRequested::dispatch([
        'id_recipe' => 1, 
        'ingredients' => [
            ['name' => 'tomato', 'quantity' => 3],
            ['name' => 'onion', 'quantity' => 1],
        ]]);
    return "HI";
});
