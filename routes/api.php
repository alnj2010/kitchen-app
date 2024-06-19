<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;


Route::apiResource('orders', OrderController::class)->only([
    'index',
    'store'
]);

Route::apiResource('recipes', RecipeController::class)->only(['index']);