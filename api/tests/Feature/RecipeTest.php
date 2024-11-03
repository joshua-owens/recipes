<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_recipes_import(): void
    {
        Http::fake([
            'http://scraper:4000/recipe' => Http::response([
                'image' => 'https://example.com/image.jpg',
                'ingredients' => ['1 cup of sugar', '2 cups of flour'],
                'instructions' => ['Mix ingredients', 'Bake at 350 degrees'],
                'nutrients' => ['calories' => '200 kcal'],
                'title' => 'Example Recipe',
                'total_time' => 30,
                'yields' => '4 servings',
            ], 200),
        ]);

        $response = $this->post('/api/recipes', [
            'url' => 'https://www.example.com',
        ]);

        $response->assertStatus(202);

        $this->assertDatabaseHas('recipes', [
            'url' => 'https://www.example.com',
        ]);

    }
}
