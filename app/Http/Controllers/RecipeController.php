<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    
    public function index(Request $request){
        return Recipe::with("ingredients")->simplePaginate(6);
    }
}
