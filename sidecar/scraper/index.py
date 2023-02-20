from recipe_scrapers import scrape_me

def handler(event, context):
    recipe = scrape_me(event['url'])

    return {
        'title': recipe.title(),
        'ingredients': recipe.ingredients(),
        'instructions': recipe.instructions(),
        'yields': recipe.yields(),
        'cookTime': recipe.cook_time(),
        'prepTime': recipe.prep_time(),
        'image': recipe.image(),
        'nutrients': recipe.nutrients(),
        'image': recipe.image(),
    }
