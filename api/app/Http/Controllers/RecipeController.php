<?php

namespace App\Http\Controllers;

use App\Jobs\ScrapeRecipe;
use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required|string',
        ]); 

        $recipes = Recipe::search($request->q)->get();

        return response()->json($recipes);
    }

    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
        ]);

        if (Recipe::where('url', $request->url)->exists()) {
            return response()->json(['message' => 'Recipe already exists.'], 409);
        }

        ScrapeRecipe::dispatch($request->url);

        return response()->json(['message' => 'Recipe is being scraped.'], 202);
    }
}
