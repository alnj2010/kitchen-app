<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::apiResource('orders', OrderController::class)->only([
    'index',
    'store'
]);

Route::apiResource('recipes', OrderController::class)->only(['index']);