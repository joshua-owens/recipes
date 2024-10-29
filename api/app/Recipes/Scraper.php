<?php

namespace App\Recipes;

use App\Models\Recipe;

interface Scraper
{
    public function scrape(string $url): Recipe;
}