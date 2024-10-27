<?php

namespace Database\Factories;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'image' => $this->faker->imageUrl(),
            'ingredients' => $this->faker->words(5, false),
            'instructions' => $this->faker->sentences(3, false),
            'nutrients' => [
                'calories' => $this->faker->randomNumber(3) . ' kcal',
                'carbohydrateContent' => $this->faker->randomNumber(1) . ' g',
                'cholesterolContent' => $this->faker->randomNumber(2) . ' mg',
                'fiberContent' => $this->faker->randomNumber(1) . ' g',
                'proteinContent' => $this->faker->randomNumber(2) . ' g',
                'saturatedFatContent' => $this->faker->randomNumber(1) . ' g',
                'sodiumContent' => $this->faker->randomNumber(3) . ' mg',
                'sugarContent' => $this->faker->randomNumber(1) . ' g',
                'fatContent' => $this->faker->randomNumber(2) . ' g',
                'unsaturatedFatContent' => $this->faker->randomNumber(1) . ' g',
            ],
            'title' => $this->faker->sentence(3),
            'total_time' => $this->faker->numberBetween(10, 120),
            'yields' => $this->faker->numberBetween(1, 10) . ' servings',
        ];
    }
}
