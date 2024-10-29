<?php

namespace App\Recipes;

use App\Models\Recipe;
use Illuminate\Support\Facades\Http;

class RecipeScraper implements Scraper
{
    public function scrape(string $url): Recipe 
    {
        $response = Http::post('http://scraper:4000/recipe', [
            'url' => $url
        ]);

        if ($response->successful()) {
            $recipe = new Recipe($response->json());

            if ($recipe->save()) {
                return $recipe;
            }
        }

        throw new \Exception('Failed to scrape the recipe.');
    }
}