<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function index(Request $request)
    {
        $TOTAL_OF_RECIPES = 6;
        return Recipe::with("ingredients")->simplePaginate($TOTAL_OF_RECIPES);
    }
}
