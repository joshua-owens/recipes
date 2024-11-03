<?php

namespace Database\Seeders;

use App\Models\Recipe;
use Illuminate\Database\Seeder;

class RecipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Recipe::create([
            'url' => 'https://www.budgetbytes.com/creamy-white-chicken-chili/',
            'title' => 'Creamy White Chicken Chili',
            'image' => 'https://www.budgetbytes.com/wp-content/uploads/2022/11/White-Chicken-Chili-eat.jpg',
            'ingredients' => json_encode([
                '1 yellow onion ($0.37)',
                '4 cloves garlic ($0.34)',
                '1 jalapeño ($0.22)',
                '1 Tbsp olive oil ($0.13)',
                '1.5 lbs. boneless, skinless chicken thighs ($4.94)',
                '2 15oz. cans cannellini beans (drained) ($1.78)',
                '1 15oz. can pinto beans (drained) ($0.79)',
                '1 7oz. can diced green chiles ($1.39)',
                '1 Tbsp ground cumin ($0.30)',
                '1 tsp dried oregano ($0.10)',
                '1/4 tsp smoked paprika ($0.02)',
                '1/4 tsp cayenne pepper ($0.02)',
                '1/4 tsp garlic powder ($0.02)',
                '1/4 tsp freshly cracked black pepper ($0.02)',
                '3 cups chicken broth ($0.35)',
                '1 cup frozen corn ($0.47)',
                '4 oz. cream cheese ($1.10)',
                '½ cup sour cream ($0.45)',
            ]),
            'instructions' => json_encode([
                'Dice the onion and mince the garlic. Deseed then dice the jalapeño. Add the onion, garlic, and jalapeño to a large pot with the olive oil. Sauté over medium heat until the onions have softened.',
                'Add the chicken thighs, cannellini beans, pinto beans, diced green chiles, cumin, oregano, smoked paprika, cayenne pepper, garlic powder, pepper, and chicken broth to the pot. Stir to combine.',
                'Place a lid on the pot and turn the heat up to medium-high. Allow the chili to come up to a boil. Once boiling, turn the heat down to medium-low and let the chili simmer for 30 minutes, stirring occasionally.',
                'After 30 minutes, remove the chicken thighs and shred with two forks. Add the shredded meat back to the pot along with the corn. Stir to combine and heat through.',
                'Cut the cream cheese into chunks and stir it into the chili until melted. Stir in the sour cream. To further thicken the chili, smash some of the beans against the side of the pot.',
                'Taste the chili and adjust the seasoning to your liking. Serve hot with your favorite toppings!',
            ]),
            'nutrients' => json_encode([
                'servingSize' => '1.25 cups',
                'calories' => '403 kcal',
                'carbohydrateContent' => '41 g',
                'proteinContent' => '30 g',
                'fatContent' => '14 g',
                'sodiumContent' => '701 mg',
                'fiberContent' => '9 g',
            ]),
            'total_time' => 60,
            'yields' => '8 servings',
        ]);

        Recipe::create([
            'url' => 'https://www.allrecipes.com/recipe/257865/easy-chorizo-street-tacos/',
            'title' => 'Easy Chorizo Street Tacos',
            'image' => 'https://www.allrecipes.com/thmb/B8LABI3tZsd91f1lwxvlS6w6HMo=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/image-321-1acc9ef3a3cf44dc93bea4921c0d517a.jpg',
            'ingredients' => json_encode([
                '1 chorizo sausage link, casing removed and meat crumbled',
                '2 tablespoons chipotle peppers in adobo sauce',
                '4 corn tortillas',
                '2 tablespoons chopped onion, or to taste',
                '2 tablespoons chopped fresh cilantro, or to taste (Optional)',
            ]),
            'instructions' => json_encode([
                'Combine crumbled chorizo and chipotle peppers in adobo sauce in a bowl.',
                'Heat a skillet over medium-high heat; add chorizo mixture and cook until crisp, 5 to 7 minutes. Transfer to a plate, reserving grease in the skillet.',
                'Heat tortillas in reserved grease in the skillet over medium heat until warmed, 1 to 2 minutes per side. Stack 2 tortillas for each taco, then fill with chorizo, onion, and cilantro.',
            ]),
            'nutrients' => json_encode([
                'calories' => '262 kcal',
                'carbohydrateContent' => '26 g',
                'cholesterolContent' => '26 mg',
                'fiberContent' => '4 g',
                'proteinContent' => '10 g',
                'saturatedFatContent' => '5 g',
                'sodiumContent' => '466 mg',
                'sugarContent' => '1 g',
                'fatContent' => '13 g',
                'unsaturatedFatContent' => '0 g',
            ]),
            'total_time' => 20,
            'yields' => '2 servings',
        ]);

    }
}
